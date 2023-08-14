<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device_location_description' => $this->faker->streetName,
            'device_protocol' => 'Mb_TCP',
            'device_IP_address' => '192.168.1.20',
            'device_IP_port' => '510',
            'device_RTU_address' => '2',
            'device_schema' =>
            '{
                "name": [
                    "gridFeedInOrPowerDrawn",
                    "currentPvFeedInActivePower"
                ],
                "multiplier": [
                    "1",
                    "1"
                ],
                "unit": [
                    "W",
                    "W"
                ]
            }',
            'device_collector_name' => 'missing',
            'device_collector_status' => 'missing', 
        ];
    }
}
