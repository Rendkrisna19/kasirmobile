<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Daging
            ['name' => 'Daging Sapi Premium', 'category' => 'daging', 'price' => 120000],
            ['name' => 'Daging Ayam Fillet', 'category' => 'daging', 'price' => 40000],
          
      
            // Seafood
            ['name' => 'Ikan Salmon Norwegia', 'category' => 'seafood', 'price' => 95000],
            ['name' => 'Udang Vannamei Besar', 'category' => 'seafood', 'price' => 75000],
           
        
            // Sayur
            ['name' => 'Sayur Bayam Organik', 'category' => 'sayur', 'price' => 15000],
            ['name' => 'Broccoli Hijau Segar', 'category' => 'sayur', 'price' => 20000],
      
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}