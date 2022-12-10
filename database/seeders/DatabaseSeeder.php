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
            'image' => 'product/0706370707_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product2',
            'image' => 'product/0706394800_1_1_1.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product3',
            'image' => 'product/0706394800_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Wemon Product1',
            'image' => 'product/1934244800_1_1_1 (1).jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product2',
            'image' => 'product/1934244800_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product3',
            'image' => 'product/1889052407_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara kids Product1',
            'image' => 'product/2211514703_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product2',
            'image' => 'product/4012546803_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara Kids Product3',
            'image' => 'product/5507500721_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'H&M Men Product1',
            'image' => 'product/6662473802_2_4_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product2',
            'image' => 'product/6518310710_1_1_1.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product3',
            'image' => 'product/6515381800_2_6_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Wemon Product1',
            'image' => 'product/8197230441_15_2_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M Wemon Product2',
            'image' => 'product/8246249629_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M Wemon Product3',
            'image' => 'product/8246274712_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M kids Product1',
            'image' => 'product/5507500721_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'H&M kids Product2',
            'image' => 'product/5475500712_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'H&M Kids Product3',
            'image' => 'product/5770552712_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada Men Product1',
            'image' => 'product/9870801505_2_4_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Prada Men Product2',
            'image' => 'product/3918406505_1_1_1.jpg',
            'price' => rand(800, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Prada Men Product3',
            'image' => 'product/8288490422_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Prada Wemon Product1',
            'image' => 'product/6688090707_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada Wemon Product2',
            'image' => 'product/6840287407_15_5_1 (1).jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada Wemon Product3',
            'image' => 'product/6840294400_1_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada kids Product1',
            'image' => 'product/2582511070_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada kids Product2',
            'image' => 'product/4012546803_6_1_1.jpg',
            'price' => rand(700, 1000),
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada Kids Product3',
            'image' => 'product/4433521802_6_1_1.jpg',
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