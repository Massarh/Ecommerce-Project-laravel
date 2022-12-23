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

        // Stores
        Category::create([
            'name' => 'H&M',  //1
            'slug' => 'H&M',
            'description' => 'Fast-fashion retailer H&M is likely to be onboarded by Trell as a partner brand as it uses social commerce platforms to reach more shoppers in the country. Based in Bengaluru, Trell is an influencer-based social commerce platform.',
            'image' => 'files/hm.jpg'
        ]);
        Category::create([
            'name' => 'PRADA', //2
            'slug' => 'PRADA',
            'description' => 'Today the Prada brand offers men and women leather goods, clothing and footwear, combining contemporary, innovative and sophisticated design with the uniqueness of handcrafted products. Prada also operates in the eyewear and fragrance sector.',
            'image' => 'files/Prada.jpg'
        ]);

        Category::create([
            'name' => 'ZARA', //3
            'slug' => 'ZARA',
            'description' => 'Zara is a Spanish multi-national retail clothing chain. It specialises in fast fashion, and sells clothing, accessories, shoes, beauty products and perfumes. The head office is in Arteixo, in A Coruña in Galicia.It is the largest constituent company of the Inditex group. ',
            'image' => 'files/zara.png'
        ]);

        Category::create([
            'name' => 'MANGO', //4
            'slug' => 'MANGO',
            'description' => 'Mango was founded in 1984 by brothers Isak Andic and Nahman Andic, the brand opened its first store in Barcelonas Paseo de Gracia. The name Mango was chosen because it sounds the same in the majority of languages around the world.',
            'image' => 'files/mango.png'
        ]);

        Category::create([
            'name' => 'PRETTY LITTLE THING', //5
            'slug' => 'PRETTY LITTLE THING',
            'description' => 'Pretty Little Thing is a UK-based fast-fashion retailer, aimed at 16-24-year-old women. The company is owned by Boohoo Group and operates in the UK, Ireland, Australia, US, France, Middle East and North Africa. ',
            'image' => 'files/PrettyLittleThings.png'
        ]);

        Category::create([
            'name' => 'DOLCE & GABBANA', //6
            'slug' => 'DOLCE & GABBANA',
            'description' => 'also known by initials D&G, is an Italian luxury fashion house founded in 1985 in Legnano by Italian designers Domenico Dolce and Stefano Gabbana.The house specializes in ready-to-wear, handbags, accessories, and cosmetics and licenses its name and branding to Luxottica for eyewear.',
            'image' => 'files/D&G.jpg'
        ]);

        Category::create([
            'name' => 'CHRISTIAN DIOR', //7
            'slug' => 'CHRISTIAN DIOR',
            'description' => 'Christian Dior SE commonly known as Dior (stylized Dior), is a French luxury fashion house controlled and chaired by French businessman Bernard Arnault, who also heads LVMH, the worlds largest luxury group',
            'image' => 'files/Christian Dior.jpg'
        ]);

        /*  Category::create([
            'name' => 'Gucci ', //8
            'slug' => 'Gucci ',
            'description' => 'is an Italian high-end luxury fashion house based in Florence, Italy. Its product lines include handbags, ready-to-wear, footwear, accessories, and home decoration; and it licenses its name and branding to Coty, Inc.',
            'image' => 'files/gucci.png'
        ]);*/



        // Subcategory 
        Subcategory::create([ //1
            'name' => 'MEN',
        ]);
        Subcategory::create([ //2
            'name' => 'WOMEN',
        ]);
        Subcategory::create([ //3
            'name' => 'KIDS',
        ]);
        Subcategory::create([ //4
            'name' => 'BAGS',
        ]);
        Subcategory::create([ //5
            'name' => 'ACCESSORIES',
        ]);
        Subcategory::create([ //6
            'name' => 'SHOES',
        ]);
        Subcategory::create([ //7
            'name' => 'HATS',
        ]);





        //Connectors

        /************************************** */
        //h&m has men women 
        CategorySubcategory::create([
            'category_id' => 1,
            'subcategory_id' => 1,
        ]);
        CategorySubcategory::create([
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        /***************************************/
        //Prada has women and kids 
        CategorySubcategory::create([
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);
        CategorySubcategory::create([
            'category_id' => 2,
            'subcategory_id' => 3,
        ]);

        /***************************************/
        //zara has men, women, kids and shoes 
        CategorySubcategory::create([
            'category_id' => 3,
            'subcategory_id' => 1,
        ]);
        CategorySubcategory::create([
            'category_id' => 3,
            'subcategory_id' => 2,
        ]);
        CategorySubcategory::create([
            'category_id' => 3,
            'subcategory_id' => 3,
        ]);
        CategorySubcategory::create([
            'category_id' => 3,
            'subcategory_id' => 6,
        ]);

        /***************************************/
        //Mango has women ,bags and shoes 
        CategorySubcategory::create([
            'category_id' => 4,
            'subcategory_id' => 2,
        ]);
        CategorySubcategory::create([
            'category_id' => 4,
            'subcategory_id' => 4,
        ]);
        CategorySubcategory::create([
            'category_id' => 4,
            'subcategory_id' => 6,
        ]);

        /***************************************/
        //pretty littile things has kids ,bags, accessories,shoes and hats 
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 3,
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 4,
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 5,
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 6,
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 7,
        ]);
        /***************************************/
        //Dolce & Gabbana  has men ,wemon ,kids and accessories
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 1,
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 2,
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 3,
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 5,
        ]);

        /***************************************/
        //DIOR has men.
        CategorySubcategory::create([
            'category_id' => 7,
            'subcategory_id' => 1,
        ]);

