<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::simplePaginate($request->perPage);

        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>['required'],
            'category'=>['required'],
            'price'=>'',
            'rating'=>'',
            'description'=>'',
            'weight'=>'',
            'minWeight'=>'',
            'country'=>'',
            'quality'=>'',
            'quantity'=>'',
            'image'=>'',
        ]);

        Product::create($validatedData);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name'=>['required'],
            'category'=>['required'],
            'price'=>'',
            'rating'=>'',
            'description'=>'',
            'weight'=>'',
            'min_weight'=>'',
            'country_of_origin'=>'',
            'quality'=>'',
            'quantity'=>'',
            'image_url'=>'',
        ]);

        Product::where('id', $product->id)->update($validatedData);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
