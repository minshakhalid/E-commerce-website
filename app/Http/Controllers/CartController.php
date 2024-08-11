<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart',[]);
        $sum = 0;
        foreach ($cart as $item){
            $item->final_price = $item->price * $item->quantity;
            $sum += $item->final_price;
        }
        session()->put('cart', $cart);

        return view('cart.index', [
            'cart' => $cart,
            'sum' => $sum
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);

        $cart = session()->get('cart', []);
        $product->quantity = $request->quantity ?? 1;
        $cart[$product->id] = $product;
        session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = product::find($id);
        $cart = session()->get('cart', []);
        $product->quantity = $request->quantity;
        $cart[$product->id] = $product;
        session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
