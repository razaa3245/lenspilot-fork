<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopkeeper;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(UserRequest $request)
    {
        // ✅ Validate incoming data
        $validated = $request->validated();

        //  Create a new user (default type: shopkeeper)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'shopkeeper',   // Default role
            'is_approved' => false,   // Admin must approve
        ]);

        // ✅ Create a corresponding shopkeeper record with the supplied data
        Shopkeeper::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'shop_name' => $validated['shop_name'] ?? null,
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'status' => 'active',
            'retailer_name' => $validated['retailer_name'] ?? null,
        ]);

        // ✅ Optionally, create token (if you want auto-login)
        // $token = $user->createToken('auth_token')->plainTextToken;

        // ✅ Return clean JSON response
        return response()->json([
            'message' => 'Registration successful! Your account is pending admin approval.',
            'user' => $user,
            // 'token' => $token, // Uncomment if you decide to auto-login users
        ], 201);
    }

    public function prepare(UserRequest $request)
    {
        // Save signup data in session so we can continue to plan selection and payment
        $signupData = $request->validated();
        session(['signup_data' => $signupData]);

        \Log::info('Signup prepare called', ['data' => $signupData]);

        try {
            // Ensure a corresponding user + shopkeeper record exists (to persist data even if payment is delayed)
            $user = User::firstOrNew(['email' => $signupData['email']]);
            $user->name = $signupData['name'];
            $user->type = 'shopkeeper';
            $user->is_approved = false;

            if (! $user->exists) {
                $user->password = Hash::make($signupData['password']);
            }

            $user->save();

            \Log::info('User saved', ['user_id' => $user->id, 'email' => $user->email]);

            Shopkeeper::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $signupData['name'],
                    'email' => $signupData['email'],
                    'phone' => $signupData['phone'] ?? null,
                    'shop_name' => $signupData['shop_name'] ?? null,
                    'address' => $signupData['address'] ?? null,
                    'status' => 'active',
                    'retailer_name' => $signupData['retailer_name'] ?? null,
                ]
            );

            \Log::info('Shopkeeper saved', ['user_id' => $user->id]);

            // Redirect user to plan selection page
            return redirect()->route('price');
        } catch (\Exception $e) {
            \Log::error('Signup prepare failed', ['error' => $e->getMessage(), 'data' => $signupData]);
            return back()->with('error', 'Signup failed: ' . $e->getMessage());
        }
    }
}
