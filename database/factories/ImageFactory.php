<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_platform' => 'Kubernetes',
            'image_protocol' => 'Mb_TCP',
            'image_name' => 'missing',
            'image_deploy' => 'kubectl apply -f missing.yaml',
            'image_decomission' => 'kubectl delete -f missing.yaml'
        ];
    }
}
