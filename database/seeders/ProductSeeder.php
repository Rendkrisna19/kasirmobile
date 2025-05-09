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
            ['name' => 'Tempe Mendoan', 'category' => 'foods', 'price' => 12000],
            ['name' => 'Ayam Penyet', 'category' => 'foods', 'price' => 12000],
            ['name' => 'Ayam pecak', 'category' => 'foods', 'price' => 15000],
                
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}