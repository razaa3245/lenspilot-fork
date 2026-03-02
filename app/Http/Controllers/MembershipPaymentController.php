<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;
class MembershipPaymentController extends Controller
{
    /**
     * Show the payment form for the membership plan.
     *
     * @return \Illuminate\View\View
     */
    public function membership()
    {
        // hardcode the plan amount here so both form and controller agree
        $planAmount = 4000; // rupees
        return view('membership-payment', compact('planAmount'));
    }

    /**
     * Handle the incoming Stripe payment request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paymentPost(Request $request)
    {
        // basic validation - require token and amount
        $request->validate([
            'stripeToken' => 'required|string',
        ]);

        // calculate using constant plan amount (in rupees) to prevent tampering
        $planAmount = 4000; // rupees
        $amount = $planAmount * 100; // convert to paisa (smallest currency unit for PKR)

        try {
            $stripe = new StripeClient(config('services.stripe.secret'));

            $charge = $stripe->charges->create([
                'amount'      => $amount,
                'currency'    => 'pkr',
                'source'      => $request->stripeToken,
                'description' => 'Membership plan payment',
                'receipt_email' => $request->email ?? null,
            ]);
        } catch (\Exception $e) {
            // log the exception if you want: \Log::error($e->getMessage());
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Payment successful in PKR!');
    }
}

