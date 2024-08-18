<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        $cart = session()->get('cart',[]);
        $sum = 0;
        foreach ($cart as $item){
            $item->final_price = $item->price * $item->quantity;
            $sum += $item->final_price;
        }
        session()->put('cart', $cart);

        return view('checkout.index', [
            'cart' => $cart,
            'sum' => $sum
            ]);

    }

    public function store(Request $request)
    {

    $validatedData = $request->validate([
        'first_name'=>['required'],
        'last_name'=>'',
        'address'=>['required'],
        'town'=>['required'],
        'country'=>['required'],
        'mobile'=>['required'],
        'email'=>['required'],
        'order_notes'=>'',
        'option'=>['required']
    ]);
    Customer::create($validatedData);
    if ($request->option == "Online Payment"){
        return redirect()->route('payment.index', [
            'sum'=>90
        ]);
    }
    return redirect()->route('home');
    }
}
