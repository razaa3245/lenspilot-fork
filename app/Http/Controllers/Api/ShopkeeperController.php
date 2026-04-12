<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\QrCode;
use App\Models\TryOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;

class ShopkeeperController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();
        $qr_code = $shopkeeper
            ? QrCode::where('shop_id', $shopkeeper->id)->first()
            : null;

        Log::info('Shopkeeper dashboard accessed', [
            'user_id' => $user->id,
            'email' => $user->email,
        ]);

        // ── Subscription ──────────────────────────────
        $subscriptionPlan = $shopkeeper
            ? ucfirst($shopkeeper->plan_name ?? 'No Plan')
            : 'No Plan';

        $daysRemaining = $shopkeeper && $shopkeeper->plan_expiry
            ? now()->diffInDays($shopkeeper->plan_expiry, false)
            : 0;

        // ── Total Tryons (REAL DATA) ──────────────────
        $shopId = $shopkeeper?->id;

        $totalTryons = $shopId
            ? TryOn::where('shop_id', $shopId)->count()
            : 0;

        // This month
        $thisMonth = $shopId
            ? TryOn::where('shop_id', $shopId)
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count()
            : 0;

        // Last month
        $lastMonth = $shopId
            ? TryOn::where('shop_id', $shopId)
                ->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)
                ->count()
            : 0;

        // Change percentage
        if ($lastMonth > 0) {
            $changePct = round((($thisMonth - $lastMonth) / $lastMonth) * 100);
        } elseif ($thisMonth > 0) {
            $changePct = 100; // pehli baar tryons aye hain
        } else {
            $changePct = null; // koi data nahi
        }

        // ── Response ──────────────────────────────────
        $data = [
            'user' => [
                'id' => $user->id,
                'shopkeeper_id' => $shopkeeper?->id,  // ← YE ADD KARO
                'name' => $user->name,
                'email' => $user->email,
                'type' => $user->type,
                'shop_name' => $shopkeeper->shop_name ?? $user->name ?? 'Shop',
            ],
            'stats' => [
                'total_tryons' => $totalTryons,
                'tryon_change_pct' => $changePct,
                'subscription_plan' => $subscriptionPlan,
                'days_remaining' => max(0, $daysRemaining),
            ],
            'qr_code' => $qr_code,
            'links' => [
                'catalog' => url('/shopkeeper/catalog'),
            ],
        ];

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    public function showCatalog()
    {
        return view('web.content.catalog');
    }
}