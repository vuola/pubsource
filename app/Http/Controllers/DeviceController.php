<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Image;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $images = Image::all();
        $sites = Site::all();

        return view('devices.index', [
            'devices' => Device::latest()->get(),
            'images' => $images,
            'sites' => $sites,
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
            'device_location_description' => 'required|string|max:255',
            'device_IP_address' => 'ip',
            'device_IP_port' => 'integer|between:1,65535',
            'device_RTU_address' => 'nullable|integer|between:1,180',
            'device_schema' => 'required|json',
            'site_id' => 'required|integer|between:0,65535',
            'image_id' => 'required|integer|between:0,65535',
        ]);

        Device::create($validated);

        return redirect(route('devices.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        //
    }
}
