<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    const DUMMY_PRODUCTS = [
        [
            'name' => 'Sony WH-1000XM5 Wireless Noise Cancelling',
            'price' => '348.00',
            'old_price' => '399.00',
            'stock_quantity' => 1,
            'badge' => 'New',
            'rating' => 4.6,
            'rating_count' => 100,
            'image_url' => '/images/product1.png',
        ],
        [
            'name' => 'Bose QuietComfort 45 Bluetooth Wireless',
            'price' => '299.95',
            'old_price' => '349.95',
            'stock_quantity' => 2,
            'badge' => 'Sale',
            'rating' => 4.8,
            'rating_count' => 100,
            'image_url' => '/images/product2.png',
        ],
        [
            'name' => 'HyperX Cloud II Gaming Headset',
            'price' => '79.95',
            'old_price' => '99.95',
            'stock_quantity' => 3,
            'rating' => 4.5,
            'rating_count' => 100,
            'image_url' => '/images/product3.png',
        ],
        [
            'name' => 'Beats Studio3 Wireless Noise Cancelling',
            'price' => '199.95',
            'old_price' => '249.95',
            'stock_quantity' => 4,
            'rating' => 4.7,
            'rating_count' => 100,
            'image_url' => '/images/product4.png',
        ],
        [
            'name' => 'Audio-Technica ATH-M50xBT2',
            'price' => '149.00',
            'old_price' => '199.00',
            'stock_quantity' => 5,
            'rating' => 4.9,
            'rating_count' => 100,
            'image_url' => '/images/product5.png',
        ],
        [
            'name' => 'Apple AirPods Max - Sky Blue',
            'price' => '549.00',
            'old_price' => '649.00',
            'stock_quantity' => 6,
            'badge' => 'Premium',
            'rating' => 4.8,
            'rating_count' => 100,
            'image_url' => '/images/product6.png',
        ],
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DUMMY_PRODUCTS as $product) {
            Product::create($product);
        }
    }
}
