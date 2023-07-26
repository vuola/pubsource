<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('sites.index', [
            'sites' => Site::with('user')->latest()->get(),
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
        //
        $validated = $request->validate([
            'site_name' => 'required|string|max:100',
            'site_longitude' => 'required|numeric|between:-180,180',
            'site_latitude' => 'required|numeric|between:-90,90',
        ]);
    
        $request->user()->sites()->create($validated);

        return redirect(route('sites.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site): View
    {
        $this->authorize('update', $site);
 
        return view('sites.edit', [
            'site' => $site,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site): RedirectResponse
    {
        $this->authorize('update', $site);

        $validated = $request->validate([
            'site_name' => 'required|string|max:100',
        ]);

        $validated = $request->validate([
            'site_longitude' => 'required|numeric|between:-180,180',
        ]);

        $validated = $request->validate([
            'site_latitude' => 'required|numeric|between:-90,90',
        ]);
         
        $site->update($validated);
        
        return redirect(route('sites.index'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site): RedirectResponse
    {
        $this->authorize('delete', $site);
 
        $site->delete();
 
        return redirect(route('sites.index'));        
    }
}
