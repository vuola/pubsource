<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::with('user')->latest()->get(),
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
        $validated = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_picture' => 'required|string|max:255',
            'product_default_protocol' => 'required|string|max:255',
            'product_default_IP_address' => 'ip',
            'product_default_IP_port' => 'integer|between:1,65535',
            'product_default_RTU_address' => 'integer|between:1,180',
            'product_default_schema' => 'required|json',
            'image_id' => 'integer|between:0,65535',
        ]);
    
        $request->user()->sites()->create($validated);

        return redirect(route('sites.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
