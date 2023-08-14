<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->name(),
            'product_picture' => $this->faker->word(),
            'product_default_protocol' => 'Mb_TCP',
            'product_default_IP_address' => '192.168.1.20',
            'product_default_IP_port' => '510',
            'product_default_RTU_address' => '2',
            'product_default_schema' => 
            '{
                "name": [
                    "currentBatteryCharge",
                    "currentBatteryDischarge",
                    "currentBatteryStateOfCharge",                
                    "gridFeedInOrPowerDrawn",
                    "currentPvFeedInActivePower"
                ],
                "multiplier": [
                    "1",
                    "1",
                    "1",
                    "1",
                    "1"
                ],
                "unit": [
                    "W",
                    "W",
                    "%",
                    "W",
                    "W"
                ]
            }'
        ];
    }
}
