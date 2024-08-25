<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
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
    $customer = Customer::create($validatedData);

        $cart = session()->get('cart',[]);

        foreach ($cart as $item){
            $order = new Order();
            $order->product_id = $item->id;
            $order->customer_id = $customer->id;
            $order->quantity = $item->quantity;
            $order->amount = $item->final_price;
            $order->save();
        }

    if ($request->option == "Online Payment"){
        return redirect()->route('payment.index', [
            'sum'=>$request->sum
        ]);
    }
    return redirect()->route('home');
    }
}
