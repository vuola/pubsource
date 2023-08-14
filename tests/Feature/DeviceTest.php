<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Device;

class DeviceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHomeScenario(): void
    {
        $specificDevices = [
            ['device_location_description' => 'kellari'],
            ['device_location_description' => 'aitta'],
        ];

        $foreign_id = 1;

        foreach ($specificDevices as $deviceData) {
            Device::factory()->create([
                'device_location_description' => $deviceData['device_location_description'],
                'site_id' => $foreign_id,
                'image_id' => $foreign_id, 
            ]);
            $foreign_id++;
        }
    }      
}
