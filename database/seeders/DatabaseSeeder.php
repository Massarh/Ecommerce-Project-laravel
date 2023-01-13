<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Category;
use App\Models\StoreCategory;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        /** MEN   ->  TOPS, HOODIES & SEWATSHIRTS, KNITWEAR, OUTWEAR*/
        /** WOMEN ->  ACCESSORIES & JEWELRY, SHOES, BAGS*/
        /** KIDS  ->  KNITWEAR, OUTWEAR, TWO-PIECES & JUMPSUITS, PANTS, SHOES, BAGS, HATS*/

        /*      Stores      */

        /* daraghmeh has MEN & KIDS */
        /* daragmeh has TWO-PIECES & JUMPSUITS ,OUTWEAR ,SHOES ,TOPS , HOODIES & SEWATSHIRTS */
        Store::create([
            'name'        => 'DARAGHMEH', //1
            'slug'        => 'DARAGHMEH',
            'description' => '(DR) is a clothing company based in Jordan, which owns the DR trademark. A group of companies and branches, its first branch was opened in 1984. In addition to shoes, bags, accessories, toys, cosmetics, perfumes, personal care and everything that receives the family, as it is considered one of the major companies in the sector of Jordan.',
            'image'       => 'public/files/Daragmeh.png'
        ]);

        /* La Familia has WOMEN & KIDS  */
        /* La Familia has OUTWEAR , PANTS , ACCESSORIES & JEWELRY , Bag*/
        Store::create([
            'name'        => 'LA FAMILIA', //2
            'slug'        => 'LA FAMILIAA',
            'description' => 'La Familia is brand that caters for the whole family with high quality for everyone',
            'image'       => 'public/files/lafamilia.png'
        ]);

        /* PRETTY LITTLE THINGS has WOMEN & kids */
        /* PRETTY LITTLE THINGS has HATS ,SHOES ,BAGS */
        Store::create([
            'name'        => 'PRETTY LITTLE THINGS', //3
            'slug'        => 'PRETTY LITTLE THINGS',
            'description' => "Shop the latest women's fashion at PrettyLittleThing. Hit refresh on your wardrobe and discover thousands of this season's must-have looks online at PLT.",
            'image'       => 'public/files/PrettyLittleThings.png'
        ]);

        /* Jack jones has MEN */
        /* Jack jones has KNITWEAR , OUTWEAR*/
        Store::create([
            'name'        => 'JACK & JONES ', //4
            'slug'        => 'JACK & JONES ',
            'description' => 'JACK & JONES was founded as a jeanswear brand in Denmark in 1990. From small beginnings, the brand has evolved and is now the largest business unit in the BESTSELLER A/S group – and is, with its 1000+ stores, the biggest menswear retailer in Jordan. ',
            'image'       => 'public/files/jack&jones.png'
        ]);

        /*      Categories      */

        Category::create([ //1
            'name' => 'TOPS',
            'slug' => 'TOPS',
        ]);
        Category::create([ //2
            'name' => 'HOODIES & SEWATSHIRTS',
            'slug' => 'HOODIES & SEWATSHIRTS',
        ]);
        Category::create([ //3
            'name' => 'KNITWEAR',
            'slug' => 'KNITWEAR',
        ]);
        Category::create([ //4
            'name' => 'OUTWEAR',
            'slug' => 'OUTWEAR',
        ]);
        Category::create([ //5
            'name' => 'TWO-PIECES & JUMPSUITS',
            'slug' => 'TWO-PIECES & JUMPSUITS',
        ]);
        Category::create([ //6
            'name' => 'SKIRTS',
            'slug' => 'SKIRTS',
        ]);
        Category::create([ //7
            'name' => 'PANTS',
            'slug' => 'PANTS',
        ]);
        Category::create([ //8
            'name' => 'ACCESSORIES & JEWELRY',
            'slug' => 'ACCESSORIES & JEWELRY',
        ]);
        Category::create([ //9
            'name' => 'SHOES',
            'slug' => 'SHOES',
        ]);
        Category::create([ //10
            'name' => 'BAGS',
            'slug' => 'BAGS',
        ]);
        Category::create([ //11
            'name' => 'HATS',
            'slug' => 'HATS',
        ]);


        /*      Connectors       */

        /* daragmeh */
        /* daragmeh has TWO-PIECES & JUMPSUITS ,OUTWEAR ,SHOES ,TOPS , HOODIES & SEWATSHIRTS    */
        /* daraghmeh has men & kids */

        StoreCategory::create([
            'store_id'    => 1,
            'category_id' => 1, //TOPS 
        ]);

        StoreCategory::create([
            'store_id'    => 1,
            'category_id' => 2, //HOODIES & SEWATSHIRTS 
        ]);

        StoreCategory::create([
            'store_id'    => 1,
            'category_id' => 4, //OUTWEAR 
        ]);

        StoreCategory::create([
            'store_id'    => 1,
            'category_id' => 5, //TWO-PIECES & JUMPSUITS 
        ]);

        StoreCategory::create([
            'store_id'    => 1,
            'category_id' => 9, //SHOES 
        ]);

        /* La Familia */
        /* La Familia has WOMEN & KIDS  */
        /* La Familia has OUTWEAR , PANTS , ACCESSORIES & JEWELRY , Bag*/

        /* Connectors*/
        StoreCategory::create([
            'store_id'    => 2,
            'category_id' => 4, //OUTWEAR 
        ]);

        StoreCategory::create([
            'store_id'    => 2,
            'category_id' => 7, //PANTS  
        ]);

        StoreCategory::create([
            'store_id'    => 2,
            'category_id' => 8, //ACCESSORIES & JEWELRY
        ]);

        StoreCategory::create([
            'store_id'    => 2,
            'category_id' => 10, // BAGS
        ]);

        /* PRETTY LITTLE THINGS */
        /* PRETTY LITTLE THINGS has HATS ,SHOES ,BAGS */
        /* PRETTY LITTLE THINGS has WOMEN & kids */
        StoreCategory::create([
            'store_id'    => 3,
            'category_id' => 9, //SHOES 
        ]);

        StoreCategory::create([
            'store_id'    => 3,
            'category_id' => 10, //BAGS 
        ]);
        StoreCategory::create([
            'store_id'    => 3,
            'category_id' => 11, //HATS
        ]);

        /* Jack jones */
        /* Jack jones has KNITWEAR , OUTWEAR*/
        /* Jack jones has Men */

        StoreCategory::create([
            'store_id'    => 4,
            'category_id' => 3, //KNITWEAR
        ]);

        StoreCategory::create([
            'store_id'    => 4,
            'category_id' => 4, //OUTWEAR 
        ]);



        /*      PRODUCTS        */

        /* daragmeh */
        /* daraghmeh has men & kids */
        /* daragmeh has TWO-PIECES & JUMPSUITS ,OUTWEAR ,SHOES ,TOPS , HOODIES & SEWATSHIRTS    */

        //daraghmeh
        //TWO-PIECES & JUMPSUITS
        Product::create([
            'name'        => '2-piece shirt and trousers set [D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/2-pack Printed Cotton Pajama Jumpsuits Blue Mickey Mouse  27.20 .jpg',
            'price'       => 9.85,
            'description' => 'Set with a soft cotton flannel shirt and cotton twill trousers. Shirt with a collar, buttons down the front and long sleeves with buttoned cuffs. ',
            'additional_info' => ' Trousers with adjustable elastication at the waist, fake front pockets and a fake fly with a button.',
            'store_id'    => 1,
            'category_id' => 5,
            'section'     => 'KIDS'
        ]);

        Product::create([
            'name'        => '3-piece Cotton Set [D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/2-piece Cotton Set 32.50.jpg',
            'price'       => 7.48,
            'description' => 'Dressy set with a shirt, sweater vest, and pants in cotton. Shirt in woven fabric with a collar, buttons at front, long sleeves with button at cuffs, and a gently rounded hem.',
            'additional_info' => 'Jacquard-knit sweater vest with a V-neck and rib-knit trim at neck, armholes, and hem. Tapered pants in twill with an adjustable, elasticized waistband, mock fly with button, diagonal mock front pockets, and rolled up hems.',
            'number_of_sold'  => 1,
            'store_id'    => 1,
            'category_id' => 5,
            'section'     => 'KIDS'
        ]);

        Product::create([
            'name'        => '2-piece Fleece Set [D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/2-piece Fleece Set 19.99.jpg',
            'price'       => 15.7,
            'description' => 'Padded snowsuit in woven fabric. Hood with ear appliqués at top',
            'additional_info' => 'Zipper at front extending along one leg, chin guard at top, and foldover mitts and feet to keep hands and feet warm. Lined.',
            'store_id'    => 1,
            'category_id' => 3,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => '2-piece Knit Cotton Set[D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/2-piece Knit Cotton Set 27.99.jpg',
            'price'       => 14.6,
            'description' => 'Quilted, padded jacket in woven fabric with a printed pattern.',
            'additional_info' => 'Stand-up collar, detachable hood, and zipper at front with anti-chafe chin guard. Concealed elastic at cuffs and hem. Lined.',
            'store_id'    => 1,
            'category_id' => 3,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => '2-piece shirt and trousers [D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/2-piece shirt and trousers set 24.99.jpg',
            'price'       => 7.56,
            'description' => 'Low-profile sneakers in faux suede. Hook-loop tabs at front, padded edge, and a small loop at back. ',
            'additional_info' => ' Mesh lining, mesh insoles, and patterned rubber soles. Sole thickness 3/4 in.',
            'store_id'    => 1,
            'category_id' => 3,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Shirt and Chinos [D,K,TWO-PIECES & JUMPSUITS]',
            'image'       => 'public/product/Shirt and Chinos 29.25.jpg',
            'price'       => 17.8,
            'description' => 'Warm-lined boots in faux leather with lacing at front, zip at side, and loop at back. Faux shearling lining and insoles.',
            'additional_info' => '',
            'store_id'    => 1,
            'category_id' => 3,
            'section'     => 'KIDS'
        ]);

        //daraghmeh
        //OUTWEAR 
        Product::create([
            'name'        => 'Bomber Jacket [D,K,OUTWEAR]',
            'image'       => 'public/product/Oversized Bomber Jacket 26.99.jpg',
            'price'       => 16.44,
            'description' => 'Oversized Bomber Jacket',
            'additional_info' => 'Fluffy Oversized Bomber Jacket',
            'number_of_sold'  => 2,
            'store_id'    => 1,
            'category_id' => 4,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Padded Hooded Parka [D,K,OUTWEAR]',
            'image'       => 'public/product/Padded Hooded Parka 64.99.jpg',
            'price'       => 20.7,
            'description' => 'Suit vest in woven fabric with shiny woven fabric at back.',
            'additional_info' => 'Buttons at front, a chest pocket, welt front pockets, and adjustable tab at back. Lined.',
            'store_id'    => 1,
            'category_id' => 4,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Puffer Vest [D,K,OUTWEAR]',
            'image'       => 'public/product/Puffer Vest 29.99.jpg',
            'price'       => 15.82,
            'description' => 'Relaxed-fit Puffer Vest in cotton-blend fabric with soft, brushed inside. ',
            'additional_info' => 'Jersey-lined drawstring hood, kangaroo pocket, and long sleeves. Wide ribbing at cuffs and hem.',
            'store_id'    => 1,
            'category_id' => 4,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Teddy Jacket [D,K,OUTWEAR]',
            'image'       => 'public/product/Teddy Jacket 29.27.jpg',
            'price'       => 10.59,
            'description' => 'Teddy Jacket. Waistband with concealed hook-and-eye fastener and a zip fly.',
            'additional_info' => 'Side pockets and welt back pockets with button.',
            'store_id'    => 1,
            'category_id' => 4,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Water-repellent [D,K,OUTWEAR]',
            'image'       => 'public/product/Water-repellent Jacket 40.00.jpg',
            'price'       => 12.8,
            'description' => 'Relaxed-fit Water-repellent Jacket in cotton-blend fabric with soft, brushed inside',
            'additional_info' => 'Jersey-lined drawstring hood, kangaroo pocket, and long sleeves. Wide ribbing at cuffs and hem.',
            'store_id'    => 1,
            'category_id' => 1,
            'section'     => 'KIDS'
        ]);

        //daraghmeh
        //shoes
        Product::create([
            'name'        => 'Padded Baby Bunting [D,K,shoes]',
            'image'       => 'public/product/.Padded Baby Bunting 20.23 jpg.jpg',
            'price'       => 15.44,
            'description' => 'relaxed-fit, Padded Baby Bunting in a soft, undyed wool blend. Pointed lapels,',
            'additional_info' => ' decorative buttons at cuffs, and a vent at back. Chest pocket, patch front pockets, and two inner pockets. Lined.',
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Sneakers [D,K,shoes]',
            'image'       => 'public/product/Sneakers 29.99.jpg',
            'price'       => 7.9,
            'description' => 'Sneakers woven stretch fabric.',
            'additional_info' => 'Narrow, notched lapels and decorative buttons at cuffs. Chest pocket, front pockets with flap, and an inner pocket. Vent at back. Lined.',
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Warm-lined Boots [D,K,shoes]',
            'image'       => 'public/product/Warm-lined Boots 19.99.jpg',
            'price'       => 8.8,
            'description' => 'Warm-lined Boots with a slight stretch for good comfort. Straight leg and a slim fit from the waist through the thigh to the hem.',
            'additional_info' => ' Regular Warm-lined Boots. Easily styled for sleek or sporty.',
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Warm-lined Boots [D,K,shoes]',
            'image'       => 'public/product/Warm-lined Boots 20.33.jpg',
            'price'       => 15.1,
            'description' => 'Warm-lined Boots jersey. Ribbed crew neck and straight-cut hem.',
            'additional_info' => 'Warm-lined Boots',
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Warm-lined High Tops [D,K,shoes]',
            'image'       => 'public/product/Warm-lined High Tops 24.99.jpg',
            'price'       => 15.5,
            'description' => 'Warm-lined High Tops Boots with toe caps, lacing at front, zipper at one side, and a loop at back',
            'additional_info' => 'Warm-lined High Tops Cotton canvas lining and insoles. Fluted soles. Heel height 1 1/4 in.',
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'Chunky Boots [D,K,shoes]',
            'image'       => 'public/product/Warm-lined Boots 29.99.jpg',
            'price'       => 12.99,
            'description' => 'Chunky Boots in mesh with a padded edge and tongue, lacing at front, and loop at back.',
            'additional_info' => 'Piqué lining, piqué insoles, and chunky, patterned soles. Sole thickness 2 in.',
            'number_of_sold'  => 1,
            'store_id'    => 1,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);


        //daraghmeh
        //TOPS
        Product::create([
            'name'        => '10-pack Regular Fit Crew-neck [D,M,TOPS]',
            'image'       => 'public/product/10-pack Regular Fit Crew-neck T-shirts 74.99.jpg',
            'price'       => 16.7,
            'description' => '10-pack Regular Fit Crew-neck. Canvas lining and insoles.',
            'additional_info' => '10-pack Regular Fit Crew-neck',
            'store_id'    => 1,
            'category_id' => 1, //TOPS 
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Long-sleeved Shirt [D,M,TOPS]',
            'image'       => 'public/product/Long-sleeved Shirt Long Fit 12.99.jpg',
            'price'       =>   3.4,
            'description' => 'Long-sleeved Shirt a loop at front and back. ',
            'additional_info' => 'Long-sleeved Shirt lining, canvas insoles, and chunky, patterned soles. Heel height 1 1/4 in.',
            'store_id'    => 1,
            'category_id' => 1,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Printed T-shirt [D,M,TOPS]',
            'image'       => 'public/product/Printed T-shirt 8.66.jpg',
            'price'       => 2.2,
            'description' => 'Printed T-shirt at back.',
            'additional_info' => 'Printed T-shirt Cotton canvas lining and insoles. Patterned soles. Sole thickness 1 1/2 in.',
            'store_id'    => 1,
            'category_id' => 1,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Slim Fit Polo Shirt [D,M,TOPS]',
            'image'       => 'public/product/Slim Fit Polo Shirt 12.88.jpg',
            'price'       => 5.88,
            'description' => 'Slim Fit Polo Shirt  details. Padded upper edge, padded tongue, and lacing at front.',
            'additional_info' => ' Slim Fit Polo Shirt  Jersey lining, piqué insoles, and chunky, patterned soles. Sole thickness 2 1/2 in.',
            'number_of_sold'  => 2,
            'store_id'    => 1,
            'category_id' => 1,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Sports top [D,M,TOPS]',
            'image'       => 'public/product/Sports top 12.50.jpg',
            'price'       => 3.33,
            'description' => 'Sports top leather details. Padded upper edge, padded tongue, and lacing at front.',
            'additional_info' => 'Sports top Jersey lining, piqué insoles, and chunky, patterned soles. Sole thickness 2 1/2 in.',
            'store_id'    => 1,
            'category_id' => 1,
            'section'     => 'MEN'
        ]);


        //hoodie & sweetshirts
        Product::create([
            'name'        => 'hoodie [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/hoodie 20.66jpg.jpg',
            'price'       => 9.86,
            'description' => 'hoodie lacing at front.',
            'additional_info' => 'hoodie oversize',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Printed Sweatshirt [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/Oversized Fit Printed Sweatshirt29.99.jpg',
            'price'       => 13.5,
            'description' => 'Sweatshirt Padded upper edge, ',
            'additional_info' => '',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Relaxed Fit Hoodie [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/Relaxed Fit Hoodie 24.99.jpg',
            'price'       => 15.9,
            'description' => 'Sweatshirt Relaxed Fit Hoodie at front.',
            'additional_info' => 'Fit Hoodie',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Relaxed Hoodie  [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/Relaxed Fit Hoodie 34.99.jpg',
            'price'       => 17.5,
            'description' => 'Relaxed Fit Hoodie with high quality ',
            'additional_info' => 'Fit to size ',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Polo Shirt [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/Relaxed Fit Polo Shirt 29.33 .jpg',
            'price'       =>  10.2,
            'description' => 'Relaxed Fit Hoodie Polo Shirt',
            'additional_info' => '',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'Relaxed-fit Hoodie [D,M,hoodie & sweetshirts]',
            'image'       => 'public/product/Relaxed-fit Hoodie 34.99.jpg',
            'price'       => 12.9,
            'description' => 'Relaxed Fit Hoodie Polo Shirt',
            'additional_info' => '',
            'store_id'    => 1,
            'category_id' => 2,
            'section'     => 'MEN'
        ]);

        /************************************************************************************** */

        /* La Familia */
        /* La Familia has WOMEN & KIDS  */
        /* La Familia has OUTWEAR , PANTS , ACCESSORIES & JEWELRY , Bag*/

        // WOMEN .
        //ACCESSORIES & JEWELRY
        Product::create([
            'name'        => 'NECKLACE WITH METAL LEAVES [L, W, ACC]',
            'image'       => 'public/product/1cc.jpg',
            'price'       => 10.7,
            'description' => 'Metal necklace in the shape of leaves.  ',
            'additional_info' => 'Lobster clasp fastening. ',
            'store_id'    => 2, //La Familia
            'category_id' => 8, //ACC
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'RHINESTONE CHOKER [L, W, ACC]',
            'image'       => 'public/product/2cc.jpg',
            'price'       => 5.45,
            'description' => 'Wide choker with rhinestone beads.',
            'additional_info' => 'Lobster clasp fastening. ',
            'store_id'    => 2, // La Familia
            'category_id' => 8, //ACC 
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'MINI CHOKER WITH PEARL BEADS [L, W, ACC]',
            'image'       => 'public/product/3cc.jpg',
            'price'       => 7.7,
            'description' => 'Metal choker necklace with mini pearl bead appliqués.  ',
            'additional_info' => 'Lobster clasp fastening.',
            'store_id'    => 2, // La Familia
            'category_id' => 8, //ACC 
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'PEARL BEAD CHOKER NECKLACE [L, W, ACC]',
            'image'       => 'public/product/4cc.jpg',
            'price'       => 12.5,
            'description' => 'Metal choker necklace with pearl bead appliqués.  ',
            'additional_info' => 'Lobster clasp fastening. ',
            'store_id'    => 2, // La Familia
            'category_id' => 8, //ACC 
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'CASCADING CHOKER [L, W, ACC]',
            'image'       => 'public/product/5cc.jpg',
            'price'       => 13,
            'description' => 'Metal choker. Lobster clasp fastening.  ',
            'additional_info' => 'Lobster clasp fastening. ',
            'store_id'    => 2, // La Familia
            'category_id' => 8, //ACC 
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'PEARL BEAD MAXI CHOKER [L, W, ACC]',
            'image'       => 'public/product/6cc.jpg',
            'price'       => 6.9,
            'description' => 'SChoker with fresh water pearl bead appliqués. Lobster clasp fastening.  ',
            'additional_info' => 'Lobster clasp fastening.',
            'store_id'    => 2, // La Familia
            'category_id' => 8, //ACC
            'section'     => 'WOMEN'
        ]);

        // KIDS

        //Outwear
        Product::create([
            'name'        => 'KNIT CARDIGAN [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO1.jpg',
            'price'       => 9.5,
            'description' => 'Knit cardigan featuring a round neck and long sleeves with cuffs.  ',
            'additional_info' => 'Button-up front.',
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'CROPPED DENIM JACKET WITH RIPS [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO2.jpg',
            'price'       => 11,
            'description' => 'Collared, cropped denim jacket featuring long sleeves, a button-up front.  ',
            'additional_info' => ' front patch pockets and ripped details.',
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'DENIM WORKER JACKET [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO3.jpg',
            'price'       => 14.99,
            'description' => 'Collared denim jacket with long sleeves. Button-up front.   ',
            'additional_info' => 'Contrast front pockets. ',
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'WINDPROOF AND WATER-REPELLENT APRÈS SKI PUFFER COAT [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO4.jpg',
            'price'       => 19.54,
            'description' => 'Wind-proof and water-repellent puffer coat with a high collar and long sleeves with adjustable button fastening. Zip-up front.  ',
            'additional_info' => 'Side pockets. Elasticated hem. ',
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'DOWN AND FEATHER PUFFER JACKET WITH MAXI POCKETS [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO5.jpg',
            'price'       => 23.8,
            'description' => 'Puffer jacket with 50% feathers and 50% down. Detachable hood with zip and long sleeves with cuffs. Injected zip fastening at the front hidden by a snap-button placket. Maxi front pockets with flaps.',
            'additional_info' => ' snap buttons and an label appliqué.',
            'number_of_sold'  => 1,
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'DOWN AND FEATHER PUFFER JACKET WITH MAXI POCKETS [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO6.jpg',
            'price'       => 20.2,
            'description' => 'Puffer jacket with 50% feathers and 50% down. Detachable hood with zip and long sleeves with cuffs. Injected zip fastening at the front hidden by a snap-button placket. Maxi front pockets with flaps. ',
            'additional_info' => ' snap buttons and an label appliqué.',
            'store_id'    => 2,
            'category_id' => 4, //Outwear
            'section'     => 'KIDS'
        ]);


        //Pants
        Product::create([
            'name'        => 'WINDPROOF AND WATER-REPELLENT APRÈS SKI QUILTED CARGO TROUSERS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP1.jpg',
            'price'       => 7.4,
            'description' => 'Wind-proof and water-repellent quilted cargo trousers featuring an elasticated waistband, front snap-button fastening, belt appliqué, front pockets, rear patch pockets.  ',
            'additional_info' => ' leg pockets with flaps and fleece lining.',
            'store_id'    => 2, // La Familia
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'THE REGULAR PANT JEANS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP2.jpg',
            'price'       => 8.2,
            'description' => 'Five-pocket regular fit jeans with an adjustable interior waistband and button fastening in the front',
            'additional_info' => ' leg pockets with flaps and fleece lining.',
            'store_id'    => 2, // La Familia
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'THE REGULAR PANT JEANS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP3.jpg',
            'price'       => 5.3,
            'description' => 'Five-pocket regular fit jeans with an adjustable interior waistband and button fastening in the front',
            'additional_info' => ' leg pockets with flaps and fleece lining.',
            'store_id'    => 2, // La Familia
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'CARGO TROUSERS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP4.jpg',
            'price'       => 7.99,
            'description' => 'Trousers with an elastic waistband. Patch pockets on the leg with flaps. ',
            'additional_info' => 'Elastic hems.',
            'number_of_sold'  => 1,
            'store_id'    => 2,
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'WIDE-LEG CARGO TROUSERS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP5.jpg',
            'price'       => 12.7,
            'description' => 'Wide-leg cargo trousers with an elasticated waistband. ',
            'additional_info' => 'Matching flap pockets.',
            'store_id'    => 2,
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'SOFT TOUCH CARGO TROUSERS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP6.jpg',
            'price'       => 14.6,
            'description' => 'Cargo trousers with an elastic waistband and drawstrings at the front. Featuring front pockets and matching flap pockets on the legs. ',
            'additional_info' => ' Special soft quality fabric.',
            'store_id'    => 2,
            'category_id' => 7, //Pants
            'section'     => 'KIDS'
        ]);

        //BAG
        Product::create([
            'name'        => 'PADDED BACKPACK [L, K, BAGS]',
            'image'       => 'public/product/D&GKB1.jpg',
            'price'       => 15.9,
            'description' => 'Padded backpack made of 100% cotton. Main compartment featuring a fastening with clip closure and an adjustable drawstring. Featuring two side pockets with brooch fastening and a front mesh pocket.  ',
            'additional_info' => 'Top handle and two adjustable shoulder straps. ',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'CROSSBODY BAG WITH HANDLES [L, K, BAGS]',
            'image'       => 'public/product/D&GKB2.jpg',
            'price'       => 5.7,
            'description' => 'Crossbody bag with gathering, drawstring closure and handles. ',
            'additional_info' => 'Top handle and two adjustable shoulder straps. ',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'MINI CROSSBODY BAG [L, K, BAGS]',
            'image'       => 'public/product/D&GKB3.jpg',
            'price'       => 8.2,
            'description' => 'Mini crossbody bag with a padded effect. ',
            'additional_info' => ' front flap with clip closure and a shoulder strap. ',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'MINI BUCKET BAG [L, K, BAGS]',
            'image'       => 'public/product/D&GKB4.jpg',
            'price'       => 7,
            'description' => 'Mini crossbody bag made of cotton and linen. ',
            'additional_info' => 'Adjustable drawstrings and shoulder strap.',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'LILO & STITCH TOTE BAG [L, K, BAGS]',
            'image'       => 'public/product/D&GKB5.jpg',
            'price'       => 3.2,
            'description' => 'Fabric tote bag with a licensed Lillo & Stitch print. Faded effect finish.',
            'additional_info' => ' Double shoulder strap without closure.  ',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'FAUX FUR BAG [L, K, BAGS]',
            'image'       => 'public/product/D&GKB6.jpg',
            'price'       => 15.4,
            'description' => 'Monochrome faux fur shoulder bag. ',
            'additional_info' => 'Zip closure. ',
            'store_id'    => 2, // La Familia
            'category_id' => 10, //Bag
            'section'     => 'KIDS'
        ]);

        /************************************************************************************** */

        /* PRETTY LITTLE THINGS */
        /* PRETTY LITTLE THINGS has HATS ,SHOES ,BAGS */
        /* PRETTY LITTLE THINGS has WOMEN & kids */

        //pretty little things products
        //hats
        Product::create([
            'name'        => 'BEAR MESH CAP [P, K, HATS]',
            'image'       => 'public/product/BEAR MESH CAP  Contrast cap with mesh and adjustable back fastening..jpg',
            'price'       => 5.62,
            'description' => 'Relaxed Fit cap Polo Shirt',
            'additional_info' => '',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'FAUX FUR HAT [P, K, HATS]',
            'image'       => 'public/product/FAUX FUR HAT WITH EARS Faux fur hat with ear appliqués and hook-and-loop fastenings..jpg',
            'price'       => 2.8,
            'description' => 'FAUX FUR HAT WITH EARS Faux fur hat with ear appliqués and ',
            'additional_info' => 'hook-and-loop fastenings',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'SHEARLING HAT [P, K, HATS]',
            'image'       => 'public/product/FAUX SHEARLING HAT  Faux shearling hat with contrast trim..jpg',
            'price'       => 7.5,
            'description' => 'FAUX SHEARLING HAT  Faux shearling hat ',
            'additional_info' => 'with contrast trim.',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'BEANIE HAT [P, K, HATS]',
            'image'       => 'public/product/KNIT BEANIE WITH INITIAL DETAIL  Knit beanie with a turn-up brim and initial appliqué..jpg',
            'price'       => 3.2,
            'description' => 'KNIT BEANIE WITH INITIAL DETAIL  Knit beanie with ',
            'additional_info' => 'a turn-up brim and initial appliqué.',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'BEANIE WITH POMPOM [P, K, HATS]',
            'image'       => 'public/product/KNIT BEANIE WITH POMPOM  Knit beanie with a turn-up brim. Pompom appliqué and drawstring fastening..jpg',
            'price'       => 4.3,
            'description' => 'KNIT BEANIE WITH POMPOM  Knit beanie with a turn-up brim.',
            'additional_info' => 'Pompom appliqué and drawstring fastening.',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'REINDEER HAT [P, K, HATS]',
            'image'       => 'public/product/REINDEER HAT  Hat with appliqués, ribbed turn-up brim and chin ties..jpg',
            'price'       => 5.99,
            'description' => 'REINDEER HAT  Hat with appliqués, ',
            'additional_info' => 'ribbed turn-up brim and chin ties.',
            'store_id'    => 3,
            'category_id' => 11,
            'section'     => 'KIDS'
        ]);

        //shoes
        Product::create([
            'name'        => 'SHEARLING BOOTS [P, K, SHOES]',
            'image'       => 'public/product/FAUX SHEARLING BOOTS  Boots with faux shearling lining. Pull tab at the back and side zip for slipping on with ease. Rubber sole..jpg',
            'price'       => 12.99,
            'description' => 'FAUX SHEARLING BOOTS  Boots with faux shearling lining. ',
            'additional_info' => ' Pull tab at the back and side zip for slipping on with ease. Rubber sole.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'fastening boots [P, K, SHOES]',
            'image'       => 'public/product/Lace-up fastening and pull tab at the back for slipping on with ease. Rubber track sole..jpg',
            'price'       => 9.5,
            'description' => 'Lace-up fastening and pull tab at the back for slipping on with ease. ',
            'additional_info' => 'Rubber track sole.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'LEATHER ANKLE BOOTS [P, K, SHOES]',
            'image'       => 'public/product/LEATHER ANKLE BOOTS  Adjustable hook-and-loop strap with faux shearling interior. Front and back pull tabs for slipping on with ease..jpg',
            'price'       => 7.6,
            'description' => 'LEATHER ANKLE BOOTS  Adjustable hook-and-loop strap with faux shearling interior. ',
            'additional_info' => 'Front and back pull tabs for slipping on with ease. ',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'FLATS WITH BOW [P, K, SHOES]',
            'image'       => 'public/product/LEATHER BALLET FLATS WITH BOW  Party ballet flats in 100% cowhide leather. Crossed elastic straps for a better fit. Bow detail. Fabric lining and insole..jpg',
            'price'       => 5.2,
            'description' => 'LEATHER BALLET FLATS WITH BOW  Party ballet flats in 100% cowhide leather. Crossed elastic straps for a better fit. ',
            'additional_info' => ' Bow detail. Fabric lining and insole .',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'LEATHER SNEAKERS [P, K, SHOES]',
            'image'       => 'public/product/LEATHER SNEAKERS  Two hook-and-loop straps for fastening..jpg',
            'price'       => 6.99,
            'description' => 'LEATHER SNEAKERS  Two hook-and-loop ',
            'additional_info' => 'straps for fastening.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);
        Product::create([
            'name'        => 'QUILTED MOUNTAIN BOOTS [P, K, SHOES]',
            'image'       => 'public/product/QUILTED MOUNTAIN BOOTS  Quilted nylon mountain boots. Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease. Contrast track sole..jpg',
            'price'       => 10.99,
            'description' => 'QUILTED MOUNTAIN BOOTS  Quilted nylon mountain boots. Side zip and adjustable lace-up fastening.',
            'additional_info' => 'Pull tab at the back for slipping on with ease. Contrast track sole.',
            'number_of_sold'  => 1,
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'KIDS'
        ]);

        //women
        //bags 
        Product::create([
            'name'        => 'FAUX-FUR BAG [P, W, BAGS]',
            'image'       => 'public/product/FAUX-FUR SHOULDER BAG  Half-moon faux fur shoulder bag. Zip closure..jpg',
            'price'       => 15.8,
            'description' => 'FAUX-FUR SHOULDER BAG  Half-moon faux fur shoulder bag.',
            'additional_info' => 'Zip closure.',
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'LEATHER CARD HOLDER [P, W, BAGS]',
            'image'       => 'public/product/LEATHER CARD HOLDER  Leather card holder. Interior divided into several compartments. Detachable metal chain crossbody strap. Metal clasp..jpg',
            'price'       => 12.7,
            'description' => 'LEATHER CARD HOLDER  Leather card holder. Interior divided into several compartments. ',
            'additional_info' => 'Detachable metal chain crossbody strap. Metal clasp.',
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'LEATHER SHOULDER BAG [P, W, BAGS]',
            'image'       => 'public/product/LEATHER SHOULDER BAG  Rectangular leather shoulder bag. Tubular shoulder straps and detachable crossbody strap. Decorative seams. Zip closure..jpg',
            'price'       => 9.99,
            'description' => 'LEATHER SHOULDER BAG  Rectangular leather shoulder bag. Tubular shoulder straps and detachable crossbody strap. ',
            'additional_info' => 'Decorative seams. Zip closure.',
            'number_of_sold'  => 1,
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'LEATHER SHOULDER BAG [P, W, BAGS]',
            'image'       => 'public/product/MINI CITY BAG  Mini city bag. Animal print exterior. Rigid handle. Detachable shoulder strap. Lined interior with pocket. Magnetic closure..jpg',
            'price'       => 20.5,
            'description' => 'MINI CITY BAG  Mini city bag. Animal print exterior. Rigid handle. Detachable shoulder strap.',
            'additional_info' => 'Lined interior with pocket. Magnetic closure.',
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'MINI FLORAL HANDBAG [P, W, BAGS]',
            'image'       => 'public/product/MINI FLORAL HANDBAG  Mini square handbag. Handle with decorative flowers and a detachable and adjustable crossbody strap. Magnetic clasp closure on the flap..jpg',
            'price'       => 22.2,
            'description' => 'MINI FLORAL HANDBAG  Mini square handbag. Handle with decorative flowers and a detachable and adjustable crossbody strap.',
            'additional_info' => ' Magnetic clasp closure on the flap.',
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'SHIMMERY MINI CITY BAG [P, W, BAGS]',
            'image'       => 'public/product/SHIMMERY MINI CITY BAG  Mini city bag in bejewelled fabric. Double handle with knotted detail on the corners. Lined interior. Metal chain crossbody strap. Magnetic clasp closure..jpg',
            'price'       => 19.4,
            'description' => 'SHIMMERY MINI CITY BAG  Mini city bag in bejewelled fabric. Double handle with knotted detail on the corners. Lined interior. Metal chain crossbody strap. Magnetic clasp closure.',
            'additional_info' => ' Metal chain crossbody strap. Magnetic clasp closure.',
            'store_id'    => 3,
            'category_id' => 10,
            'section'     => 'WOMEN'
        ]);

        //women
        //shoes
        Product::create([
            'name'        => 'VINYL HIGH-HEEL [P, W, SHOES]',
            'image'       => 'public/product/EMBELLISHED VINYL HIGH-HEEL SHOES High-heel slingback shoes. Vinyl upper. Embellished rhinestone details on the front..jpg',
            'price'       => 20.22,
            'description' => 'EMBELLISHED VINYL HIGH-HEEL SHOES High-heel slingback shoes. Vinyl upper. ',
            'additional_info' => 'Embellished rhinestone details on the front.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'OVER THE KNEE BOOTS [P, W, SHOES]',
            'image'       => 'public/product/FABRIC OVER THE KNEE BOOTS Sock-style ankle boots in a combination of materials. Track sole. Back pull tab detail..jpg',
            'price'       => 25.99,
            'description' => 'FABRIC OVER THE KNEE BOOTS Sock-style ankle boots in a combination of materials.',
            'additional_info' => 'Track sole. Back pull tab detail.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'KNEE-HIGH BOOTS [P, W, SHOES]',
            'image'       => 'public/product/Knee-high Boots 74.99.jpg',
            'price'       => 20.9,
            'description' => 'LEATHER AND SUEDE KNEE HIGH BOOTS WITH A SELECTION OF HEEL HEIGHTS IN BLACK, BROWN AND WHITE COLOURS.',
            'additional_info' => '',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'LACE UP FABRIC SLIDER SANDALS [P, W, SHOES]',
            'image'       => 'public/product/LACE UP FABRIC SLIDER SANDALS Flat slider sandals in elastic fabric with thin criss cross straps. Chunky sole. Tied closure around the ankle..jpg',
            'price'       => 10.2,
            'description' => 'LACE UP FABRIC SLIDER SANDALS Flat slider sandals in elastic fabric with thin criss cross straps.',
            'additional_info' => 'Chunky sole. Tied closure around the ankle.',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'ANKLE BOOTS [P, W, SHOES]',
            'image'       => 'public/product/SOCK-STYLE TRACK SOLE ANKLE BOOTS.jpg',
            'price'       => 20.5,
            'description' => 'SOCK-STYLE TRACK SOLE ANKLE BOOTS',
            'additional_info' => '',
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);
        Product::create([
            'name'        => 'TRAINERS [P, W, SHOES]',
            'image'       => 'public/product/TRAINERS  Lace-up trainers. Chunky track soles..jpg',
            'price'       => 12.40,
            'description' => 'TRAINERS  Lace-up trainers',
            'additional_info' => 'Chunky track soles.',
            'number_of_sold'  => 2,
            'store_id'    => 3,
            'category_id' => 9,
            'section'     => 'WOMEN'
        ]);

        /************************************************************************************** */

        /* Jack jones */
        /* Jack jones has KNITWEAR , OUTWEAR*/
        /* Jack jones has Men */
        /* Connectors*/

        //MEN
        //Knitwear
        Product::create([
            'name'        => 'COLOUR BLOCK SWEATER [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK1.jpg',
            'price'       => 15.3,
            'description' => 'Long sleeve round neck sweater with ribbed trims.  ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'MOCK NECK SWEATER [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK2.jpg',
            'price'       => 10.9,
            'description' => 'Fine knit mock neck sweater with long sleeves and ribbed trims.  ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'KNOP YARN SWEATER [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK3.jpg',
            'price'       => 8.99,
            'description' => 'Long sleeve round neck sweater with ribbed trims.  ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'RIBBED TEXTURED SWEATER [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK4.jpg',
            'price'       => 15.4,
            'description' => ' Long sleeve round neck sweater with ribbed trims. ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'TEXTURED SWEATER WITH STRIPES [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK5.jpg',
            'price'       => 7.05,
            'description' => 'Long sleeve sweater with a round neckline and ribbed trims ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'ALPACA BLEND SWEATER - LIMITED EDITION [J, M, Knitwear]',
            'image'       => 'public/product/D&GMK6.jpg',
            'price'       => 11.2,
            'description' => 'Lightweight sweater made of a spun synthetic alpaca blend. Featuring a round neckline. ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 3,
            'section'     => 'MEN'
        ]);



        //Outwear
        Product::create([
            'name'        => 'BASIC PUFFER JACKET [J, M, Knitwear]',
            'image'       => 'public/product/D&GMO1.jpg',
            'price'       => 20.5,
            'description' => 'High neck jacket featuring long sleeves with elasticated cuffs, welt pockets at the hip and inside pocket detail. Zip-up front. ',
            'additional_info' => 'Zip-up front.',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'RUBBERISED PUFFER JACKET [J, M, Knitwear]',
            'image'       => 'public/product/D&GMO2.jpg',
            'price'       => 23.8,
            'description' => 'Loose-fitting puffer jacket made of a technical fabric with a rubberised finish. High neck and long sleeves with elastic cuffs. Hip welt pockets and interior pocket detail.',
            'additional_info' => ' Front zip fastening. ',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'TECHNICAL QUILTED JACKET [J, M, Knitwear]',
            'image'       => 'public/product/D&GMO3.jpg',
            'price'       => 15.4,
            'description' => 'Jacket with lightly padded interior. High collar with stow-away hood detail. Long sleeves with elastic inner cuffs. Patch pockets with flaps at the hip. Inside pocket.',
            'additional_info' => ' Zip-up front hidden by a snap-button placket. ',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'CASHMERE BLEND SWEATER [J, M, Knitwear]',
            'image'       => 'public/product/Water-repellent Puffer Jacket 75.99.jpg',
            'price'       => 25.99,
            'description' => ' Sweater made of a spun cashmere blend. Featuring a round neckline.',
            'additional_info' => ' long sleeves and ribbed trims. ',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'PUFFER JACKET [J, M, Knitwear]',
            'image'       => 'public/product/D&GMO5.jpg',
            'price'       => 18.7,
            'description' => 'Puffer jacket featuring a high neck and long sleeves with elasticated cuffs. Zip pockets at the hip, an inside pocket.',
            'additional_info' => ' elasticated hems and front zip fastening. ',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);
        Product::create([
            'name'        => 'CONTRAST QUILTED JACKET [J, M, Knitwear]',
            'image'       => 'public/product/D&GMO6.jpg',
            'price'       => 16.7,
            'description' => 'Jacket with a high collar and long sleeves. Zip pockets at the hip. Inside pocket. Contrast ribbed trims. ',
            'additional_info' => 'Zip-up front. ',
            'store_id'    => 4,
            'category_id' => 4,
            'section'     => 'MEN'
        ]);


        /*      sliders     */

        Slider::create([
            'image' => 'public/slider/slider (1).jpg',
        ]);
        Slider::create([
            'image' => 'public/slider/slider (2).jpg',
        ]);
        Slider::create([
            'image' => 'public/slider/slider (3).jpg',
        ]);
        Slider::create([
            'image' => 'public/slider/slider (4).jpg',
        ]);
        Slider::create([
            'image' => 'public/slider/slider (5).jpg',
        ]);


        /*       User       */

        User::create([ // 1
            'name'              => 'SUPER ADMIN',
            'email'             => 'saplaza2023@gmail.com', // SuperADMIN123#
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0771496574',
            'image'             => 'public/user/superadmin1.jpg',
            'user_role'         => 'superadmin'
        ]);

        User::create([ // 2
            'name'              => 'DARAGHMEH ADMIN1',
            'email'             => 'draghmehadmin1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'MABABA',
            'phone_number'      => '0787854998',
            'user_role'         => 'admin',
            'store_id'          => 1
        ]);
        User::create([ // 3
            'name'              => 'DARAGHMEH EMPLOYEE1',
            'email'             => 'draghmehemployee1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'MABABA',
            'phone_number'      => '0778951641',
            'user_role'         => 'employee',
            'store_id'          => 1
        ]);

        User::create([ // 4
            'name'              => 'LA FAMILIA ADMIN1',
            'email'             => 'lafamiliaadmin1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'IRBID',
            'phone_number'      => '0787854998',
            'user_role'         => 'admin',
            'store_id'          => 2
        ]);
        User::create([ // 5
            'name'              => 'LA FAMILIA EMPLOYEE1',
            'email'             => 'lafamiliaemployee1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'IRBID',
            'phone_number'      => '0778951641',
            'user_role'         => 'employee',
            'store_id'          => 2
        ]);

        User::create([ // 6
            'name'              => 'PRETTY LITTLE THINGS ADMIN1',
            'email'             => 'prettylittlething2023@gmail.com', // PLTA123##
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0787854998',
            'user_role'         => 'admin',
            'store_id'          => 3
        ]);

        User::create([ // 7
            'name'              => 'PRETTY LITTLE THINGS EMPLOYEE1',
            'email'             => 'prettylittlethingsemployee1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0778951641',
            'user_role'         => 'employee',
            'store_id'          => 3
        ]);

        User::create([ // 8
            'name'              => 'JONES ADMIN1',
            'email'             => 'jonesadmin1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0775156376',
            'user_role'         => 'admin',
            'store_id'          => 4
        ]);

        User::create([ // 9
            'name'              => 'JONES EMPLOYEE1',
            'email'             => 'jonesemployee1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0778735641',
            'user_role'         => 'employee',
            'store_id'          => 4
        ]);

        User::create([ // 10 
            'name'              => 'customer1',
            'email'             => 'customer1@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AGLOUN',
            'phone_number'      => '0777777777',
            'user_role'         => 'customer'
        ]);
        User::create([ // 11 
            'name'              => 'customer2',
            'email'             => 'customer2@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'AMMAN',
            'phone_number'      => '0777777777',
            'user_role'         => 'customer'
        ]);
        User::create([ // 12
            'name'              => 'customer3',
            'email'             => 'customer3@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address'           => 'ZARQA',
            'phone_number'      => '0777777777',
            'user_role'         => 'customer'
        ]);

        /*       ORDERS      */

        //order 1 for superadmin 
        Order::create([
            'user_id'        => 1,
            'total_quantity' => 4,
            'total_price'    => 51.16,
            'created_at'     => '2023-01-11 09:57:53',
            'updated_at'     => '2023-01-11 09:57:53'
        ]);

        OrderItem::create([
            'name'        => 'Bomber Jacket [D,K,OUTWEAR]',
            'image'       => 'public/product/Oversized Bomber Jacket 26.99.jpg',
            'price'       => 16.44,
            'quantity'    => 2,
            'order_id'    => 1,
            'store_id'    => 1,
            'created_at'  => '2023-01-11 09:57:53',
            'updated_at'  => '2023-01-11 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'Slim Fit Polo Shirt [D,M,TOPS]',
            'image'       => 'public/product/Slim Fit Polo Shirt 12.88.jpg',
            'price'       => 5.88,
            'quantity'    => 1,
            'order_id'    => 1,
            'store_id'    => 1,
            'created_at'  => '2023-01-11 09:57:53',
            'updated_at'  => '2023-01-11 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'TRAINERS [P, W, SHOES]',
            'image'       => 'public/product/TRAINERS  Lace-up trainers. Chunky track soles..jpg',
            'price'       => 12.40,
            'quantity'    => 1,
            'order_id'    => 1,
            'store_id'    => 3,
            'created_at'  => '2023-01-11 09:57:53',
            'updated_at'  => '2023-01-11 09:57:53'
        ]);

        //order 2 for DARAGHMEH ADMIN1 
        Order::create([
            'user_id'        => 2,
            'total_quantity' => 3,
            'total_price'    => 39.67,
            'created_at'     => '2023-01-8 09:57:53',
            'updated_at'     => '2023-01-8 09:57:53'
        ]);

        OrderItem::create([
            'name'        => 'LEATHER SHOULDER BAG [P, W, BAGS]',
            'image'       => 'public/product/LEATHER SHOULDER BAG  Rectangular leather shoulder bag. Tubular shoulder straps and detachable crossbody strap. Decorative seams. Zip closure..jpg',
            'price'       => 9.99,
            'quantity'    => 1,
            'order_id'    => 2,
            'store_id'    => 3,
            'created_at'  => '2023-01-8 09:57:53',
            'updated_at'  => '2023-01-8 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'Slim Fit Polo Shirt [D,M,TOPS]',
            'image'       => 'public/product/Slim Fit Polo Shirt 12.88.jpg',
            'price'       => 5.88,
            'quantity'    => 1,
            'order_id'    => 2,
            'store_id'    => 1,
            'created_at'  => '2023-01-8 09:57:53',
            'updated_at'  => '2023-01-8 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'DOWN AND FEATHER PUFFER JACKET WITH MAXI POCKETS [L, K, OWTWEAR]',
            'image'       => 'public/product/D&GKO5.jpg',
            'price'       => 23.8,
            'quantity'    => 1,
            'order_id'    => 2,
            'store_id'    => 2,
            'created_at'  => '2023-01-8 09:57:53',
            'updated_at'  => '2023-01-8 09:57:53'
        ]);

        //order 2 for customer1
        Order::create([
            'user_id'        => 10,
            'total_quantity' => 2,
            'total_price'    => 25.39,
            'created_at'     => '2023-01-8 09:57:53',
            'updated_at'     => '2023-01-8 09:57:53'
        ]);

        OrderItem::create([
            'name'        => 'Chunky Boots [D,K,shoes]',
            'image'       => 'public/product/Warm-lined Boots 29.99.jpg',
            'price'       => 12.99,
            'quantity'    => 1,
            'order_id'    => 3,
            'store_id'    => 1,
            'created_at'  => '2023-01-8 09:57:53',
            'updated_at'  => '2023-01-8 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'TRAINERS [P, W, SHOES]',
            'image'       => 'public/product/TRAINERS  Lace-up trainers. Chunky track soles..jpg',
            'price'       => 12.40,
            'quantity'    => 1,
            'order_id'    => 3,
            'store_id'    => 3,
            'created_at'  => '2023-01-8 09:57:53',
            'updated_at'  => '2023-01-8 09:57:53'
        ]);

        //order 4 for customer2 
        Order::create([
            'user_id'        => 11,
            'total_quantity' => 3,
            'total_price'    => 26.97,
            'created_at'     => '2023-01-6 09:57:53',
            'updated_at'     => '2023-01-6 09:57:53'
        ]);

        OrderItem::create([
            'name'        => 'CARGO TROUSERS [L, K, PANTS]',
            'image'       => 'public/product/D&GKP4.jpg',
            'price'       =>  7.99,
            'quantity'    => 2,
            'order_id'    => 4,
            'store_id'    => 2,
            'created_at'  => '2023-01-6 09:57:53',
            'updated_at'  => '2023-01-6 09:57:53'
        ]);
        OrderItem::create([
            'name'        => 'QUILTED MOUNTAIN BOOTS [P, K, SHOES]',
            'image'       => 'public/product/QUILTED MOUNTAIN BOOTS  Quilted nylon mountain boots. Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease. Contrast track sole..jpg',
            'price'       => 10.99,
            'quantity'    => 1,
            'order_id'    => 4,
            'store_id'    => 3,
            'created_at'  => '2023-01-6 09:57:53',
            'updated_at'  => '2023-01-6 09:57:53'
        ]);
    }
}
