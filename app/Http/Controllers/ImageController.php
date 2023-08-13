<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('images.index', [
            'images' => Image::latest()->get(),
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
            'image_platform' => 'required|in:Kubernetes,Docker',
            'image_protocol' => 'required|in:Mb_RTU,Mb_TCP,API',
            'image_name' => 'required|string|max:100',
            'image_deploy' => 'required|string|max:255',
            'image_decomission' => 'required|string|max:255',
            'product_id' => 'integer|between:0,65535',
        ]);

        Image::create($validated);

        return redirect(route('images.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */    
    public function edit(Image $image)
    {
        $image_platforms = ["Docker", "Kubernetes"];
        $image_protocols = ["Mb_TCP", "Mb_RTU", "API"];
        $image_name = $image->image_name;
        $products = Product::all();
    
        return view('images.edit', [
            'image' => $image,
            'image_platforms' => $image_platforms,
            'image_protocols' => $image_protocols,
            'image_name' => $image_name,
            'products' => $products,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $this->authorize('update', $image);

        $validated = $request->validate([
            'image_platform' => 'required|in:Kubernetes,Docker',
            'image_protocol' => 'required|in:Mb_RTU,Mb_TCP,API',
            'image_name' => 'required|string|max:100',
            'image_deploy' => 'required|string|max:255',
            'image_decomission' => 'required|string|max:255',
            'product_id' => 'integer|between:0,65535',
        ]);
         
        $image->update($validated);
        
        return redirect(route('images.index'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $this->authorize('delete', $image);
 
        $image->delete();
 
        return redirect(route('images.index'));    
    }
}
