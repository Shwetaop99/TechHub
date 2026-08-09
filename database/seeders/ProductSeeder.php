<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

use Exception;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Remove existing products
        Product::truncate();

        $products = [

            [
                'name' => 'MacBook Pro',
                'category' => 'Laptops',
                'price' => 159999,
                'description' => 'Powerful laptop for work and creativity.',
                'image_file' => 'macbook.jpg',
                'stock' => 20,
                'sold_count' => 35,
            ],

            [
                'name' => 'iPhone 16 Pro',
                'category' => 'Phones',
                'price' => 119999,
                'description' => 'Premium smartphone with advanced features.',
                'image_file' => 'iphone.jpg',
                'stock' => 30,
                'sold_count' => 52,
            ],

            [
                'name' => 'Sony WH-1000XM5',
                'category' => 'Headphones',
                'price' => 29999,
                'description' => 'Premium noise-cancelling wireless headphones.',
                'image_file' => 'headphones.jpg',
                'stock' => 25,
                'sold_count' => 41,
            ],

            [
                'name' => 'Galaxy Buds 3 Pro',
                'category' => 'Earbuds',
                'price' => 17999,
                'description' => 'Wireless earbuds with premium sound quality.',
                'image_file' => 'earbuds.jpg',
                'stock' => 40,
                'sold_count' => 67,
            ],

            [
                'name' => 'Apple Watch Series 10',
                'category' => 'Smart Watches',
                'price' => 44999,
                'description' => 'Advanced smartwatch for fitness and everyday use.',
                'image_file' => 'watch.jpg',
                'stock' => 15,
                'sold_count' => 28,
            ],

            [
                'name' => 'Samsung 27 inch 4K Monitor',
                'category' => 'Monitors',
                'price' => 32999,
                'description' => 'Sharp 4K display perfect for work and entertainment.',
                'image_file' => 'monitor.jpg',
                'stock' => 18,
                'sold_count' => 23,
            ],

            [
                'name' => 'Logitech MX Keys',
                'category' => 'Keyboards',
                'price' => 9999,
                'description' => 'Premium wireless keyboard for productivity.',
                'image_file' => 'keyboard.jpg',
                'stock' => 35,
                'sold_count' => 46,
            ],

            [
                'name' => 'Logitech MX Master 3S',
                'category' => 'Mouse',
                'price' => 7999,
                'description' => 'Advanced wireless mouse for work and productivity.',
                'image_file' => 'mouse.jpg',
                'stock' => 30,
                'sold_count' => 54,
            ],

            [
                'name' => 'ASUS ROG Gaming Laptop',
                'category' => 'Gaming',
                'price' => 149999,
                'description' => 'High-performance gaming machine built for demanding games.',
                'image_file' => 'asus-rog-gaming-laptop.jpg',
                'stock' => 12,
                'sold_count' => 19,
            ],

            [
                'name' => 'Sony Alpha Camera',
                'category' => 'Cameras',
                'price' => 89999,
                'description' => 'Professional mirrorless camera for photography and video.',
                'image_file' => 'camera.jpg',
                'stock' => 10,
                'sold_count' => 16,
            ],

        ];


        foreach ($products as $product) {

            /*
            |--------------------------------------------------------------------------
            | Local Image Path
            |--------------------------------------------------------------------------
            */

            $imagePath = public_path(
                'images/' . $product['image_file']
            );


            /*
            |--------------------------------------------------------------------------
            | Check Image Exists
            |--------------------------------------------------------------------------
            */

            if (!file_exists($imagePath)) {

                throw new Exception(
                    'Image not found: ' . $imagePath
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Upload Image To Cloudinary
            |--------------------------------------------------------------------------
            */

            $uploadedImage = (new \Cloudinary\Api\Upload\UploadApi())->upload(
    $imagePath
);

$image = $uploadedImage['secure_url'];


            /*
            |--------------------------------------------------------------------------
            | Save Product To Database
            |--------------------------------------------------------------------------
            */

            Product::create([

                'name' => $product['name'],

                'category' => $product['category'],

                'price' => $product['price'],

                'description' => $product['description'],

                'image' => $image,

                'stock' => $product['stock'],

                'sold_count' => $product['sold_count'],

            ]);

        }
    }
}