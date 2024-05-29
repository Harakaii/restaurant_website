<?php

namespace App\Http\Controllers;
use Stripe;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function handleGet(){
        return view('FrontEnd.checkOut.stipe');

    }
    public function handlePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" =>$request->input('grandTotal')*100,
            "currency" =>"usd",
            "source" =>$request->stripeToken,
            "description" =>$request->name
        ]);
        Session::flash('success', 'Payment has been succesfully processed');
        return redirect('/checkout/order/complete');
    }
}
