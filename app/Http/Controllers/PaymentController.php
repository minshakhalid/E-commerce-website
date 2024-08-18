<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
    return view('payment.index', [
        'sum' =>$request->sum
    ]);

    }
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create([
            "email" => $request->email,
            "source" => $request->stripeToken
        ]);

        Charge::create ([
            "amount" => intval($request->amount * 100),
            "currency" => "usd",
            "customer" => $customer->id,
        ]);

        return redirect()->route('welcome');
    }
}
