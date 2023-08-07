<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index', [
            'products' => Product::latest()->get(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_picture' => 'string|max:255',
            'product_default_protocol' => 'required|in:Mb_RTU,Mb_TCP,API',
            'product_default_IP_address' => 'ip',
            'product_default_IP_port' => 'integer|between:1,65535',
            'product_default_RTU_address' => 'integer|between:1,180',
            'product_default_schema' => 'required|json',
        ]);
    
        Product::create($validated);

        return redirect(route('products.index'));

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
    public function edit(Product $product): View
    {
        $this->authorize('update', $product);
 
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $this->authorize('update', $product);

        $validated = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_picture' => 'string|max:255',
            'product_default_protocol' => 'required|in:Mb_RTU,Mb_TCP,API',
            'product_default_IP_address' => 'ip',
            'product_default_IP_port' => 'integer|between:1,65535',
            'product_default_RTU_address' => 'integer|between:1,180',
            'product_default_schema' => 'required|json',
        ]);
         
        $product->update($validated);
        
        return redirect(route('products.index'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);
 
        $product->delete();
 
        return redirect(route('products.index'));    
    }
}
