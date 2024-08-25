<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('home', [
            'products' => $products
        ]);
    }
    public function orders()
    {
//        $orders = Order::with('customer')->get();
//        foreach ($orders as $order) {
//            dd($order);
//        }
        $orders = Order::all();

        foreach ($orders as $order) {
            $customer = Customer::find($order->customer_id);
            $order->customer_name = $customer->first_name . ' ' . $customer->last_name;
            $product = Product::find($order->product_id);
            $order->product_name = $product->name;
        }

        return view('home.orders', [
            'orders' => $orders
        ]);
    }
}
