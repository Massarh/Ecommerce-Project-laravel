<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\CategorySubcategory;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

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
            'image' => 'public/files/hm.jpg'
        ]);
        Category::create([
            'name' => 'PRADA', //2
            'slug' => 'PRADA',
            'description' => 'Today the Prada brand offers men and women leather goods, clothing and footwear, combining contemporary, innovative and sophisticated design with the uniqueness of handcrafted products. Prada also operates in the eyewear and fragrance sector.',
            'image' => 'public/files/Prada.jpg'
        ]);

        Category::create([
            'name' => 'ZARA', //3
            'slug' => 'ZARA',
            'description' => 'Zara is a Spanish multi-national retail clothing chain. It specialises in fast fashion, and sells clothing, accessories, shoes, beauty products and perfumes. The head office is in Arteixo, in A Coruña in Galicia.It is the largest constituent company of the Inditex group. ',
            'image' => 'public/files/zara.png'
        ]);

        Category::create([
            'name' => 'MANGO', //4
            'slug' => 'MANGO',
            'description' => 'Mango was founded in 1984 by brothers Isak Andic and Nahman Andic, the brand opened its first store in Barcelonas Paseo de Gracia. The name Mango was chosen because it sounds the same in the majority of languages around the world.',
            'image' => 'public/files/mango.png'
        ]);

        Category::create([
            'name' => 'PRETTY LITTLE THING', //5
            'slug' => 'PRETTY LITTLE THING',
            'description' => 'Pretty Little Thing is a UK-based fast-fashion retailer, aimed at 16-24-year-old women. The company is owned by Boohoo Group and operates in the UK, Ireland, JORDAN, US, France, Middle East and North Africa. ',
            'image' => 'public/files/PrettyLittleThings.png'
        ]);

        Category::create([
            'name' => 'DOLCE & GABBANA', //6
            'slug' => 'DOLCE & GABBANA',
            'description' => 'also known by initials D&G, is an Italian luxury fashion house founded in 1985 in Legnano by Italian designers Domenico Dolce and Stefano Gabbana.The house specializes in ready-to-wear, handbags, accessories, and cosmetics and licenses its name and branding to Luxottica for eyewear.',
            'image' => 'public/files/D&G.jpg'
        ]);

        Category::create([
            'name' => 'CHRISTIAN DIOR', //7
            'slug' => 'CHRISTIAN DIOR',
            'description' => 'Christian Dior SE commonly known as Dior (stylized Dior), is a French luxury fashion house controlled and chaired by French businessman Bernard Arnault, who also heads LVMH, the worlds largest luxury group',
            'image' => 'public/files/Christian Dior.jpg'
        ]);

        Category::create([
            'name' => 'GUCCI', //8
            'slug' => 'GUCCI',
            'description' => ' Gucci is an Italian high-end luxury fashion house based in Florence, Italy. Its product lines include handbags, ready-to-wear, footwear, accessories, and home decoration; and it licenses its name and branding to Coty, Inc. for fragrance and cosmetics under the name Gucci Beauty',
            'image' => 'public/files/gucci.png'
        ]);
        Category::create([
            'name' => 'DARAGHMEH', //9
            'slug' => 'DARAGHMEH',
            'description' => '(DR) is a clothing company based in Jordan, which owns the DR trademark. A group of companies and branches, its first branch was opened in 1984. In addition to shoes, bags, accessories, toys, cosmetics, perfumes, personal care and everything that receives the family, as it is considered one of the major companies in the sector of Jordan.',
            'image' => 'public/files/Daragmeh.png'
        ]);

        Category::create([
            'name' => 'SHE CHOCOLATE', //10
            'slug' => 'SHE CHOCOLATE',
            'description' => 'SHE CHOCOLATE is one of the leading brands in the apparel and fashion sector in Jordan, opened its first store in 2009. SHE_CHOCOLATE has taken its place among the leading brands in clothing and fashion .industry in Jordan and worldwide',
            'image' => 'public/files/shechocolate.png'
        ]);
        Category::create([
            'name' => 'VICTORIA JANE', //11
            'slug' => 'VICTORIA JANE',
            'description' => 'For the modern bride the Victoria Jane collection delivers affordable luxury wedding gowns for those wanting to channel relaxed boho vibes. These dresses and are specifically designed for the outdoor, beach and destination ceremonies with shimmering soft fabrics. There really is something for everyone with our award-winning designer Veni Infantino priding herself on catering for every body shape and size',
            'image' => 'public/files/VICTORIA JANE.png'
        ]);




        // Subcategory 
        Subcategory::create([ //1
            'name' => 'MEN',
            'slug' => 'MEN',
        ]);
        Subcategory::create([ //2
            'name' => 'WOMEN',
            'slug' => 'WOMEN',
        ]);
        Subcategory::create([ //3
            'name' => 'KIDS',
            'slug' => 'KIDS',
        ]);
        Subcategory::create([ //4
            'name' => 'BAGS',
            'slug' => 'BAGS',
        ]);
        Subcategory::create([ //5
            'name' => 'ACCESSORIES',
            'slug' => 'ACCESSORIES',
        ]);
        Subcategory::create([ //6
            'name' => 'SHOES',
            'slug' => 'SHOES',
        ]);
        Subcategory::create([ //7
            'name' => 'HATS',
            'slug' => 'HATS',
        ]);
        Subcategory::create([ //8
            'name' => 'WEDDING DRESSES',
            'slug' => 'WEDDING DRESSES',
        ]);
        Subcategory::create([ //9
            'name' => 'PLUS SIZE',
            'slug' => 'PLUS SIZE',
        ]);
        Subcategory::create([ //10
            'name' => 'MAKEUP',
            'slug' => 'MAKEUP',
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
            'subcategory_id' => 2, //women
        ]);
        CategorySubcategory::create([
            'category_id' => 4,
            'subcategory_id' => 4, //bags
        ]);
        CategorySubcategory::create([
            'category_id' => 4,
            'subcategory_id' => 6, //shoes
        ]);

        /***************************************/
        //pretty littile things has kids ,bags, accessories,shoes and hats 
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 3, //kids
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 4, //bags
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 5, //accesories
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 6, //shoes
        ]);
        CategorySubcategory::create([
            'category_id' => 5,
            'subcategory_id' => 7, //hats 
        ]);
        /***************************************/
        //Dolce & Gabbana  has men ,wemon ,kids and accessories
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 1, //men
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 2, //women
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 3, //kids
        ]);
        CategorySubcategory::create([
            'category_id' => 6,
            'subcategory_id' => 5, //acc
        ]);

        /***************************************/
        //DIOR has men.
        CategorySubcategory::create([
            'category_id' => 7,
            'subcategory_id' => 1,
        ]);
        /***************************************/


        //gucci HAS MEN ,WEMON ,BAGS AND SHOES
        CategorySubcategory::create([
            'category_id' => 8,
            'subcategory_id' => 1, //men
        ]);
        CategorySubcategory::create([
            'category_id' => 8,
            'subcategory_id' => 2, //women
        ]);
        CategorySubcategory::create([
            'category_id' => 8,
            'subcategory_id' => 4, //bags
        ]);
        CategorySubcategory::create([
            'category_id' => 8,
            'subcategory_id' => 6, //shoes
        ]);

        //she chocolate HAS kids ,plus size ,women AND SHOES
        CategorySubcategory::create([
            'category_id' => 10,
            'subcategory_id' => 3, //kids
        ]);
        CategorySubcategory::create([
            'category_id' => 10,
            'subcategory_id' => 9, //plus size
        ]);
        CategorySubcategory::create([
            'category_id' => 10,
            'subcategory_id' => 2, //women
        ]);
        CategorySubcategory::create([
            'category_id' => 10,
            'subcategory_id' => 6, //shoes
        ]);

        //daraghmeh HAS men , shoes ,kids 
        CategorySubcategory::create([
            'category_id' => 9,
            'subcategory_id' => 1, //men
        ]);
        CategorySubcategory::create([
            'category_id' => 9,
            'subcategory_id' => 6, //shoes
        ]);
        CategorySubcategory::create([
            'category_id' => 9,
            'subcategory_id' => 3, //kids
        ]);


        //vectoria jane HAS wedding dresses 
        CategorySubcategory::create([
            'category_id' => 11,
            'subcategory_id' => 8, //wedding dresses 
        ]);





        //PRODUCTS

        // zara Product
        Product::create([
            'name' => 'HALF-ZIP FLEECE SWEATSHIRT ',
            'image' => 'public/product/HALF-ZIP FLEECE SWEATSHIRT .jpg',
            'price' => 15.25,
            'description' => 'High neck sweatshirt with front zip fastening . ',
            'additional_info' => 'Long sleeves, Side pockets, Ribbed trims',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);

        Product::create([
            'name' => 'LIGHTWEIGHT PUFFER GILET',
            'image' => 'public/product/LIGHTWEIGHT PUFFER GILET .jpg',
            'price' => 20.99,
            'description' => 'Gilet with a high neck',
            'additional_info' => 'Hip welt pockets and a zip-up front',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'POLO SWEATSHIRT',
            'image' => 'public/product/POLO SWEATSHIRT .jpg',
            'price' => 16.66,
            'description' => 'Sweatshirt featuring a polo collar with front vent.',
            'additional_info' => ' Long sleeves. Ribbed trims',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'PREMIUM SLIM FIT JEANS  ',
            'image' => 'public/product/PREMIUM SLIM FIT JEANS  Slim fit jeans.jpg',
            'price' => 20.99,
            'description' => 'Five pockets. Faded effect. Front zip fly and button fastening',
            'additional_info' => 'Slim fit jeans',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'WOOL BLEND BLAZER',
            'image' => 'public/product/WOOL BLEND BLAZER .jpg',
            'price' => 39.99,
            'description' => 'Slim fit blazer made of a wool blend. Notched lapel collar and long sleeves with buttoned cuffs',
            'additional_info' => 'Hip patch pockets. Back vents at the hem Buttoned front',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'ZIPPED POLO SHIRT',
            'image' => 'public/product/ZIPPED POLO SHIRT .jpg',
            'price' => 15.70,
            'description' => 'SHIRT WITH POCKET High neck polo shirt with a zip-up front Long sleeves with buttoned cuffs',
            'additional_info' => 'Patch pocket on chest',
            'category_id' => 3,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'DOUBLE-BREASTED PIQUÉ BLAZER',
            'image' => 'public/product/DOUBLE-BREASTED PIQUÉ BLAZER.jpg',
            'price' => 39.20,
            'description' => ' Double-breasted fastening at the front with raised golden buttons.',
            'additional_info' => 'Back vent',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'HALTER NECK DRESS',
            'image' => 'public/product/HALTER NECK .jpg',
            'price' => 29.10,
            'description' => ' Sleeveless fitted dress',
            'additional_info' => 'high neck',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Cut-out Bodycon Dress',
            'image' => 'public/product/Cut-out Bodycon Dress.jpg',
            'price' => 50.99,
            'description' => ' Fitted, calf-length dress in a soft rib knit made from a LivaEco™ viscose blend. Round neckline,',
            'additional_info' => ' cut-out sections at top, and long raglan sleeves with flared cuffs.',
            'number_of_sold' => 2,
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Rib-knit Merino Wool Dress',
            'image' => 'public/product/Rib-knit Merino Wool Dress.jpg',
            'price' => 70.66,
            'description' => 'Fitted, calf-length dress in soft, rib-knit merino wool. Mock turtleneck, dropped shoulders, ',
            'additional_info' => 'long sleeves with gently flared cuffs. Gently flared skirt with a straight hem.',
            'number_of_sold' => 1,
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'RIBBED HOODIE',
            'image' => 'public/product/RIBBED HOODIE .jpg',
            'price' => 25.66,
            'description' => 'Hoodie made of a cotton blend fabric',
            'additional_info' => 'Long sleeves. Ribbed trims',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Short Cardigan',
            'image' => 'public/product/Short Cardigan.jpg',
            'price' => 34.99,
            'description' => 'Short, relaxed-fit cardigan in a soft rib knit with wool content.',
            'additional_info' => 'Round neckline, buttons at front, and mock welt chest pockets. Gently dropped shoulders and long sleeves with close-fitting cuffs FitRelaxed fit',
            'category_id' => 3,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'AFFLE-KNIT PYJAMAS',
            'image' => 'public/product/AFFLE-KNIT PYJAMAS  Pyjamas with a round neckline and long cuffed sleeves. Front fastening with injected zip. All-over print..jpg',
            'price' => 12.23,
            'description' => 'Pyjamas with a round neckline and long cuffed sleeves',
            'additional_info' => 'Front fastening with injected zip. All-over print',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'DINOSAUR SET ',
            'image' => 'public/product/DINOSAUR SET .jpg',
            'price' => 12.23,
            'description' => 'Two-piece set Round neck sweatshirt with long sleeves.',
            'additional_info' => 'Trousers with an elastic waistband and cuffed hems',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'KNIT TURTLENECK SWEATER',
            'image' => 'public/product/KNIT TURTLENECK SWEATER.jpg',
            'price' => 16.23,
            'description' => 'Knit sweater with a turtleneck',
            'additional_info' => 'long sleeves',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PLUSH TROUSERS ',
            'image' => 'public/product/PLUSH TROUSERS .jpg',
            'price' => 10.23,
            'description' => ' Plush trousers featuring an elastic waistband and front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg. Seam details. Cuffed hems. LABEL AND SEAM DETAILS Plush trousers featuring an elastic waistband ',
            'additional_info' => ', front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg Seam details Cuffed hems',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'STRIPED KNIT SWEATER',
            'image' => 'public/product/STRIPED KNIT SWEATER  .jpg',
            'price' => 10.23,
            'description' => 'Knit sweater with a round neck ',
            'additional_info' => 'long sleeves',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'WIND-PROOF AND WATER-REPELLENT SKI PUFFER JACKET',
            'image' => 'public/product/WIND-PROOF AND WATER-REPELLENT SKI PUFFER JACKET .jpg',
            'price' => 25.20,
            'description' => 'Zip-up front hidden by a snap-button placket. Patch pockets with flaps on the front,',
            'additional_info' => ' inside pocket with grommet slit for headphone cables and contrast mesh',
            'category_id' => 3,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'BALLET FLATS FEATHERS',
            'image' => 'public/product/BALLET FLATS WITH FEATHERS .jpg',
            'price' => 15.99,
            'description' => 'Monochrome ballet flats for evening wear with feather detail on the front. ',
            'additional_info' => ' Strap across the instep with a rhinestone buckle.',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'CHUNKY-SOLE RUNNING TRAINERS',
            'image' => 'public/product/CHUNKY-SOLE RUNNING TRAINERS  .jpg',
            'price' => 23.77,
            'description' => 'Lace-up running trainers in a combination of materials. ',
            'additional_info' => 'Chunky and raised track soles. Back pull tab.',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'CONTRAST HIGH-TOP TRAINERS',
            'image' => 'public/product/CONTRAST HIGH-TOP .jpg',
            'price' => 15.77,
            'description' => 'TRAINERS High-top sneakers with contrast pieces in different colours.',
            'additional_info' => ' Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease.',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'FABRIC BLOCK HEEL ANKLE BOOTS',
            'image' => 'public/product/FABRIC BLOCK HEEL ANKLE BOOTS .jpg',
            'price' => 50.99,
            'description' => 'Ankle boots in stretch fabric. Geometric block heel',
            'additional_info' => 'Fitted upper. Square toe',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'LACE-UP LEATHER BOOTS',
            'image' => 'public/product/LACE-UP LEATHER BOOTS.jpg',
            'price' => 50.99,
            'description' => 'Lace-up boots. Leather upper Eight-eyelet facing. Buckled strap on the heel.',
            'additional_info' => 'Fitted upper. Square toe',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'REINDEER HOUSE SLIPPERS',
            'image' => 'public/product/REINDEER HOUSE SLIPPERS .jpg',
            'price' => 13.99,
            'description' => ' Faux fur slippers with a reindeer design.',
            'additional_info' => ' Adjustable hook-and-loop strap fastening at the back.',
            'category_id' => 3,
            'subcategory_id' => 6
        ]);



        //VECTORIA JANE 
        Product::create([
            'name' => 'EDEN',
            'image' => 'public/product/EDEN 599.00.jpg',
            'price' => 13.99,
            'description' => ' Bohemian  Wedding Dresse A Line V Neck Lace Appliqued 3D Flower ',
            'additional_info' => 'Beach Bridal Dress Wedding Gowns',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'ELORA',
            'image' => 'public/product/ELORA 777.00.jpg',
            'price' => 777.00,
            'description' => 'African Wedding Dresses 2022 Lace Applique Beading O-neck Organza off Sleeve Wedding Gown Beach Bridal Dress',
            'additional_info' => 'off Sleeve Wedding Gown Beach Bridal Dress',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'KEATON',
            'image' => 'public/product/KEATON 1000.jpg',
            'price' => 1000.99,
            'description' => ' Satin A Line Wedding Dress Boat Neck Short Sleeves Top Lace Beach Wedding Gowns Floor Length Bow Sash Bridal Dress',
            'additional_info' => 'Illusion Back Tulle Princess Wedding Gowns',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'KYLA',
            'image' => 'public/product/KYLA 1000.00.jpg',
            'price' => 1000.00,
            'description' => 'Country Boho Wedding Dress 2022 Illusion Long Sleeves Backless Lace ',
            'additional_info' => 'Ball Gown Wedding Gowns Boho Bridal Dress Robe De Mariage',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'ROZA',
            'image' => 'public/product/ROZA 699.00 .jpg',
            'price' => 699.00,
            'description' => 'Modern Princess Wedding Dresses Side Split Long Sleeve Buttons Beach Bridal',
            'additional_info' => 'Dresses A Line Wedding Party Gowns',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'ROZALINE',
            'image' => 'public/product/ROZALINE 855.00.jpg',
            'price' => 855.00,
            'description' => ' Glitter Shinny Wedding Dresses Plus Size Princess  ',
            'additional_info' => 'Straps Bridal Formal Gowns Corset Wedding Gown 2022',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'JANE',
            'image' => 'public/product/JANE 999.99.jpg',
            'price' => 999.99,
            'description' => 'Glitter Shinny Wedding Dresses Plus Size Princess Spaghetti Straps ',
            'additional_info' => 'Bridal Formal Gowns Corset Wedding Gown 2022',
            'number_of_sold' => 1,
            'category_id' => 11,
            'subcategory_id' => 8
        ]);
        Product::create([
            'name' => 'GERALDINA',
            'image' => 'public/product/GERALDINA 1000.00.jpg',
            'price' => 1000.00,
            'description' => 'Modern Simple Satin Wedding Dress Off the Shoulder  ',
            'additional_info' => 'V Neck Custom Made Plus Size Dubai Elegant Vestidos De Novia',
            'category_id' => 11,
            'subcategory_id' => 8
        ]);


        //SHE CHOCOLATE
        Product::create([
            'name' => 'Cable-knit Sweater',
            'image' => 'public/product/Cable-knit Sweater 49.56 JOD.jpg',
            'price' => 49.56,
            'description' => 'Oversized jumper in a soft rib knit made from a cotton blend. ',
            'additional_info' => 'Round neckline, low dropped shoulders, long sleeves and a slit at each side of the hem.',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Straight Pants',
            'image' => 'public/product/Straight Pants price 39.99.jpg',
            'price' => 39.99,
            'description' => 'Relaxed-fit cargo pants in cotton canvas with straight legs. Low waist, covered elastic at sides and back of waistband, and zip fly with snap fastener.',
            'additional_info' => ' Diagonal side pockets, leg pockets with flap, and an additional pocket on one leg.',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Textured-knit Sweater',
            'image' => 'public/product/Textured-knit Sweater price 119.00.jpg',
            'price' => 119.00,
            'description' => 'Sweater in a soft rib knit with wool content. Round neckline, dropped shoulders.',
            'additional_info' => ' long sleeves',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Jacquard-knit Sweater',
            'image' => 'public/product/Jacquard-knit Sweater 69.99.jpg',
            'price' => 69.99,
            'description' => ' sweater in a soft, textured knit with a jacquard-knit section at upper front and back. Round neckline,',
            'additional_info' => ' long raglan sleeves, and ribbing at neckline, cuffs, and hem.',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Wide-leg Pants',
            'image' => 'public/product/Wide-leg Pants 39.88 .jpg',
            'price' => 39.88,
            'description' => ' High-waist knit trousers with an elastic waistband. ',
            'additional_info' => 'Flared hems.',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Wool-blend Coat ',
            'image' => 'public/product/Wool-blend Coat 250.00 .jpg',
            'price' => 250.00,
            'description' => 'Coat with a lapel collar and long sleeves. Front welt pockets. ',
            'additional_info' => 'Back vent at the hem. Button-up front. ',
            'category_id' => 10,
            'subcategory_id' => 2
        ]);

        Product::create([
            'name' => 'Chunky Sneakers',
            'image' => 'public/product/Chunky Sneakers 49.00.jpg',
            'price' => 49.00,
            'description' => 'Fully-fashioned sneakers in mesh and faux leather. Lacing at front and a loop at back. Fabric linings, fabric insoles, and chunky, fluted soles. Sole thickness 2 1/4 in.',
            'additional_info' => '',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Chunky Sneakers',
            'image' => 'public/product/Chunky Sneakers 49.99.jpg',
            'price' => 49.99,
            'description' => 'Sneakers in mesh with a padded upper edge and tongue, lacing at front, and loop at back. Mesh lining and chunky, patterned soles. Sole thickness 1 in.',
            'additional_info' => '',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Chelsea Boots',
            'image' => 'public/product/Chelsea Boots 40.99.jpg',
            'price' => 40.99,
            'description' => 'Sneakers in mesh with a padded upper edge and tongue, lacing at front, and loop at back. Mesh lining and chunky, patterned soles. Sole thickness 1 in.',
            'additional_info' => '',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Knee-high Boots ',
            'image' => 'public/product/Knee-high Boots 74.99.jpg',
            'price' => 74.99,
            'description' => 'Knee-high boots in soft leather with a loop at back. Twill lining, leather insoles, and chunky, patterned soles. Heel height 2 1/4 in.',
            'additional_info' => '',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Laced Padded Boots ',
            'image' => 'public/product/Laced Padded Boots 129.00.jpg',
            'price' =>  129.00,
            'description' => 'Warm-lined, padded ankle boots with lacing over foot and around ankle.',
            'additional_info' => 'Loop at back and an appliqué at front. Soft, fluffy lining and insoles. Fluted soles. Sole thickness 1 3/4 in.',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Warm-lined Boots ',
            'image' => 'public/product/Warm-lined Boots 19.75.jpg',
            'price' =>  19.75,
            'description' => 'Boots in soft faux suede with visible seams. ',
            'additional_info' => 'Trim at upper edge and soles. Loop at back. Soft faux fur lining and insoles. Patterned soles. Sole thickness approx. 3/4 in.',
            'category_id' => 10,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => '90s Baggy High Waist Jeans',
            'image' => 'public/product/90s Baggy High Waist Jeans price 39.00.jpg',
            'price' =>  29.00,
            'description' => 'Loose-fit denim jeans with a high waist. Zip fly with button, dropped gusset',
            'additional_info' => ' wide, extra-long legs. Diagonal side pockets, leg pockets with flap, and back pockets.',
            'category_id' => 10,
            'subcategory_id' => 9
        ]);
        Product::create([
            'name' => 'Rhinestone-bow Rib-knit Cardigan',
            'image' => 'public/product/Rhinestone-bow Rib-knit Cardigan 29.00.jpg',
            'price' =>  29.00,
            'description' => 'Short cardigan in a soft rib knit with wool content',
            'additional_info' => 'V-neck, decorative, bows in rhinestone chain, and concealed snap fasteners at front. Long, wide sleeves with close-fitting cuffs and a straight hem.',
            'number_of_sold' => 2,
            'category_id' => 10,
            'subcategory_id' => 9
        ]);
        Product::create([
            'name' => 'Ribbed Cardigan',
            'image' => 'public/product/Ribbed Cardigan 29.99.jpg',
            'price' =>  29.00,
            'description' => 'Relaxed-fit, rib-knit cardigan with wool content. V-neck and buttons at front. ',
            'additional_info' => 'Dropped shoulders, long, wide sleeves, and patch front pockets. Slit at sides of hem.',
            'category_id' => 10,
            'subcategory_id' => 9
        ]);
        Product::create([
            'name' => 'Puffer Jacket',
            'image' => 'public/product/Puffer Jacket 150.00.jpg',
            'price' =>  150.00,
            'description' => 'Quilted, padded jacket with a stand-up collar and wind flap at front with snap fasteners.',
            'additional_info' => 'Welt front pockets. Lined.',
            'category_id' => 10,
            'subcategory_id' => 9
        ]);
        Product::create([
            'name' => 'Beaded-collar Sweater ',
            'image' => 'public/product/collar Sweater 29.70.jpg',
            'price' =>  29.70,
            'description' => 'Soft, knit sweater with wool content. Collar decorated with pearlescent plastic beads,',
            'additional_info' => ' long, wide sleeves, and ribbing at collar, cuffs, and hem.',
            'category_id' => 10,
            'subcategory_id' => 9
        ]);
        Product::create([
            'name' => 'Corduroy Pants',
            'image' => 'public/product/Corduroy Pants 48.99.jpg',
            'price' =>  48.99,
            'description' => '5-pocket pants in soft cotton corduroy. High waist, ',
            'additional_info' => 'zip fly with button, and wide legs.',
            'category_id' => 10,
            'subcategory_id' => 9
        ]);

        Product::create([
            'name' => '2-pack Long-sleeved Bodysuits',
            'image' => 'public/product/2-pack Long-sleeved Bodysuits 19.00.jpg',
            'price' => 19.00,
            'description' => 'Long-sleeved bodysuits in cotton jersey with a printed design. ',
            'additional_info' => 'Snap fasteners on one shoulder and at gusset.',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => '2-peace set ',
            'image' => 'public/product/2-peace set 19.20.jpg',
            'price' => 19.20,
            'description' => 'Bodysuits in soft cotton jersey. Concealed snap fastener on one shoulder, and snap fasteners at gusset.',
            'additional_info' => ' long sleeves,',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => '2-piece Romper Suit',
            'image' => 'public/product/2-piece Romper Suit and Tights Set 39.44.jpg',
            'price' => 39.44,
            'description' => 'Baby Exclusive. Comfortable set with romper suit and coordinated tights. Linen romper suit with a printed pattern in muted colors. Lined upper section, buttons at back, and gathered seams at front and back. Long sleeves, narrow elastic at cuffs and leg openings, and concealed snap fasteners at gusset. ',
            'additional_info' => 'Tights in a fine, rib-knit cotton blend with a soft, elasticized waistband.',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'socks',
            'image' => 'public/product/socks 9.99.jpg',
            'price' => 39.44,
            'description' => 'Fine-knit socks in a soft cotton blend with a foldover cuff.  ',
            'additional_info' => 'Non-slip protection.',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Water-repellent Snowsuit',
            'image' => 'public/product/Water-repellent Snowsuit 64.50 .jpg',
            'price' => 64.50,
            'description' => 'Padded snowsuit with a water-repellent function to keep your child dry in snow and light rain. Detachable, padded hood with faux-fur trim. Stand-up collar, zipper at front with anti-chafe chin guard, and small pocket at top with zipper. Elastic at back and wear-resistant, reinforced sections at back and at knees. Covered elastic at cuffs and hems and a reinforced foot strap. Reflective details for increased visibility.',
            'additional_info' => 'Lined. BIONIC-FINISH® ECO water-repellent coating without fluorocarbons',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Waterproof Boots',
            'image' => 'public/product/Waterproof Boots 39.44.jpg',
            'price' => 64.50,
            'description' => 'Ankle boots with a waterproof membrane to keep feet dry in snow and rain. Zipper at one side and a loop at back to get boots on and off with ease. Fluffy velboa lining and insoles.',
            'additional_info' => ' Chunky soles with good grip. Sole thickness 3/4 in.',
            'category_id' => 10,
            'subcategory_id' => 3
        ]);

        //daraghmeh
        Product::create([
            'name' => '2-piece shirt and trousers set',
            'image' => 'public/product/2-piece shirt and trousers set 24.99.jpg',
            'price' => 24.99,
            'description' => 'Set with a soft cotton flannel shirt and cotton twill trousers. Shirt with a collar, buttons down the front and long sleeves with buttoned cuffs. ',
            'additional_info' => ' Trousers with adjustable elastication at the waist, fake front pockets and a fake fly with a button.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => '3-piece Cotton Set ',
            'image' => 'public/product/3-piece Cotton Set 39.66.jpg',
            'price' => 39.66,
            'description' => 'Dressy set with a shirt, sweater vest, and pants in cotton. Shirt in woven fabric with a collar, buttons at front, long sleeves with button at cuffs, and a gently rounded hem.',
            'additional_info' => 'Jacquard-knit sweater vest with a V-neck and rib-knit trim at neck, armholes, and hem. Tapered pants in twill with an adjustable, elasticized waistband, mock fly with button, diagonal mock front pockets, and rolled up hems.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Padded Baby Bunting',
            'image' => 'public/product/Padded Baby Bunting 40.00.jpg',
            'price' => 40.00,
            'description' => 'Padded snowsuit in woven fabric. Hood with ear appliqués at top',
            'additional_info' => 'Zipper at front extending along one leg, chin guard at top, and foldover mitts and feet to keep hands and feet warm. Lined.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Patterned Puffer Jacket',
            'image' => 'public/product/Patterned Puffer Jacket 39.99.jpg',
            'price' => 39.99,
            'description' => 'Quilted, padded jacket in woven fabric with a printed pattern.',
            'additional_info' => 'Stand-up collar, detachable hood, and zipper at front with anti-chafe chin guard. Concealed elastic at cuffs and hem. Lined.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Sneakers',
            'image' => 'public/product/Sneakers 29.99.jpg',
            'price' => 29.99,
            'description' => 'Low-profile sneakers in faux suede. Hook-loop tabs at front, padded edge, and a small loop at back. ',
            'additional_info' => ' Mesh lining, mesh insoles, and patterned rubber soles. Sole thickness 3/4 in.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Warm-lined Boots',
            'image' => 'public/product/Warm-lined Boots 20.19.jpg',
            'price' => 20.19,
            'description' => 'Warm-lined boots in faux leather with lacing at front, zip at side, and loop at back. Faux shearling lining and insoles.',
            'additional_info' => '',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Warm-lined Boots',
            'image' => 'public/product/Warm-lined Boots 20.33.jpg',
            'price' => 20.33,
            'description' => 'Ankle boots with a waterproof membrane to keep feet dry in snow and rain. Zipper at one side and a loop at back to get boots on and off with ease.',
            'additional_info' => 'Fluffy velboa lining and insoles. Chunky soles with good grip. Sole thickness 3/4 in.',
            'category_id' => 9,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Fit Suit Vest',
            'image' => 'public/product/Fit Suit Vest 24.99.jpg',
            'price' => 24.99,
            'description' => 'Suit vest in woven fabric with shiny woven fabric at back.',
            'additional_info' => 'Buttons at front, a chest pocket, welt front pockets, and adjustable tab at back. Lined.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Relaxed Fit Hoodie',
            'image' => 'public/product/hoodie 20.66jpg.jpg',
            'price' => 20.66,
            'description' => 'Relaxed-fit sweatshirt hoodie in cotton-blend fabric with soft, brushed inside. ',
            'additional_info' => 'Jersey-lined drawstring hood, kangaroo pocket, and long sleeves. Wide ribbing at cuffs and hem.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Slim Fit Pants',
            'image' => 'public/product/pants 34.99 .jpg',
            'price' => 34.99,
            'description' => 'Slim-fit pants in twill. Waistband with concealed hook-and-eye fastener and a zip fly.',
            'additional_info' => ' Side pockets and welt back pockets with button.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Relaxed Fit Hoodie ',
            'image' => 'public/product/Relaxed Fit Hoodie 24.99.jpg',
            'price' => 34.99,
            'description' => 'Relaxed-fit sweatshirt hoodie in cotton-blend fabric with soft, brushed inside',
            'additional_info' => 'Jersey-lined drawstring hood, kangaroo pocket, and long sleeves. Wide ribbing at cuffs and hem.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Relaxed Fit Wool-blend Jacket',
            'image' => 'public/product/Relaxed Fit Wool-blend Jacket 199.00.jpg',
            'price' => 199.00,
            'description' => 'relaxed-fit, double-breasted jacket in a soft, undyed wool blend. Pointed lapels,',
            'additional_info' => ' decorative buttons at cuffs, and a vent at back. Chest pocket, patch front pockets, and two inner pockets. Lined.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Skinny Fit Jacket ',
            'image' => 'public/product/Skinny Fit Jacket 74.99.jpg',
            'price' => 74.99,
            'description' => 'Skinny-fit, single-breasted jacket in woven stretch fabric.',
            'additional_info' => 'Narrow, notched lapels and decorative buttons at cuffs. Chest pocket, front pockets with flap, and an inner pocket. Vent at back. Lined.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'Slim Jeans',
            'image' => 'public/product/Slim Jeans 30.20.jpg',
            'price' => 30.20,
            'description' => '5-pocket jeans in cotton denim with a slight stretch for good comfort. Straight leg and a slim fit from the waist through the thigh to the hem.',
            'additional_info' => ' Regular waist and a zip fly. Easily styled for sleek or sporty.',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'tshirt-pack',
            'image' => 'public/product/tshirt-pack 30.66.jpg',
            'price' => 30.66,
            'description' => 'Regular-fit T-shirts in soft cotton jersey. Ribbed crew neck and straight-cut hem.',
            'additional_info' => '',
            'category_id' => 9,
            'subcategory_id' => 1
        ]);
        Product::create([
            'name' => 'boots',
            'image' => 'public/product/boots 64.30.jpg',
            'price' => 64.30,
            'description' => 'Boots with toe caps, lacing at front, zipper at one side, and a loop at back',
            'additional_info' => 'Cotton canvas lining and insoles. Fluted soles. Heel height 1 1/4 in.',
            'category_id' => 9,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Chunky Sneakers',
            'image' => 'public/product/Chunky Sneakers 49.99.jpg',
            'price' => 49.99,
            'description' => 'Sneakers in mesh with a padded edge and tongue, lacing at front, and loop at back.',
            'additional_info' => 'Piqué lining, piqué insoles, and chunky, patterned soles. Sole thickness 2 in.',
            'category_id' => 9,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Derby Shoes',
            'image' => 'public/product/Derby Shoes 34.99.jpg',
            'price' => 34.99,
            'description' => 'Derby shoes with open lacing at front. Canvas lining and insoles.',
            'additional_info' => 'Heel height 1 in.',
            'number_of_sold' => 3,
            'category_id' => 9,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'High Top boot',
            'image' => 'public/product/High Top boot 84.99 .jpg',
            'price' =>  84.99,
            'description' => 'Chelsea boots with elasticized side panels and a loop at front and back. ',
            'additional_info' => ' Canvas lining, canvas insoles, and chunky, patterned soles. Heel height 1 1/4 in.',
            'category_id' => 9,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'High Tops ',
            'image' => 'public/product/High Tops 44.99 .jpg',
            'price' => 44.99,
            'description' => 'New Arrival High tops with lacing at front and a loop at back.',
            'additional_info' => ' Cotton canvas lining and insoles. Patterned soles. Sole thickness 1 1/2 in.',
            'category_id' => 9,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'Sneakers ',
            'image' => 'public/product/Sneakers 50.00.jpg',
            'price' => 50.00,
            'description' => 'Sneakers in mesh with faux leather details. Padded upper edge, padded tongue, and lacing at front.',
            'additional_info' => ' Jersey lining, piqué insoles, and chunky, patterned soles. Sole thickness 2 1/2 in.',
            'number_of_sold' => 1,
            'category_id' => 9,
            'subcategory_id' => 6
        ]);


        //mango products 
        Product::create([
            'name' => 'FAUX-FUR SHOULDER BAG ',
            'image' => 'public/product/FAUX-FUR SHOULDER BAG .jpg',
            'price' => 15.00,
            'description' => 'Half-moon faux fur shoulder bag.',
            'additional_info' => ' Zip closure',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'LEATHER CARD HOLDER',
            'image' => 'public/product/LEATHER CARD HOLDER.jpg',
            'price' => 20.00,
            'description' => 'Leather card holder',
            'additional_info' => ' Interior divided into several compartments. Detachable metal chain crossbody strap. Metal clasp.',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'LEATHER CUT OUT TOTE BAG ',
            'image' => 'public/product/LEATHER CUT OUT TOTE BAG .jpg',
            'price' => 19.00,
            'description' => ' LEATHER TOTE BAG WITH CUTOUT EXTERIOR.',
            'additional_info' => 'TOP HANDLE. ADJUSTABLE AND REMOVABLE CROSSBODY STRAP. MAGNETIC CLOSURE.',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Rectangular leather shoulder bag',
            'image' => 'public/product/Rectangular leather shoulder bag.jpg',
            'price' => 23.00,
            'description' => ' Decorative seams',
            'additional_info' => 'Tubular shoulder straps and detachable crossbody strap.',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'MINI CITY BAG',
            'image' => 'public/product/Mini city bag.jpg',
            'price' => 40.00,
            'description' => ' Rigid handle. Detachable shoulder strap. Lined interior with pocket. Magnetic closure.',
            'additional_info' => 'Animal print exterior.',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'MINI FLORAL HANDBAG ',
            'image' => 'public/product/MINI FLORAL HANDBAG .jpg',
            'price' => 15.00,
            'description' => ' Handle with decorative flowers and a detachable and adjustable crossbody strap. Magnetic clasp closure on the flap.',
            'additional_info' => ' Mini square handbag.',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Teddy Mini Bag',
            'image' => 'public/product/Teddy Mini Bag .jpg',
            'price' => 12.00,
            'description' => 'Boxy bag in soft, plush teddy fabric with a zipper at top. ',
            'additional_info' => 'Lined. Height 3 1/2 in. Width 6 in. Depth 3 1/2 in',
            'category_id' => 4,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'EMBELLISHED VINYL HIGH-HEEL',
            'image' => 'public/product/EMBELLISHED VINYL .jpg',
            'price' => 20.00,
            'description' => ' SHOES High-heel slingback shoes.  ',
            'additional_info' => 'HIGH-HEELVinyl upper. Embellished rhinestone details on the front.',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'FABRIC OVER THE KNEE BOOTS',
            'image' => 'public/product/FABRIC OVER THE KNEE BOOTS.jpg',
            'price' => 49.99,
            'description' => 'Sock-style ankle boots in a combination of materials.',
            'additional_info' => 'Track sole. Back pull tab detail..',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'FLAT CRISS-CROSS',
            'image' => 'public/product/FLAT CRISS-CROSS .jpg',
            'price' => 30.10,
            'description' => 'LEATHER SLIDER SANDALS',
            'additional_info' => '',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'LACE UP FABRIC SLIDER SANDALS',
            'image' => 'public/product/LACE UP FABRIC SLIDER SANDALS.jpg',
            'price' => 35.10,
            'description' => 'Flat slider sandals in elastic fabric with thin criss cross straps.',
            'additional_info' => 'Chunky sole. Tied closure around the ankle.',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'STRAPPY PLATFORM METALLIC SANDALS',
            'image' => 'public/product/STRAPPY PLATFORM METALLIC SANDALS.jpg',
            'price' => 50.20,
            'description' => ' High-heel sandals.',
            'additional_info' => 'Metallic-effect finish. Thin straps on the front. Geometric high heel with platform. Buckled ankle strap fastening.',
            'category_id' => 4,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'TRAINERS',
            'image' => 'public/product/TRAINERS.jpg',
            'price' => 50.20,
            'description' => 'Lace-up trainers.',
            'additional_info' => 'Chunky track soles.',
            'number_of_sold' => 1,
            'category_id' => 4,
            'subcategory_id' => 6
        ]);

        Product::create([
            'name' => 'Corduroy Overall Dress',
            'image' => 'public/product/Corduroy Overall Dress 34.99.jpg',
            'price' => 34.99,
            'description' => 'Short, loose-fit overall dress in cotton corduroy. Adjustable suspenders with metal fasteners.',
            'additional_info' => 'Chest pocket, front pockets, and back pockets. Buttons at sides and a mock fly. Unlined.',
            'category_id' => 4,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Quilted Outdoor Joggers',
            'image' => 'public/product/Quilted Outdoor Joggers 74.00.jpg',
            'price' => 74.00,
            'description' => 'Regular-fit, lightly padded, quilted joggers in windproof, water-repellent functional fabric designed for light showers and protection from wind.',
            'additional_info' => 'Covered elastic at waistband, zip fly, and a woven belt with magnetic fastener. Diagonal side pockets and a coin pocket at one side with zipper for safer storage. Lined.',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Quilted Outdoor top',
            'image' => 'public/product/Quilted Outdoor Top .jpg',
            'price' => 64.99,
            'description' => 'Lightly padded top in quilted, windproof, water-repellent functional fabric designed for light showers and protection from wind. Round neckline, dropped shoulders, and long sleeves with a narrow elastic at cuffs..',
            'additional_info' => 'Diagonal side pockets with concealed zipper. Drawstring at hem. Lined.',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Sports Anorak',
            'image' => 'public/product/Sports Anorak 64.99.jpg',
            'price' => 64.99,
            'description' => 'Regular-fit sports anorak in soft, warm teddy fleece with sections in quilted, woven fabric. Lined hood with drawstring and cord stoppers at front. ',
            'additional_info' => ' Half-zip, heavily dropped shoulders, and long sleeves. Large front pocket with flap and concealed zipper, side pockets with zipper, and ribbing at cuffs and hem.',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Square-necked Dress ',
            'image' => 'public/product/Square-necked Dress 90.00.jpg',
            'price' => 90.00,
            'description' => 'fitted dress in woven fabric. Square neckline, concealed zipper at back, narrow, covered elastic over shoulders, and long sleeves',
            'additional_info' => 'Straight-cut hem. Satin lining.',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'Teddy Sports Joggers',
            'image' => 'public/product/Teddy Sports Joggers 49.99.jpg',
            'price' => 49.99,
            'description' => 'Regular-fit sports joggers in soft teddy fabric with quilted sections. Smocked, elasticized waistband with a concealed, elasticized drawstring and cord stopper',
            'additional_info' => 'Side pockets with zipper and tapered legs with covered elastic at hems.',
            'category_id' => 4,
            'subcategory_id' => 2
        ]);

        //pretty
        Product::create([
            'name' => '2-PACK OF WOODEN NECKLACES ',
            'image' => 'public/product/2-PACK OF WOODEN NECKLACES .jpg',
            'price' => 5.99,
            'description' => 'Pack of two necklaces ',
            'additional_info' => 'with lobster clasp fastening',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => '3-PACK OF RHINESTONE HAIR CLIPS ',
            'image' => 'public/product/3-PACK OF RHINESTONE HAIR CLIPS .jpg',
            'price' => 4.99,
            'description' => 'Pack of 3 hair clips',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => '3-SCRUNCHIES ',
            'image' => 'public/product/3-PACK OF SPARKLY SCRUNCHIES.jpg',
            'price' => 4.20,
            'description' => '3-PACK OF SPARKLY SCRUNCHIES  Pack of three scrunchies with rhinestone details.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PRINT SCARF',
            'image' => 'public/product/FLORAL PRINT SCARF  Square scarf.jpg',
            'price' => 4.00,
            'description' => 'FLORAL PRINT SCARF  Square scarf with a floral print.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => ' COLOURED TEXTURED SCRUNCHIES',
            'image' => 'public/product/PACK OF THREE PLAIN COLOURED TEXTURED SCRUNCHIES.jpg',
            'price' => 3.00,
            'description' => 'PACK OF THREE PLAIN COLOURED TEXTURED SCRUNCHIES  This pack is indivisible and must be returned complete.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'POLKA DOT HEADBAND',
            'image' => 'public/product/POLKA DOT HEADBAND.jpg',
            'price' => 5.00,
            'description' => 'POLKA DOT HEADBAND  Headband with',
            'additional_info' => ' a bow appliqué and a polka dot print.',
            'number_of_sold' => 2,
            'category_id' => 5,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'FAUX FUR CROSSBODY BAG ',
            'image' => 'public/product/FAUX FUR CROSSBODY BAG  Monochrome faux fur crossbody bag with a double handle and a shoulder strap. Clip buckle fastening..jpg',
            'price' => 25.00,
            'description' => 'Monochrome faux fur crossbody bag with a double handle and a shoulder strap.',
            'additional_info' => 'Clip buckle fastening.',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'MOJANG AB',
            'image' => 'public/product/MINECRAFT  MOJANG AB. TM BELT BAG Main compartment with zip closure. Adjustable strap with clip buckle fastening..jpg',
            'price' => 13.00,
            'description' => 'TM BELT BAG Main compartment with zip closure.',
            'additional_info' => 'Adjustable strap with clip buckle fastening.',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => ' BUCKET BAG',
            'image' => 'public/product/MINI BUCKET BAG  Mini crossbody bag made of cotton and linen. Adjustable drawstrings and shoulder strap..jpg',
            'price' => 17.20,
            'description' => 'MINI BUCKET BAG  Mini crossbody bag made of cotton and linen.',
            'additional_info' => 'Adjustable drawstrings and shoulder strap.',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'CROSSBODY BAG',
            'image' => 'public/product/QUILTED CROSSBODY BAG  Monochrome crossbody bag with a quilted finish and zip closure. Tubular effect shoulder strap.jpg',
            'price' => 12.20,
            'description' => 'QUILTED CROSSBODY BAG  Monochrome crossbody bag with a quilted finish and zip closure.',
            'additional_info' => 'Tubular effect shoulder strap',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'BACKPACK',
            'image' => 'public/product/TECHNICAL BACKPACK  Main compartment with zip closure and an additional front pocket..jpg',
            'price' => 25.30,
            'description' => 'TECHNICAL BACKPACK  Main compartment with zip closure and an additional front pocket.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'Crossbody mobile phone bag',
            'image' => 'public/product/MOBILE PHONE BAG  Crossbody mobile phone case with a rubberised finish. Main compartment with a zip closure. Has a front pocket. Detachable and adjustable shoulder strap..jpg',
            'price' => 9.90,
            'description' => 'MOBILE PHONE BAG  Crossbody mobile phone case with a rubberised finish. ',
            'additional_info' => ' Main compartment with a zip closure. Has a front pocket. Detachable and adjustable shoulder strap',
            'category_id' => 5,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'SHEARLING BOOTS ',
            'image' => 'public/product/FAUX SHEARLING BOOTS  Boots with faux shearling lining. Pull tab at the back and side zip for slipping on with ease. Rubber sole..jpg',
            'price' => 19.90,
            'description' => 'FAUX SHEARLING BOOTS  Boots with faux shearling lining ',
            'additional_info' => ' Pull tab at the back and side zip for slipping on with ease. Rubber sole.',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'BOOTS WITH CONTRAST SOLE ',
            'image' => 'public/product/Lace-up fastening and pull tab at the back for slipping on with ease. Rubber track sole..jpg',
            'price' => 39.90,
            'description' => 'Black monochrome lace-up ankle boots. Zip on the inside. Starfit insole and contrast-coloured rubber sole.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'LEATHER ANKLE BOOTS ',
            'image' => 'public/product/LEATHER ANKLE BOOTS  Adjustable hook-and-loop strap with faux shearling interior. Front and back pull tabs for slipping on with ease..jpg',
            'price' => 22.90,
            'description' => ' Adjustable hook-and-loop strap with faux shearling interior. Front and back pull tabs for slipping on with ease.',
            'additional_info' => '100% goatskin leather insole and cotton lining. Rubber sole.',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'LEATHER SNEAKERS ',
            'image' => 'public/product/LEATHER SNEAKERS  Two hook-and-loop straps for fastening..jpg',
            'price' => 19.90,
            'description' => '  Two hook-and-loop straps for fastening',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'MOUNTAIN BOOTS',
            'image' => 'public/product/QUILTED MOUNTAIN BOOTS  Quilted nylon mountain boots. Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease. Contrast track sole..jpg',
            'price' => 27.90,
            'description' => ' QUILTED MOUNTAIN BOOTS  Quilted nylon mountain boots.',
            'additional_info' => 'Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease. Contrast track sole.',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'SHINY SNEAKERS',
            'image' => 'public/product/UILTED SHINY SNEAKERS  100% cotton memory-effect insole and lining. Back pull tab for slipping on with ease. Hook-and-loop strap fastening..jpg',
            'price' => 16.30,
            'description' => ' UILTED SHINY SNEAKERS  Back pull tab for slipping on with ease. Hook-and-loop strap fastening.',
            'additional_info' => '100% cotton memory-effect insole and lining.',
            'category_id' => 5,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'BOMBER JACKET',
            'image' => 'public/product/CONTRAST VARSITY BOMBER JACKET WITH PATCHES  Quilted round neck bomber jacket featuring long faux leather sleeves with cuffs.jpg',
            'price' => 25.30,
            'description' => 'Quilted round neck bomber jacket featuring long faux leather sleeves with cuffs.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'OVERSHIRT Collared denim',
            'image' => 'public/product/DENIM INDIGO OVERSHIRT Collared denim overshirt with long sleeves. Featuring snap-button fastening and patch pockets at the front..jpg',
            'price' => 17.40,
            'description' => 'OVERSHIRT Collared denim overshirt with long sleeves. ',
            'additional_info' => ' Featuring snap-button fastening and patch pockets at the front.',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'OVERSHIRT Collared denim',
            'image' => 'public/product/DRAWSTRING DENIM BERMUDA SHORTS  Denim Bermuda shorts with an elastic waistband and contrast adjustable front drawstrings. Patch pockets on the front and back with label appliqué..jpg',
            'price' => 15.60,
            'description' => 'OVERSHIRT Collared denim overshirt with long sleeves. ',
            'additional_info' => ' Featuring snap-button fastening and patch pockets at the front.',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'KNICKS POLO SHIRT',
            'image' => 'public/product/NBA KNICKS POLO SHIRT  Collared polo shirt with long sleeves, ribbed trims and a KNICKS NBA print..jpg',
            'price' => 13.60,
            'description' => ' Collared polo shirt with long sleeves',
            'additional_info' => ' ribbed trims and a KNICKS NBA™ print.',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'PRINTED SHIRT',
            'image' => 'public/product/PRINTED SHIRT  Collared shirt with short sleeves. Featuring front button fastening and patch pocket on the chest..jpg',
            'price' => 16.60,
            'description' => ' Featuring front button fastening and patch pocket on the chest.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'Two-piece set',
            'image' => 'public/product/SOFT TOUCH SET Two-piece set. Round neck T-shirt with long sleeves.jpg',
            'price' => 20.60,
            'description' => 'Two-piece set. Round neck T-shirt with long sleeves.',
            'additional_info' => '',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'Round neck sweatshirt',
            'image' => 'public/product/STRIPED SWEATSHIRT WITH EMBOSSED LABEL  Round neck sweatshirt featuring long sleeves with cuffs. Label appliqué at the front with contrast raised detail. Ribbed trims..jpg',
            'price' => 16.80,
            'description' => 'STRIPED SWEATSHIRT WITH EMBOSSED LABEL  Round neck sweatshirt featuring long sleeves with cuffs',
            'additional_info' => ' Label appliqué at the front with contrast raised detail. Ribbed trims.',
            'category_id' => 5,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'BEAR MESH CAP',
            'image' => 'public/product/BEAR MESH CAP  Contrast cap with mesh and adjustable back fastening..jpg',
            'price' => 10.80,
            'description' => 'Contrast cap with mesh and adjustable back fastening.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'FUR HAT WITH EARS',
            'image' => 'public/product/FAUX FUR HAT WITH EARS Faux fur hat with ear appliqués and hook-and-loop fastenings..jpg',
            'price' => 8.00,
            'description' => 'FAUX FUR HAT WITH EARS Faux fur hat with ear appliqués and hook-and-loop fastenings.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'SHEARLING HAT',
            'image' => 'public/product/FAUX SHEARLING HAT  Faux shearling hat with contrast trim..jpg',
            'price' => 7.30,
            'description' => 'FAUX SHEARLING HAT  Faux shearling hat with contrast trim.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'KNIT HAT',
            'image' => 'public/product/KNIT BEANIE WITH INITIAL DETAIL  Knit beanie with a turn-up brim and initial appliqué..jpg',
            'price' => 6.30,
            'description' => 'FAUX SHEARLING HAT  Faux shearling hat with contrast trim.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'Knit beanie with a turn-up brim',
            'image' => 'public/product/KNIT BEANIE WITH POMPOM  Knit beanie with a turn-up brim. Pompom appliqué and drawstring fastening..jpg',
            'price' => 5.30,
            'description' => 'Pompom appliqué and drawstring fastening.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);
        Product::create([
            'name' => 'REINDEER HAT',
            'image' => 'public/product/REINDEER HAT  Hat with appliqués, ribbed turn-up brim and chin ties..jpg',
            'price' => 8.30,
            'description' => ' Hat with appliqués, ribbed turn-up brim and chin ties.',
            'additional_info' => ' ',
            'category_id' => 5,
            'subcategory_id' => 7
        ]);

        //dior(men)
        Product::create([
            'name' => 'PREMIUM TWILL SHIRT',
            'image' => 'public/product/1.jpg',
            'price' => 49.00,
            'description' => 'Regular fit spread collar shirt featuring long sleeves with buttoned cuffs. ',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'PREMIUM TWILL SHIRT',
            'image' => 'public/product/2.jpg',
            'price' => 49.00,
            'description' => 'Regular fit spread collar shirt featuring long sleeves with buttoned cuffs. ',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'LEATHER ANKLE BOOTS',
            'image' => 'public/product/3.jpg',
            'price' => 89.00,
            'description' => 'Black leather ankle boots. Matching elastic side gores. Leather insole. Semi-pointed toe. Classic style. ',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'BASIC SLIM FIT T-SHIRT',
            'image' => 'public/product/4.jpg',
            'price' => 11.50,
            'description' => 'Stretch cotton T-shirt featuring a round neck and short sleeves. ',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'ADDED JACKET',
            'image' => 'public/product/5.jpg',
            'price' => 89.00,
            'description' => 'Jacket made of a wool blend. Padded interior. Patch pockets on the chest and hip. ',
            'additional_info' => 'This is additional info',
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'TEXTURED T-SHIRT',
            'image' => 'public/product/6.jpg',
            'price' => 25.00,
            'description' => 'Long sleeve T-shirt with a round neckline.  ',
            'additional_info' => 'This is additional info',
            'number_of_sold' => 2,
            'category_id' => 7,
            'subcategory_id' => 1 //men
        ]);
        //gucci(BAG,cho,woman)
        //BAG
        Product::create([
            'name' => 'LEATHER SHOULDER BAG',
            'image' => 'public/product/1G.jpg',
            'price' => 129.00,
            'description' => ' Tubular shoulder straps and detachable crossbody strap. Decorative seams.  ',
            'additional_info' => 'Rectangular leather shoulder bag.',
            'number_of_sold' => 1,
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'TROCKER SHOULDER BAG WITH FLAP',
            'image' => 'public/product/2G.jpg',
            'price' => 35.00,
            'description' => 'Black shoulder bag with seam details and three compartments, one of which has zip closure.  ',
            'additional_info' => 'Chain shoulder strap. Lined interior with pocket. Magnetic clasp closure. ',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'FLORAL LEATHER BAGT',
            'image' => 'public/product/3G.jpg',
            'price' => 29.00,
            'description' => 'Leather crossbody bag. Floral detail on the front.   ',
            'additional_info' => 'Zip closure.',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'SHOULDER BAG WITH BEADED STRAP',
            'image' => 'public/product/4G.jpg',
            'price' => 20.00,
            'description' => 'Shoulder bag that converts into a clutch. Animal print embossing on the exterior. ',
            'additional_info' => 'Metal chain shoulder strap. Magnetic clasp closure. ',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => '. MOCK CROC MAXI CLUTCH BAG',
            'image' => 'public/product/5G.jpg',
            'price' => 35.00,
            'description' => 'Maxi clutch bag with embossed animal print. Long metal crossbody strap.   ',
            'additional_info' => 'Magnetic clasp closure.',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'TOTE BAG WITH EMBELLISHED DETAIL',
            'image' => 'public/product/6G.jpg',
            'price' => 29.00,
            'description' => 'Square tote bag. Shoulder straps. Detachable embellished strap detail. Lined interior.  ',
            'additional_info' => 'Magnetic clasp closure.',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        Product::create([
            'name' => 'RETRO QUILTED CROSSBODY BAG',
            'image' => 'public/product/7G.jpg',
            'price' => 30.00,
            'description' => 'Crossbody bag. Quilted exterior. Square metal piece on the flap. Lined interior with pocket.   ',
            'additional_info' => 'Chain shoulder strap.',
            'category_id' => 8,
            'subcategory_id' => 4
        ]);
        //cho
        Product::create([
            'name' => 'HIGH-HEEL FAUX PATENT ANKLE BOOTS WITH TRACK SOLE',
            'image' => 'public/product/1c.jpg',
            'price' => 49.00,
            'description' => 'Ankle boots with a block heel and faux patent finish. Track sole. Round toe.  ',
            'additional_info' => ' Zip fastening on the side.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'BLOCK HEEL ANKLE BOOTS WITH TRACK SOLES',
            'image' => 'public/product/2c.jpg',
            'price' => 30.00,
            'description' => 'Ankle boots with block heels. Chunky track sole.   ',
            'additional_info' => 'Elastic panels on the sides.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'GEOMETRIC HIGH-HEEL ANKLE BOOTS',
            'image' => 'public/product/3c.jpg',
            'price' => 45.00,
            'description' => 'High-heel geometric ankle boots. Fitted upper. Pointed toe.  ',
            'additional_info' => 'Side zip fastening.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'TRIANGULAR HEELED ANKLE BOOTS',
            'image' => 'public/product/4c.jpg',
            'price' => 65.00,
            'description' => 'Patent-finish high-heel ankle boots. Triangular block heel. Pointed toe.  ',
            'additional_info' => 'Zip fastening on the side.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'HEELED NYLON ANKLE BOOTS',
            'image' => 'public/product/5c.jpg',
            'price' => 65.00,
            'description' => 'High-heel ankle boots in stretch nylon fabric. Fitted upper.   ',
            'additional_info' => 'Pointed toe.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'POINTED TOE LEATHER PLATFORM ANKLE BOOTS',
            'image' => 'public/product/6c.jpg',
            'price' => 119.00,
            'description' => 'Leather ankle boots. High heel with platform. Pointed toe.   ',
            'additional_info' => 'Side zip fastening.',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        Product::create([
            'name' => 'PLATFORM ANKLE BOOTS',
            'image' => 'public/product/7c.jpg',
            'price' => 49.00,
            'description' => 'High-heel platform ankle boots. Round toe.  ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 6
        ]);
        //woman
        Product::create([
            'name' => 'CABLE-KNIT DRESS',
            'image' => 'public/product/1m.jpg',
            'price' => 39.00,
            'description' => 'Mini dress with a high neck and long sleeves. ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'SHORT KNIT DRESS',
            'image' => 'public/product/2m.jpg',
            'price' => 39.00,
            'description' => 'Long sleeve high neck dress. ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'CONTRAST KNIT MINI DRESS',
            'image' => 'public/product/3m.jpg',
            'price' => 39.00,
            'description' => 'Long sleeve dress with an ample round neckline. ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'KNIT DRESS WITH OPEN BACK',
            'image' => 'public/product/4m.jpg',
            'price' => 45.00,
            'description' => 'Short dress with a round neckline and long sleeves.  ',
            'additional_info' => 'Featuring metallic thread detail and an opening at the back with a crossover strap. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => '. FLORAL KNIT DRESS',
            'image' => 'public/product/5m.jpg',
            'price' => 45.00,
            'description' => 'Mini dress with a high neck, long sleeves and floral appliqués.  ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'SKATER KNIT DRESS',
            'image' => 'public/product/6m.jpg',
            'price' => 39.00,
            'description' => 'Short dress with a high neck, short sleeves and a flared hem. ',
            'additional_info' => 'Zip fastening on the inside. ',
            'category_id' => 8,
            'subcategory_id' => 2
        ]);
        //D&G(ACC,KID,MEN,WOMAN)
        //ACC
        Product::create([
            'name' => 'NECKLACE WITH METAL LEAVES',
            'image' => 'public/product/1cc.jpg',
            'price' => 29.00,
            'description' => 'Metal necklace in the shape of leaves.  ',
            'additional_info' => ' Lobster clasp fastening. ',
            'number_of_sold' => 1,
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'RHINESTONE CHOKER',
            'image' => 'public/product/2cc.jpg',
            'price' => 18.50,
            'description' => 'Wide choker with rhinestone beads.',
            'additional_info' => 'Lobster clasp fastening. ',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'MINI CHOKER WITH PEARL BEADS',
            'image' => 'public/product/3cc.jpg',
            'price' => 20.50,
            'description' => 'Metal choker necklace with mini pearl bead appliqués.  ',
            'additional_info' => 'Lobster clasp fastening.',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PEARL BEAD CHOKER NECKLACE',
            'image' => 'public/product/4cc.jpg',
            'price' => 39.00,
            'description' => 'Metal choker necklace with pearl bead appliqués.  ',
            'additional_info' => 'Lobster clasp fastening. ',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'CASCADING CHOKER',
            'image' => 'public/product/5cc.jpg',
            'price' => 21.50,
            'description' => 'Metal choker. Lobster clasp fastening.  ',
            'additional_info' => 'Lobster clasp fastening. ',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        Product::create([
            'name' => 'PEARL BEAD MAXI CHOKER',
            'image' => 'public/product/6cc.jpg',
            'price' => 11.50,
            'description' => 'SChoker with fresh water pearl bead appliqués. Lobster clasp fastening.  ',
            'additional_info' => 'Lobster clasp fastening.',
            'category_id' => 6,
            'subcategory_id' => 5
        ]);
        //KID
        Product::create([
            'name' => 'KNIT CARDIGAN',
            'image' => 'public/product/1l.jpg',
            'price' => 29.50,
            'description' => 'Knit cardigan featuring a round neck and long sleeves with cuffs.  ',
            'additional_info' => 'Button-up front.',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'CROPPED DENIM JACKET WITH RIPS',
            'image' => 'public/product/2l.jpg',
            'price' => 29.50,
            'description' => 'Collared, cropped denim jacket featuring long sleeves, a button-up front.  ',
            'additional_info' => ' front patch pockets and ripped details.',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'DENIM WORKER JACKET',
            'image' => 'public/product/3l.jpg',
            'price' => 32.00,
            'description' => 'Collared denim jacket with long sleeves. Button-up front.   ',
            'additional_info' => 'Contrast front pockets. ',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'WINDPROOF AND WATER-REPELLENT APRÈS SKI PUFFER COAT',
            'image' => 'public/product/4l.jpg',
            'price' => 45.00,
            'description' => 'Wind-proof and water-repellent puffer coat with a high collar and long sleeves with adjustable button fastening. Zip-up front.  ',
            'additional_info' => 'Side pockets. Elasticated hem. ',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => '. WINDPROOF AND WATER-REPELLENT APRÈS SKI QUILTED CARGO TROUSERS',
            'image' => 'public/product/5l.jpg',
            'price' => 49.00,
            'description' => 'Wind-proof and water-repellent quilted cargo trousers featuring an elasticated waistband, front snap-button fastening, belt appliqué, front pockets, rear patch pockets.  ',
            'additional_info' => ' leg pockets with flaps and fleece lining.',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        Product::create([
            'name' => 'WATER-REPELLENT PADDED BOOTS',
            'image' => 'public/product/6l.jpg',
            'price' => 29.00,
            'description' => 'Padded boots in contrast materials. Adjustable lace-up fastening and side zip fastening. Front and back pull tabs for slipping on with ease. Memory-effect insole and faux fur lining.   ',
            'additional_info' => 'Chunky rubber sole. ',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);

        Product::create([
            'name' => 'PADDED BACKPACK',
            'image' => 'public/product/7l.jpg',
            'price' => 39.00,
            'description' => 'Padded backpack made of 100% cotton. Main compartment featuring a fastening with clip closure and an adjustable drawstring. Featuring two side pockets with brooch fastening and a front mesh pocket.  ',
            'additional_info' => 'Top handle and two adjustable shoulder straps. ',
            'category_id' => 6,
            'subcategory_id' => 3
        ]);
        //MEN
        Product::create([
            'name' => 'MOCK NECK SWEATER',
            'image' => 'public/product/1v.jpg',
            'price' => 49.00,
            'description' => 'Fine knit mock neck sweater .',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'category_id' => 6,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'KNOP YARN SWEATER',
            'image' => 'public/product/2v.jpg',
            'price' => 49.00,
            'description' => 'Long sleeve round neck sweater with ribbed trims.  ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'category_id' => 6,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'CASHMERE BLEND SWEATER',
            'image' => 'public/product/3v.jpg',
            'price' => 49.00,
            'description' => 'Sweater made of a spun cashmere blend. Featuring a round neckline. ',
            'additional_info' => 'long sleeves and ribbed trims. ',
            'category_id' => 6,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'WOOL BLEND COAT',
            'image' => 'public/product/4v.jpg',
            'price' => 35.00,
            'description' => 'PCoat made of a wool blend. Notched lapel collar and long sleeves. Flap pockets at the hip and an inside pocket detail. Back vent at the centre of the hem.  ',
            'additional_info' => 'Buttoned front. ',
            'category_id' => 6,
            'subcategory_id' => 1 //men
        ]);
        Product::create([
            'name' => 'BASIC SLIM FIT T-SHIRT',
            'image' => 'public/product/5v.jpg',
            'price' => 39.00,
            'description' => 'Stretch cotton T-shirt featuring a round neck and short sleeves. ',
            'additional_info' => 'Buttoned front. ',
            'category_id' => 6,
            'subcategory_id' => 1 //men
        ]);

        //WOMAN
        Product::create([
            'name' => 'STRAIGHT TROUSERS WITH METAL BUTTONS',
            'image' => 'public/product/1w.jpg',
            'price' => 39.00,
            'description' => 'High-waist trousers with an elastic waistband at the back. Front pockets with decorative golden buttons. False welt pockets at the back. ',
            'additional_info' => 'Straight-leg design. ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => '. MINIMALIST HIGH-WAIST TROUSERS',
            'image' => 'public/product/2w.jpg',
            'price' => 39.00,
            'description' => 'PHigh-waist trousers made of a viscose blend. Visible seams. ',
            'additional_info' => 'Invisible side zip fastening. ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'SHINY PUFFER GILET',
            'image' => 'public/product/3w.jpg',
            'price' => 39.00,
            'description' => 'Long water-repellent gilet with a high collar. Featuring a detachable hood with zip, adjustable drawstrings and stoppers. ',
            'additional_info' => ' side in-seam pockets and a thermo-sealed zip-up front.  ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'PRINTED PALAZZO TROUSERS',
            'image' => 'public/product/4w.jpg',
            'price' => 39.00,
            'description' => 'High-waist trousers with front pockets. Wide-leg design. ',
            'additional_info' => 'Front zip fly and button fastening. ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => '. MIDI DRESS WITH DRAPED DETAIL',
            'image' => 'public/product/5w.jpg',
            'price' => 40.00,
            'description' => 'Midi dress with a round neckline and short sleeves.  Invisible zip fastening.  ',
            'additional_info' => 'Draped fabric detail. ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);
        Product::create([
            'name' => 'PLEATED DRESS WITH BELT',
            'image' => 'public/product/6w.jpg',
            'price' => 39.00,
            'description' => 'Midi dress with a high neck and short sleeves. Tied belt in the same fabric.  ',
            'additional_info' => 'Pleated detail. ',
            'category_id' => 6,
            'subcategory_id' => 2
        ]);




        //sliders
        Slider::create([
            'image' => 'slider/slider (1).jpg',
        ]);
        Slider::create([
            'image' => 'slider/slider (2).jpg',
        ]);
        Slider::create([
            'image' => 'slider/slider (3).jpg',
        ]);
        Slider::create([
            'image' => 'slider/slider (4).jpg',
        ]);
        // Slider::create([
        //     'image' => 'slider/slider (5).jpg',
        // ]);



        // User 
        User::create([ // 1
            'name' => 'Super ADMIN',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0771496574',
            'user_role' => 'superadmin'
        ]);
        User::create([ // 2 
            'name' => 'H&M ADMIN1',
            'email' => 'h&madmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777899878',
            'user_role' => 'admin',
            'category_id' => '1'
        ]);
        User::create([ // 3
            'name' => 'H&M EMPLOYEE1',
            'email' => 'h&memployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '1'
        ]);
        User::create([ // 4
            'name' => 'PRADA ADMIN1',
            'email' => 'pradaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'admin',
            'category_id' => '2'
        ]);
        User::create([ // 5 
            'name' => 'PRADA EMPLOYEE1',
            'email' => 'pradaemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'employee',
            'category_id' => '2'
        ]);
        User::create([ // 6
            'name' => 'ZARA ADMIN1',
            'email' => 'zaraadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '3'
        ]);
        User::create([ // 7
            'name' => 'ZARA EMPLOYEE1',
            'email' => 'zaraemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '3'
        ]);


        User::create([ // 8
            'name' => 'MANGO ADMIN1',
            'email' => 'mangoadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '4'
        ]);
        User::create([ // 9
            'name' => 'MANGO EMPLOYEE1',
            'email' => 'mangoemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '4'
        ]);
        User::create([ // 10
            'name' => 'PRETTY LITTLE THING ADMIN1',
            'email' => 'prettylittlethingadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '5'
        ]);
        User::create([ // 11
            'name' => 'PRETTY LITTLE THING EMPLOYEE1',
            'email' => 'prettylittlethingemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '5'
        ]);
        User::create([ // 12
            'name' => 'DOLCE & GABBANA ADMIN1',
            'email' => 'dolce&gabbanaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '6'
        ]);
        User::create([ // 13 
            'name' => 'DOLCE & GABBANA EMPLOYEE1',
            'email' => 'dolce&gabbanaemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '6'
        ]);
        User::create([ // 14 
            'name' => 'CHRISTIAN DIOR ADMIN1',
            'email' => 'christiandioradmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'category_id' => '7'
        ]);
        User::create([ // 15
            'name' => 'CHRISTIAN DIOR EMPLOYEE1',
            'email' => 'christiandioremployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'category_id' => '7'
        ]);
        User::create([ // 16
            'name' => 'GUCCI ADMIN1',
            'email' => 'gucciadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777317598',
            'user_role' => 'admin',
            'category_id' => '8'
        ]);
        User::create([ // 17
            'name' => 'GUCCI EMPLOYEE1',
            'email' => 'gucciemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0796965741',
            'user_role' => 'employee',
            'category_id' => '8'
        ]);
        User::create([ // 18 
            'name' => 'DARAGHMEH ADMIN1',
            'email' => 'draghmehadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0787854998',
            'user_role' => 'admin',
            'category_id' => '9'
        ]);
        User::create([ // 19
            'name' => 'DARAGHMEH EMPLOYEE1',
            'email' => 'draghmehemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778951641',
            'user_role' => 'employee',
            'category_id' => '9'
        ]);
        User::create([ // 20
            'name' => 'CHOCOLATE ADMIN1',
            'email' => 'shechocolateadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0787789998',
            'user_role' => 'admin',
            'category_id' => '10'
        ]);
        User::create([ // 21
            'name' => 'CHOCOLATE EMPLOYEE1',
            'email' => 'shechocolateemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778735641',
            'user_role' => 'employee',
            'category_id' => '10'
        ]);
        User::create([ // 22 
            'name' => 'VICTORIA ADMIN1',
            'email' => 'victoriaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789684598',
            'user_role' => 'admin',
            'category_id' => '11'
        ]);
        User::create([ // 23
            'name' => 'VICTORIA EMPLOYEE1',
            'email' => 'victoriaemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778917541',
            'user_role' => 'employee',
            'category_id' => '11'
        ]);

        User::create([ // 24 
            'name' => 'customer1',
            'email' => 'customer1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([ // 25 
            'name' => 'customer2',
            'email' => 'customer2@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([ // 26
            'name' => 'customer3',
            'email' => 'customer3@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);



        //orders
        //order 1 for superadmin 
        Order::create([ //done
            'user_id' => 1,
            'total_quantity' => 5,
            'total_price' => 162.18
        ]);

        OrderItem::create([ //done
            'name' => 'TRAINERS',
            'image' => 'public/product/TRAINERS.jpg',
            'price' => 50.20,
            'quantity' => 1,
            'order_id' => 1,
            'category_id' => 4,
        ]);
        OrderItem::create([ //done
            'name' => 'POLKA DOT HEADBAND',
            'image' => 'public/product/POLKA DOT HEADBAND.jpg',
            'price' => 5.00,
            'quantity' => 2,
            'order_id' => 1,
            'category_id' => 5,
        ]);
        OrderItem::create([ //done
            'name' => 'Cut-out Bodycon Dress',
            'image' => 'public/product/Cut-out Bodycon Dress.jpg',
            'price' => 50.99,
            'quantity' => 2,
            'order_id' => 1,
            'category_id' => 3,
        ]);

        //order 2 for zara admin 
        Order::create([//done
            'user_id' => 6,
            'total_quantity' => 3,
            'total_price' => 1053.99
        ]);

        OrderItem::create([  //done
            'name' => 'JANE',
            'image' => 'public/product/JANE 999.99.jpg',
            'price' => 999.99,
            'quantity' => 1,
            'order_id' => 2,
            'category_id' => 11,
        ]);
        OrderItem::create([ //done
            'name' => 'NECKLACE WITH METAL LEAVES',
            'image' => 'public/product/1cc.jpg',
            'price' => 29.00,
            'quantity' => 1,
            'order_id' => 2,
            'category_id' => 6,
        ]);
        OrderItem::create([ //done
            'name' => 'TEXTURED T-SHIRT',
            'image' => 'public/product/6.jpg',
            'price' => 25.00,
            'quantity' => 1,
            'order_id' => 2,
            'category_id' => 7,
        ]);

        //order 3 for customer2
        Order::create([ //done
            'user_id' => 25,
            'total_quantity' => 5,
            'total_price' => 212.99
        ]);

        OrderItem::create([ //done
            'name' => 'Rhinestone-bow Rib-knit Cardigan',
            'image' => 'public/product/Rhinestone-bow Rib-knit Cardigan 29.00.jpg',
            'price' => 29.00,
            'quantity' => 2,
            'order_id' => 3,
            'category_id' => 10,
        ]);
        OrderItem::create([ //done
            'name' => 'Derby Shoes',
            'image' => 'public/product/Derby Shoes 34.99.jpg',
            'price' => 34.99,
            'quantity' => 1,
            'order_id' => 3,
            'category_id' => 9,
        ]);
        OrderItem::create([ //done
            'name' => 'Sneakers ',
            'image' => 'public/product/Sneakers 50.00.jpg',
            'price' => 50.00,
            'quantity' => 1,
            'order_id' => 3,
            'category_id' => 9,
        ]);
        OrderItem::create([ //done
            'name' => 'Rib-knit Merino Wool Dress',
            'image' => 'public/product/Rib-knit Merino Wool Dress.jpg',
            'price' => 70.66,
            'quantity' => 1,
            'order_id' => 3,
            'category_id' => 3,
        ]);

        //order 4 for customer 1
        Order::create([ //done
            'user_id' => 24,
            'total_quantity' => 4,
            'total_price' => 117.98
        ]);

        OrderItem::create([ 
            'name' => 'Rectangular leather shoulder bag',
            'image' => 'public/product/Rectangular leather shoulder bag.jpg',
            'price' => 23.00,
            'quantity' => 1,
            'order_id' => 4,
            'category_id' => 4,
        ]);
        OrderItem::create([ 
            'name' => 'Derby Shoes',
            'image' => 'public/product/Derby Shoes 34.99.jpg',
            'price' => 34.99,
            'quantity' => 2,
            'order_id' => 4,
            'category_id' => 9,
        ]);
        OrderItem::create([ 
            'name' => 'TEXTURED T-SHIRT',
            'image' => 'public/product/6.jpg',
            'price' => 25.00,
            'quantity' => 1,
            'order_id' => 4,
            'category_id' => 7,
        ]);
    }
}
