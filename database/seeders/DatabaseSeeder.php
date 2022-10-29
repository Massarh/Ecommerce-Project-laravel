<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category [Laptop]
        Category::create([
            'name' => 'laptop',
            'slug' => 'laptop',
            'description' => 'laptop category',
            'image' => 'files/photo1.jpg'
        ]);

        // Category [Mobile Phone]
        Category::create([
            'name' => 'mobile phone',
            'slug' => 'mobile-phone',
            'description' => 'mobile phone category',
            'image' => 'files/photo1.jpg'
        ]);

        // Category [Bookes]
        Category::create([
            'name' => 'books',
            'slug' => 'books',
            'description' => 'books category',
            'image' => 'files/photo1.jpg'
        ]);


        // Subcategory [dell of category Laptop]
        Subcategory::create([
            'name' => 'dell',
            'category_id' => 1
        ]);

        Subcategory::create([ // Subcategory [hp of category Laptop]
            'name' => 'hp',
            'category_id' => 1
        ]);

        Subcategory::create([ // Subcategory [hp of category Laptop]
            'name' => 'lenovo',
            'category_id' => 1
        ]);


        // Product [hp of category Laptop]
        Product::create([
            'name' => 'HP LAPTOPS',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => rand(1, 3)
        ]);

        // Product [Dell of category Laptop]
        Product::create([
            'name' => 'DELL LAPTOPS',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => rand(1, 3),
            'subcategory_id' => 1 // dell laptop is id=1
        ]);

        // Product [hp of category Laptop]
        Product::create([
            'name' => 'LENOVO LAPTOPS',
            'image' => 'product/DbBdOLz8gpHxpJ0chvNsoXqPaq5wAZ52SBmK0Lr2.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => rand(1, 3),
            'subcategory_id' => 2 // hp laptop is id=2
        ]);

        // User [Laptop]
        User::create([
            'name' => 'laraAdmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'is_admin' => 1
        ]);
    }
}
