<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Image;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHomeScenario(): void
    {
        $specificProducts = [
            ['product_name' => 'SMA Data Manager M', 'product_picture' => 'sma_data_manager_m.jpeg'],
            ['product_name' => 'Fronius Symo 6.0-3M', 'product_picture' => 'fronius_symo_6.0-3m.jpeg'],            
        ];

        $specificImages = [
            ['image_name' => 'sma_data_manager_m_mb_tcp', 'image_deploy' => 'kubectl apply -f sma_data_manager_m_mb_tcp.yaml', 'image_decomission' => 'kubectl delete -f sma_data_manager_m_mb_tcp.yaml'],
            ['image_name' => 'fronius_symo_6.0-3m_mb_tcp', 'image_deploy' => 'kubectl apply -f fronius_symo_6.0-3m_mb_tcp', 'image_decomission' => 'kubectl delete -f fronius_symo_6.0-3m_mb_tcp'],
        ];        

        foreach ($specificProducts as $productData) {
            Product::factory()->create([
                'product_name' => $productData['product_name'],
                'product_picture' => $productData['product_picture'],
            ]);
        }

        $product_id = 1;

        foreach ($specificImages as $imageData) {
            Image::factory()->create([
                'image_name' => $imageData['image_name'],
                'image_deploy' => $imageData['image_deploy'],
                'image_decomission' => $imageData['image_decomission'],
                'product_id' => $product_id, 
            ]);
            $product_id++;
        }      

    }
}