/***************************************/
        //gucci HAS MEN ,WEMON ,BAGS AND SHOES
        /*CategorySubcategory::create([
    'category_id' =>7,
    'subcategory_id' =>1,
    ]);
    CategorySubcategory::create([
        'category_id' =>7,
        'subcategory_id' => 2,
    ]);
    CategorySubcategory::create([
        'category_id' =>7,
        'subcategory_id' => 4,
    ]);
    CategorySubcategory::create([
        'category_id' =>7,
        'subcategory_id' => 6,
    ]);*/

/***************************************/
         //PRODUCTS

        //HM PRODUCTS 
        Product::create([
            'name' => 'H&M Men Product1',
            'image' => 'product/HM men (1).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product2',
            'image' => 'product/HM men (2).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'H&M Men Product3',
            'image' => 'product/HM men (3).jpg',
            'price' => 12.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product4',
            'image' => 'product/HM men (4).jpg',
            'price' => 11.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product5',
            'image' => 'product/HM men (5).jpg',
            'price' => 17.00,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M Men Product6',
            'image' => 'product/HM men (6).jpg',
            'price' => 16.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'H&M women Product1',
            'image' => 'product/HM women (1).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product2',
            'image' => 'product/HM women (2).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product3',
            'image' => 'product/HM women (3).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product4',
            'image' => 'product/HM women (4).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product5',
            'image' => 'product/HM women (5).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product6',
            'image' => 'product/HM women (6).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product7',
            'image' => 'product/HM women (7).jpg',
            'price' => 10.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product8',
            'image' => 'product/HM women (8).jpg',
            'price' => 22.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
      
        Product::create([
            'name' => 'H&M women Product9',
            'image' => 'product/HM women (9).jpg',
            'price' => 13.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product10',
            'image' => 'product/HM women (10).jpg',
            'price' => 13.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product11',
            'image' => 'product/HM women (11).jpg',
            'price' => 14.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product12',
            'image' => 'product/HM women (12).jpg',
            'price' => 14.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product13',
            'image' => 'product/HM women (13).jpg',
            'price' => 15.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product14',
            'image' => 'product/HM women (14).jpg',
            'price' => 16.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product15',
            'image' => 'product/HM women (15).jpg',
            'price' => 17.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'H&M women Product16',
            'image' => 'product/HM women (17).jpg',
            'price' => 19.60,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 1,
            'subcategory_id' => 2
        ]);


        //prada
        Product::create([
            'name' => 'Prada women Product1',
            'image' => 'product/PRADA women (1).jpg',
            'price' => 18.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada women Product2',
            'image' => 'product/PRADA women (2).jpg',
            'price' => 13.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada women Product3',
            'image' => 'product/PRADA women (3).jpg',
            'price' => 17.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada women Product4',
            'image' => 'product/PRADA women (4).jpg',
            'price' => 27.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada women Product5',
            'image' => 'product/PRADA women (5).jpg',
            'price' => 7.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada women Product6',
            'image' => 'product/PRADA women (6).jpg',
            'price' => 1.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Prada kids Product1',
            'image' => 'product/PRADA  kids  (1).jpg',
            'price' => 5.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada kids Product2',
            'image' => 'product/PRADA  kids  (2).jpg',
            'price' => 15.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada kids Product3',
            'image' => 'product/PRADA  kids  (3).jpg',
            'price' => 9.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada kids Product4',
            'image' => 'product/PRADA  kids  (4).jpg',
            'price' => 10.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Prada kids Product5',
            'image' => 'product/PRADA  kids  (5).jpg',
            'price' => 6.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 2,
            'subcategory_id' => 3
        ]);


        // zara Product
        Product::create([
            'name' => 'Zara Men Product1',
            'image' => 'product/zara men (1).jpg',
            'price' => 17.15,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product2',
            'image' => 'product/zara men (2).jpg',
            'price' => 9,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product3',
            'image' => 'product/zara men (3).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product4',
            'image' => 'product/zara men (4).jpg',
            'price' => 8.50,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product5',
            'image' => 'product/zara men (5).jpg',
            'price' => 7.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Men Product6',
            'image' => 'product/zara men (6).jpg',
            'price' => 6.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Zara Wemon Product1',
            'image' => 'product/zara women (1).jpg',
            'price' => 17.5,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product2',
            'image' => 'product/zara women (2).jpg',
            'price' => 4.5,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product3',
            'image' => 'product/zara women (3).jpg',
            'price' => 7.5,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product4',
            'image' => 'product/zara women (4).jpg',
            'price' => 6.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product5',
            'image' => 'product/zara women (5).jpg',
            'price' => 7.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Zara Wemon Product6',
            'image' => 'product/zara women (6).jpg',
            'price' => 11.90,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Zara kids Product1',
            'image' => 'product/zara kids (1).jpg',
            'price' => 11.00,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product2',
            'image' => 'product/zara kids (2).jpg',
            'price' => 12.00,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product3',
            'image' => 'product/zara kids (3).jpg',
            'price' => 12.80,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product4',
            'image' => 'product/zara kids (4).jpg',
            'price' => 13.40,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product5',
            'image' => 'product/zara kids (5).jpg',
            'price' => 14.40,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product6',
            'image' => 'product/zara kids (6).jpg',
            'price' => 14.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara kids Product7',
            'image' => 'product/zara kids (7).jpg',
            'price' => 14.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Zara shoes Product1',
            'image' => 'product/zara shoes (1).jpg',
            'price' => 30.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Zara shoes Product2',
            'image' => 'product/zara shoes (2).jpg',
            'price' => 30.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Zara shoes Product3',
            'image' => 'product/zara shoes (3).jpg',
            'price' => 20.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Zara shoes Product4',
            'image' => 'product/zara shoes (4).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Zara shoes Product5',
            'image' => 'product/zara shoes (5).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Zara shoes Product6',
            'image' => 'product/zara shoes (6).jpg',
            'price' => 19.95,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);

        //Christian Dior
        Product::create([
            'name' => 'Dior men Product1',
            'image' => 'product/dior men (1).jpg',
            'price' => 14.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product2',
            'image' => 'product/dior men (2).jpg',
            'price' => 14.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product3',
            'image' => 'product/dior men (3).jpg',
            'price' => 4.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product4',
            'image' => 'product/dior men (4).jpg',
            'price' => 20.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product5',
            'image' => 'product/dior men (5).jpg',
            'price' => 4.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product6',
            'image' => 'product/dior men (6).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product7',
            'image' => 'product/dior men (7).jpg',
            'price' => 11.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dior men Product8',
            'image' => 'product/dior men (8).jpg',
            'price' => 13.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1
        ]);


        //Dolce & Gabbana
        Product::create([
            'name' => 'Dolce & Gabbana Men Product1',
            'image' => 'product/D&G men (1).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product2',
            'image' => 'product/D&G men (2).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product3',
            'image' => 'product/D&G men (3).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product4',
            'image' => 'product/D&G men (4).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product5',
            'image' => 'product/D&G men (5).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product6',
            'image' => 'product/D&G men (6).jpg',
            'price' => 10.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Men Product7',
            'image' => 'product/D&G men (7).jpg',
            'price' => 20.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product1',
            'image' => 'product/D&G women (1).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product2',
            'image' => 'product/D&G women (2).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product3',
            'image' => 'product/D&G women (3).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product4',
            'image' => 'product/D&G women (4).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product5',
            'image' => 'product/D&G women (5).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product6',
            'image' => 'product/D&G women (6).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana women Product7',
            'image' => 'product/D&G women (7).jpg',
            'price' => 17.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product1',
            'image' => 'product/D&G kids (1).jpg',
            'price' => 9.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product2',
            'image' => 'product/D&G kids (2).jpg',
            'price' => 9.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product3',
            'image' => 'product/D&G kids (3).jpg',
            'price' => 9.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product4',
            'image' => 'product/D&G kids (5).jpg',
            'price' => 7.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product5',
            'image' => 'product/D&G kids (5).jpg',
            'price' => 9.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana kids Product6',
            'image' => 'product/D&G kids (6).jpg',
            'price' => 6.25,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product1',
            'image' => 'product/D&G acc (1).jpg',
            'price' => 2.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product2',
            'image' => 'product/D&G acc (2).jpg',
            'price' => 20.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product3',
            'image' => 'product/D&G acc (3).jpg',
            'price' => 4.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product4',
            'image' => 'product/D&G acc (4).jpg',
            'price' => 5.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product5',
            'image' => 'product/D&G acc (5).jpg',
            'price' => 7.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'Dolce & Gabbana Accessories Product6',
            'image' => 'product/D&G acc (6).jpg',
            'price' => 6.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);


        //Mango
        Product::create([
            'name' => 'Mango women Product1',
            'image' => 'product/mango women (1).jpg',
            'price' => 16.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Mango women Product2',
            'image' => 'product/mango women (2).jpg',
            'price' => 24.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Mango women Product3',
            'image' => 'product/mango women (3).jpg',
            'price' => 24.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Mango women Product4',
            'image' => 'product/mango women (4).jpg',
            'price' => 9.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Mango women Product5',
            'image' => 'product/mango women (5).jpg',
            'price' => 9.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Mango women Product6',
            'image' => 'product/mango women (6).jpg',
            'price' => 18.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
       
        Product::create([
            'name' => 'Mango women Product7',
            'image' => 'product/mango women (7).jpg',
            'price' => 19.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Mango bags Product1',
            'image' => 'product/mango bags (1).jpg',
            'price' => 16.24,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango bags Product2',
            'image' => 'product/mango bags (2).jpg',
            'price' => 19.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango bags Product3',
            'image' => 'product/mango bags (3).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango bags Product4',
            'image' => 'product/mango bags (4).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango bags Product5',
            'image' => 'product/mango bags (5).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
      
        Product::create([
            'name' => 'Mango bags Product6',
            'image' => 'product/mango bags (6).jpg',
            'price' => 15.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango bags Product7',
            'image' => 'product/mango bags (7).jpg',
            'price' => 5.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Mango shoes Product1',
            'image' => 'product/mango shoes (1).jpg',
            'price' => 20.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Mango shoes Product2',
            'image' => 'product/mango shoes (2).jpg',
            'price' => 10.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Mango shoes Product3',
            'image' => 'product/mango shoes (3).jpg',
            'price' => 19.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Mango shoes Product4',
            'image' => 'product/mango shoes (4).jpg',
            'price' => 11.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Mango shoes Product5',
            'image' => 'product/mango shoes (5).jpg',
            'price' => 13.05,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Mango shoes Product6',
            'image' => 'product/mango shoes (6).jpg',
            'price' => 8.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);


        //pretty little things 
        Product::create([
            'name' => 'PrettyLittleThing hats Product1',
            'image' => 'product/pretty hats (1).jpg',
            'price' => 2.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product2',
            'image' => 'product/pretty hats (2).jpg',
            'price' => 3.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product3',
            'image' => 'product/pretty hats (3).jpg',
            'price' => 5.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product4',
            'image' => 'product/pretty hats (4).jpg',
            'price' => 7.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product5',
            'image' => 'product/pretty hats (5).jpg',
            'price' => 6.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product6',
            'image' => 'product/pretty hats (6).jpg',
            'price' => 7.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing hats Product7',
            'image' => 'product/pretty hats (7).jpg',
            'price' => 1.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product1',
            'image' => 'product/pretty acc (1).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product2',
            'image' => 'product/pretty acc (2).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product3',
            'image' => 'product/pretty acc (3).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product4',
            'image' => 'product/pretty acc (4).jpg',
            'price' => 21.99,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product5',
            'image' => 'product/pretty acc (5).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product6',
            'image' => 'product/pretty acc (6).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PrettyLittleThing Accessories Product7',
            'image' => 'product/pretty acc (7).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);

        Product::create([
            'name' => 'PrettyLittleThing bags Product1',
            'image' => 'product/pretty bags (1).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product2',
            'image' => 'product/pretty bags (2).jpg',
            'price' => 10.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product3',
            'image' => 'product/pretty bags (3).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product4',
            'image' => 'product/pretty bags (4).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product5',
            'image' => 'product/pretty bags (5).jpg',
            'price' => 30.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product6',
            'image' => 'product/pretty bags (6).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing bags Product7',
            'image' => 'product/pretty bags (7).jpg',
            'price' => 16.65,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product1',
            'image' => 'product/pretty kids (1).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product3',
            'image' => 'product/pretty kids (3).jpg',
            'price' => 6.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product4',
            'image' => 'product/pretty kids (4).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product5',
            'image' => 'product/pretty kids (5).jpg',
            'price' => 7.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product6',
            'image' => 'product/pretty kids (6).jpg',
            'price' => 20.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing kids Product7',
            'image' => 'product/pretty kids (7).jpg',
            'price' => 6.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product1',
            'image' => 'product/pretty shoes (1).jpg',
            'price' => 15.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product2',
            'image' => 'product/pretty shoes (2).jpg',
            'price' => 12.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product3',
            'image' => 'product/pretty shoes (3).jpg',
            'price' => 17.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product4',
            'image' => 'product/pretty shoes (4).jpg',
            'price' => 15.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product5',
            'image' => 'product/pretty shoes (5).jpg',
            'price' => 15.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product6',
            'image' => 'product/pretty shoes (6).jpg',
            'price' => 11.29,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PrettyLittleThing shoes Product7',
            'image' => 'product/pretty shoes (7).jpg',
            'price' => 12.20,
            'description' => 'This is the description of a product',
            'additional_info' => 'This is additional info',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);





        // User 
        User::create([
            'name' => 'Super ADMIN',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0771496574',
            'user_role' => 'superadmin'
        ]);
        User::create([
            'name' => 'H&M ADMIN1',
            'email' => 'h&madmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777899878',
            'user_role' => 'admin',
            'category_id' => '1'
        ]);
        User::create([
            'name' => 'H&M EMPLOYEE1',
            'email' => 'h&memployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '1'
        ]);
        User::create([
            'name' => 'PRADA ADMIN1',
            'email' => 'pradaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '2'
        ]);
        User::create([
            'name' => 'PRADA EMPLOYEE1',
            'email' => 'pradaemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '2'
        ]);
        User::create([
            'name' => 'ZARA ADMIN1',
            'email' => 'zaraadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '3'
        ]);
        User::create([
            'name' => 'ZARA EMPLOYEE1',
            'email' => 'zaraemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '3'
        ]);
      
       
        User::create([
            'name' => 'MANGO ADMIN1',
            'email' => 'mangoadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '4'
        ]);
        User::create([
            'name' => 'MANGO EMPLOYEE1',
            'email' => 'mangoemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '4'
        ]);
        User::create([
            'name' => 'PRETTY LITTLE THING ADMIN1',
            'email' => 'prettylittlethingadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '5'
        ]);
        User::create([
            'name' => 'PRETTY LITTLE THING EMPLOYEE1',
            'email' => 'prettylittlethingemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '5'
        ]);
        User::create([
            'name' => 'DOLCE & GABBANA ADMIN1',
            'email' => 'dolce&gabbanaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '6'
        ]);
        User::create([
            'name' => 'DOLCE & GABBANA EMPLOYEE1',
            'email' => 'dolce&gabbanaemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '6'
        ]);
        User::create([
            'name' => 'CHRISTIAN DIOR ADMIN1',
            'email' => 'christiandioradmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '7'
        ]);
        User::create([
            'name' => 'CHRISTIAN DIOR EMPLOYEE1',
            'email' => 'christiandioremployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'Australia',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '7'
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
