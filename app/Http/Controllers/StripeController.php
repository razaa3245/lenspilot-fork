<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;
class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    public function stripePost(Request $request)
{
    $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

    $amount = $request->amount * 100; // Convert PKR to paisa

    $charge = $stripe->charges->create([
        'amount' => $amount,
        'currency' => 'pkr',
        'source' => $request->stripeToken,
        'description' => 'Basic Plan - 1 Month',
    ]);

    return back()->with('success', 'Payment Successful in PKR!');
}
}
