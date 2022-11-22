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

        // Category
        Category::create([
            'name' => 'Zara',
            'slug' => 'Zara',
            'description' => 'Zara category',
            'image' => 'files/photo1.jpg'
        ]);

        Category::create([
            'name' => 'Nike',
            'slug' => 'Nike',
            'description' => 'Nike category',
            'image' => 'files/photo1.jpg'
        ]);

        Category::create([
            'name' => 'Adidas',
            'slug' => 'Adidas',
            'description' => 'Adidas category',
            'image' => 'files/photo1.jpg'
        ]);

        // Subcategory
        Subcategory::create([
            'name' => 'Zara Men',
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Zara Wemon',
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Zara Kids',
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Nike Men',
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Nike Wemon',
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Nike Kids',
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Adidas Men',
            'category_id' => 3
        ]);

        Subcategory::create([
            'name' => 'Adidas Wemon',
            'category_id' => 3
        ]);

        Subcategory::create([
            'name' => 'Adidas Kids',
            'category_id' => 3
        ]);

        // Product
        Product::create([
            'name' => 'Zara Men Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Men Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Men Product3',
            'image' => 'product/DbBdOLz8gpHxpJ0chvNsoXqPaq5wAZ52SBmK0Lr2.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Wemon Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara Wemon Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara Wemon Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara kids Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3

        ]);

        Product::create([
            'name' => 'Zara kids Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Zara Kids Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Nike Men Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 4
        ]);

        Product::create([
            'name' => 'Nike Men Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 4
        ]);


        Product::create([
            'name' => 'Nike Men Product3',
            'image' => 'product/DbBdOLz8gpHxpJ0chvNsoXqPaq5wAZ52SBmK0Lr2.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 4
        ]);

        Product::create([
            'name' => 'Nike Wemon Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 5
        ]);

        Product::create([
            'name' => 'Nike Wemon Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 5
        ]);

        Product::create([
            'name' => 'Nike Wemon Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 5
        ]);

        Product::create([
            'name' => 'Nike kids Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 6
        ]);

        Product::create([
            'name' => 'Nike kids Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 6
        ]);

        Product::create([
            'name' => 'Nike Kids Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 6
        ]);

        Product::create([
            'name' => 'Adidas Men Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 7
        ]);

        Product::create([
            'name' => 'Adidas Men Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 7
        ]);

        Product::create([
            'name' => 'Adidas Men Product3',
            'image' => 'product/DbBdOLz8gpHxpJ0chvNsoXqPaq5wAZ52SBmK0Lr2.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 7
        ]);

        Product::create([
            'name' => 'Adidas Wemon Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 8
        ]);

        Product::create([
            'name' => 'Adidas Wemon Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 8
        ]);

        Product::create([
            'name' => 'Adidas Wemon Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 8
        ]);

        Product::create([
            'name' => 'Adidas kids Product1',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 9
        ]);

        Product::create([
            'name' => 'Adidas kids Product2',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 9
        ]);

        Product::create([
            'name' => 'Adidas Kids Product3',
            'image' => 'product/e5V57M2KdoGlgYvkSQqLgu4CqIwf1pLBNZEvNJE7.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 9
        ]);

        // User 
        User::create([
            'name' => 'Super Admin1',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'superadmin'
        ]);

        User::create([
            'name' => 'Zara Admin1',
            'email' => 'zaraadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '1'
        ]);

        User::create([
            'name' => 'Zara Employee1',
            'email' => 'zaraemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '1'
        ]);

        User::create([
            'name' => 'Nike Admin1',
            'email' => 'nikeadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '2'
        ]);

        User::create([
            'name' => 'Nike Employee1',
            'email' => 'nikeemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '2'
        ]);

        User::create([
            'name' => 'Adidas Admin1',
            'email' => 'adidasadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '3'
        ]);

        User::create([
            'name' => 'Adidas Employee1',
            'email' => 'adidasemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '3'

        ]);
        User::create([
            'name' => 'customer1',
            'email' => 'customer1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([
            'name' => 'customer2',
            'email' => 'customer2@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([
            'name' => 'customer3',
            'email' => 'customer3@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
    }
}
