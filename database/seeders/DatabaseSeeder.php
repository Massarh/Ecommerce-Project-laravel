<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\CategorySubcategory;
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
            'description' => 'Zara store',
            'image' => 'files/zara.png'
        ]);

        Category::create([
            'name' => 'H&M',
            'slug' => 'H&M',
            'description' => 'H&M store',
            'image' => 'files/hm.jpg'
        ]);

        Category::create([
            'name' => 'Prada',
            'slug' => 'Prada',
            'description' => 'Prada store',
            'image' => 'files/Prada.jpg'
        ]);

        // Subcategory
        Subcategory::create([
            'name' => 'Men',
            
        ]);

        Subcategory::create([
            'name' => 'Wemon',
            
        ]);

        Subcategory::create([
            'name' => 'Kid',
        ]);

        CategorySubcategory::create([
            'category_id' =>1 ,
            'subcategory_id' => 1,
        ]);

        CategorySubcategory::create([
            'category_id' =>1 ,
            'subcategory_id' => 2,
        ]);

         CategorySubcategory::create([
            'category_id' =>1 ,
            'subcategory_id' => 3,
        ]);

         CategorySubcategory::create([
            'category_id' =>2 ,
            'subcategory_id' => 1,
        ]);

         CategorySubcategory::create([
            'category_id' =>2 ,
            'subcategory_id' => 2,
        ]); 
        
        CategorySubcategory::create([
            'category_id' =>2 ,
            'subcategory_id' => 3,
        ]);
        
        CategorySubcategory::create([
            'category_id' =>3,
            'subcategory_id' => 1,
        ]);
        
        CategorySubcategory::create([
            'category_id' =>3 ,
            'subcategory_id' => 2,
        ]);
        
        CategorySubcategory::create([
            'category_id' =>3 ,
            'subcategory_id' => 3,
        ]);



       // Product
        Product::create([
            'name' => 'Zara Men Product1',
            'image' => 'product/5e6c4921541cdbb458e1eae641981cd0.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Men Product2',
            'image' => 'product/7b71c13faf3a19a8c65408b72d0e5537.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Men Product3',
            'image' => 'product/66beb6e9bfb4a3ebda71b4122ba4bc08.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Zara Wemon Product1',
            'image' => 'product/6c0a407d9ed7b1bc94bb6cd29b8aa722.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara Wemon Product2',
            'image' => 'product/7ed6d1a6779a62cf4df219c84ee91a02.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara Wemon Product3',
            'image' => 'product/53dc7c10517c15408d504f5f3f8b0a22.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2

        ]);

        Product::create([
            'name' => 'Zara kids Product1',
            'image' => 'product/50b0f58b05d713311ce5e99fb850f338.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3

        ]);

        Product::create([
            'name' => 'Zara kids Product2',
            'image' => 'product/1473720732_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Zara Kids Product3',
            'image' => 'product/3183800707_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'H&M Men Product1',
            'image' => 'product/0069381705_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'H&M Men Product2',
            'image' => 'product/0322165667_1_1_1.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);


        Product::create([
            'name' => 'H&M Men Product3',
            'image' => 'product/0952165800_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'H&M Wemon Product1',
            'image' => 'product/0888961401_2_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'H&M Wemon Product2',
            'image' => 'product/1104110800_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'H&M Wemon Product3',
            'image' => 'product/2351010800_2_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'H&M kids Product1',
            'image' => 'product/9006793807_15_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'H&M kids Product2',
            'image' => 'product/d1bad2683f12d74fbd7d23e545fbc0b3.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'H&M Kids Product3',
            'image' => 'product/e5ceea4f3821611f46708786aecc8a1d.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Prada Men Product1',
            'image' => 'product/5070770401_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Prada Men Product2',
            'image' => 'product/0322165667_1_1_1.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Prada Men Product3',
            'image' => 'product/7545403250_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'Prada Wemon Product1',
            'image' => 'product/4360244712_9_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Prada Wemon Product2',
            'image' => 'product/3360010808_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Prada Wemon Product3',
            'image' => 'product/best-zara-items-2020-288836-1603298850620-main.1200x0c.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Prada kids Product1',
            'image' => 'product/d7c25e63a644a762369aefd4d4490b8c.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Prada kids Product2',
            'image' => 'product/d1bad2683f12d74fbd7d23e545fbc0b3.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Prada Kids Product3',
            'image' => 'product/83d44da9cbb2aabb31e899c4ce91fa16.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
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
            'name' => 'H&M Admin1',
            'email' => 'H&Madmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '2'
        ]);

        User::create([
            'name' => 'H&M Employee1',
            'email' => 'H&Memployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '2'
        ]);

        User::create([
            'name' => 'Prada Admin1',
            'email' => 'Pradaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '3'
        ]);

        User::create([
            'name' => 'Prada Employee1',
            'email' => 'Pradaemployee1@gmail.com',
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