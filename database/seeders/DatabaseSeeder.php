<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Store;
use App\Models\StoreCategory;
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

        // Store

        Store::create([
            'name' => 'ZARA men and kids', //3
            'slug' => 'ZARA',
            'description' => 'Zara is a Spanish multi-national retail clothing chain. It specialises in fast fashion, and sells clothing, accessories, shoes, beauty products and perfumes. The head office is in Arteixo, in A Coruña in Galicia.It is the largest constituent company of the Inditex group. ',
            'image' => 'public/files/zara.png'
        ]);
        Store::create([
            'name' => 'MANGO women', //2
            'slug' => 'MANGO',
            'description' => 'Mango was founded in 1984 by brothers Isak Andic and Nahman Andic, the brand opened its first store in Barcelonas Paseo de Gracia. The name Mango was chosen because it sounds the same in the majority of languages around the world.',
            'image' => 'public/files/mango.png'
        ]);
        Store::create([
            'name' => 'prada men', //2
            'slug' => 'PRADA',
            'description' => 'Mango was founded in 1984 by brothers Isak Andic and Nahman Andic, the brand opened its first store in Barcelonas Paseo de Gracia. The name Mango was chosen because it sounds the same in the majority of languages around the world.',
            'image' => 'public/files/prada.png'
        ]);

        // Category
        Category::create([ //2
            'name' => 'zara and prada and men SHOES',
            'slug' => 'SHOES',
        ]);
        Category::create([ //3
            'name' => 'zara and men HATS',
            'slug' => 'HATS',
        ]);
        Category::create([ //4
            'name' => 'mango and women  WEDDING DRESSES',
            'slug' => 'WEDDING DRESSES',
        ]);
        Category::create([ //6
            'name' => 'mango and women MAKEUP',
            'slug' => 'MAKEUP',
        ]);
        Category::create([ //6
            'name' => 'zara and kids small',
            'slug' => 'small',
        ]);

        Category::create([ //1
            'name' => 'prada and men jeans',
            'slug' => 'prada jeans',
        ]);
        //   Category::create([ //5
        //         'name' => 'PLUS SIZE',
        //         'slug' => 'PLUS SIZE',
        //     ]);

        // StoreCategory

        StoreCategory::create([
            'store_id' => 1,
            'category_id' => 1,
        ]);
        StoreCategory::create([
            'store_id' => 1,
            'category_id' => 2,
        ]);
        StoreCategory::create([
            'store_id' => 1,
            'category_id' => 5,
        ]);
        StoreCategory::create([
            'store_id' => 2,
            'category_id' => 3,
        ]);
        StoreCategory::create([
            'store_id' => 2,
            'category_id' => 4,
        ]);
        StoreCategory::create([
            'store_id' => 3,
            'category_id' => 1,
        ]);
        StoreCategory::create([
            'store_id' => 3,
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'women mango WEDDING DRESSES',
            'image' => 'public/product/Cut-out Bodycon Dress.jpg',
            'price' => 50.99,
            'description' => ' Fitted, calf-length dress in a soft rib knit made from a LivaEco™ viscose blend. Round neckline,',
            'additional_info' => ' cut-out sections at top, and long raglan sleeves with flared cuffs.',
            'number_of_sold' => 2,
            'store_id' => 2,
            'category_id' => 3,
            'section' => 'women'

        ]);
        Product::create([
            'name' => 'women mango WEDDING DRESSES',
            'image' => 'public/product/Rib-knit Merino Wool Dress.jpg',
            'price' => 70.66,
            'description' => 'Fitted, calf-length dress in soft, rib-knit merino wool. Mock turtleneck, dropped shoulders, ',
            'additional_info' => 'long sleeves with gently flared cuffs. Gently flared skirt with a straight hem.',
            'number_of_sold' => 1,
            'store_id' => 2,
            'category_id' => 3,
            'section' => 'women'

        ]);
        Product::create([
            'name' => 'women mango MAKEUP',
            'image' => 'public/product/RIBBED HOODIE .jpg',
            'price' => 25.66,
            'description' => 'Hoodie made of a cotton blend fabric',
            'additional_info' => 'Long sleeves. Ribbed trims',
            'store_id' => 2,
            'category_id' => 4,
            'section' => 'women'

        ]);
        Product::create([
            'name' => 'women mango MAKEUP',
            'image' => 'public/product/Short Cardigan.jpg',
            'price' => 34.99,
            'description' => 'Short, relaxed-fit cardigan in a soft rib knit with wool content.',
            'additional_info' => 'Round neckline, buttons at front, and mock welt chest pockets. Gently dropped shoulders and long sleeves with close-fitting cuffs FitRelaxed fit',
            'store_id' => 2,
            'category_id' => 4,
            'section' => 'women'

        ]);
        Product::create([
            'name' => 'men zara SHOES',
            'image' => 'public/product/AFFLE-KNIT PYJAMAS  Pyjamas with a round neckline and long cuffed sleeves. Front fastening with injected zip. All-over print..jpg',
            'price' => 12.23,
            'description' => 'Pyjamas with a round neckline and long cuffed sleeves',
            'additional_info' => 'Front fastening with injected zip. All-over print',
            'store_id' => 1,
            'category_id' => 1,
            'section' => 'men'

        ]);
        Product::create([
            'name' => 'men zara SHOES',
            'image' => 'public/product/DINOSAUR SET .jpg',
            'price' => 12.23,
            'description' => 'Two-piece set Round neck sweatshirt with long sleeves.',
            'additional_info' => 'Trousers with an elastic waistband and cuffed hems',
            'store_id' => 1,
            'category_id' => 1,
            'section' => 'men'

        ]);
        Product::create([
            'name' => 'men zara HATS',
            'image' => 'public/product/KNIT TURTLENECK SWEATER.jpg',
            'price' => 16.23,
            'description' => 'Knit sweater with a turtleneck',
            'additional_info' => 'long sleeves',
            'store_id' => 1,
            'category_id' => 2,
            'section' => 'men'

        ]);
        Product::create([
            'name' => 'men zara HATS',
            'image' => 'public/product/PLUSH TROUSERS .jpg',
            'price' => 10.23,
            'description' => ' Plush trousers featuring an elastic waistband and front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg. Seam details. Cuffed hems. LABEL AND SEAM DETAILS Plush trousers featuring an elastic waistband ',
            'additional_info' => ', front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg Seam details Cuffed hems',
            'store_id' => 1,
            'category_id' => 2,
            'section' => 'men'

        ]);
        Product::create([
            'name' => 'kids zara small',
            'image' => 'public/product/PLUSH TROUSERS .jpg',
            'price' => 10.23,
            'description' => ' Plush trousers featuring an elastic waistband and front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg. Seam details. Cuffed hems. LABEL AND SEAM DETAILS Plush trousers featuring an elastic waistband ',
            'additional_info' => ', front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg Seam details Cuffed hems',
            'store_id' => 1,
            'category_id' => 5,
            'section' => 'kids'

        ]);
        Product::create([
            'name' => 'kids zara small',
            'image' => 'public/product/PLUSH TROUSERS .jpg',
            'price' => 10.23,
            'description' => ' Plush trousers featuring an elastic waistband and front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg. Seam details. Cuffed hems. LABEL AND SEAM DETAILS Plush trousers featuring an elastic waistband ',
            'additional_info' => ', front adjustable drawstrings. Front pockets. Contrast label appliqué on the leg Seam details Cuffed hems',
            'store_id' => 1,
            'category_id' => 5,
            'section' => 'kids'

        ]);

        Product::create([
            'name' => 'men prada jeans',
            'image' => 'public/product/HALF-ZIP FLEECE SWEATSHIRT .jpg',
            'price' => 15.25,
            'description' => 'High neck sweatshirt with front zip fastening . ',
            'additional_info' => 'Long sleeves, Side pockets, Ribbed trims',
            'store_id' => 3,
            'category_id' => 6,
            'section' => 'men'
        ]);

        Product::create([
            'name' => 'men prada SHOES',
            'image' => 'public/product/LIGHTWEIGHT PUFFER GILET .jpg',
            'price' => 20.99,
            'description' => 'Gilet with a high neck',
            'additional_info' => 'Hip welt pockets and a zip-up front',
            'store_id' => 3,
            'category_id' => 1,
            'section' => 'men'
        ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/POLO SWEATSHIRT .jpg',
        //     'price' => 16.66,
        //     'description' => 'Sweatshirt featuring a polo collar with front vent.',
        //     'additional_info' => ' Long sleeves. Ribbed trims',
        //     'store_id' => 1,
        //     'category_id' => 3,
        //     'section'=>'men'

        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/PREMIUM SLIM FIT JEANS  Slim fit jeans.jpg',
        //     'price' => 20.99,
        //     'description' => 'Five pockets. Faded effect. Front zip fly and button fastening',
        //     'additional_info' => 'Slim fit jeans',
        //     'store_id' => 1,
        //     'category_id' => 6,
        //     'section'=>'men'

        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/WOOL BLEND BLAZER .jpg',
        //     'price' => 39.99,
        //     'description' => 'Slim fit blazer made of a wool blend. Notched lapel collar and long sleeves with buttoned cuffs',
        //     'additional_info' => 'Hip patch pockets. Back vents at the hem Buttoned front',
        //     'store_id' => 1,
        //     'category_id' => 1,
        //     'section'=>'men'

        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/ZIPPED POLO SHIRT .jpg',
        //     'price' => 15.70,
        //     'description' => 'SHIRT WITH POCKET High neck polo shirt with a zip-up front Long sleeves with buttoned cuffs',
        //     'additional_info' => 'Patch pocket on chest',
        //     'store_id' => 1,
        //     'category_id' => 2,
        //     'section'=>'men'

        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/DOUBLE-BREASTED PIQUÉ BLAZER.jpg',
        //     'price' => 39.20,
        //     'description' => ' Double-breasted fastening at the front with raised golden buttons.',
        //     'additional_info' => 'Back vent',
        //     'store_id' => 1,
        //     'category_id' => 3,
        //     'section'=>'men'

        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/HALTER NECK .jpg',
        //     'price' => 29.10,
        //     'description' => ' Sleeveless fitted dress',
        //     'additional_info' => 'high neck',
        //     'store_id' => 1,
        //     'category_id' => 6,
        //     'section'=>'men'

        // ]);

        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/STRIPED KNIT SWEATER  .jpg',
        //     'price' => 10.23,
        //     'description' => 'Knit sweater with a round neck ',
        //     'additional_info' => 'long sleeves',
        //     'store_id' => 1,
        //     'category_id' => 1,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/WIND-PROOF AND WATER-REPELLENT SKI PUFFER JACKET .jpg',
        //     'price' => 25.20,
        //     'description' => 'Zip-up front hidden by a snap-button placket. Patch pockets with flaps on the front,',
        //     'additional_info' => ' inside pocket with grommet slit for headphone cables and contrast mesh',
        //     'store_id' => 1,
        //     'category_id' => 2,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/BALLET FLATS WITH FEATHERS .jpg',
        //     'price' => 15.99,
        //     'description' => 'Monochrome ballet flats for evening wear with feather detail on the front. ',
        //     'additional_info' => ' Strap across the instep with a rhinestone buckle.',
        //     'store_id' => 1,
        //     'category_id' => 3,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/CHUNKY-SOLE RUNNING TRAINERS  .jpg',
        //     'price' => 23.77,
        //     'description' => 'Lace-up running trainers in a combination of materials. ',
        //     'additional_info' => 'Chunky and raised track soles. Back pull tab.',
        //     'store_id' => 1,
        //     'category_id' => 6,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/CONTRAST HIGH-TOP .jpg',
        //     'price' => 15.77,
        //     'description' => 'TRAINERS High-top sneakers with contrast pieces in different colours.',
        //     'additional_info' => ' Side zip and adjustable lace-up fastening. Pull tab at the back for slipping on with ease.',
        //     'store_id' => 1,
        //     'category_id' => 1,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/FABRIC BLOCK HEEL ANKLE BOOTS .jpg',
        //     'price' => 50.99,
        //     'description' => 'Ankle boots in stretch fabric. Geometric block heel',
        //     'additional_info' => 'Fitted upper. Square toe',
        //     'store_id' => 1,
        //     'category_id' => 2,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/LACE-UP LEATHER BOOTS.jpg',
        //     'price' => 50.99,
        //     'description' => 'Lace-up boots. Leather upper Eight-eyelet facing. Buckled strap on the heel.',
        //     'additional_info' => 'Fitted upper. Square toe',
        //     'store_id' => 1,
        //     'category_id' => 3,
        //     'section'=>'kids'

        // ]);
        // Product::create([
        //     'name' => 'kids',
        //     'image' => 'public/product/REINDEER HOUSE SLIPPERS .jpg',
        //     'price' => 13.99,
        //     'description' => ' Faux fur slippers with a reindeer design.',
        //     'additional_info' => ' Adjustable hook-and-loop strap fastening at the back.',
        //     'store_id' => 1,
        //     'category_id' => 6,
        //     'section'=>'kids'

        // ]);

        // //mango products 
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/FAUX-FUR SHOULDER BAG .jpg',
        //     'price' => 15.00,
        //     'description' => 'Half-moon faux fur shoulder bag.',
        //     'additional_info' => ' Zip closure',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'men'
        // ]);
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/LEATHER CARD HOLDER.jpg',
        //     'price' => 20.00,
        //     'description' => 'Leather card holder',
        //     'additional_info' => ' Interior divided into several compartments. Detachable metal chain crossbody strap. Metal clasp.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'men'
        // ]);
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/LEATHER CUT OUT TOTE BAG .jpg',
        //     'price' => 19.00,
        //     'description' => ' LEATHER TOTE BAG WITH CUTOUT EXTERIOR.',
        //     'additional_info' => 'TOP HANDLE. ADJUSTABLE AND REMOVABLE CROSSBODY STRAP. MAGNETIC CLOSURE.',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'men'

        // ]);
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/Rectangular leather shoulder bag.jpg',
        //     'price' => 23.00,
        //     'description' => ' Decorative seams',
        //     'additional_info' => 'Tubular shoulder straps and detachable crossbody strap.',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'men'
        // ]);
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/Mini city bag.jpg',
        //     'price' => 40.00,
        //     'description' => ' Rigid handle. Detachable shoulder strap. Lined interior with pocket. Magnetic closure.',
        //     'additional_info' => 'Animal print exterior.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'men'
        // ]);
        // Product::create([
        //     'name' => 'men',
        //     'image' => 'public/product/MINI FLORAL HANDBAG .jpg',
        //     'price' => 15.00,
        //     'description' => ' Handle with decorative flowers and a detachable and adjustable crossbody strap. Magnetic clasp closure on the flap.',
        //     'additional_info' => ' Mini square handbag.',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'men'
        // ]);
        // Product::create([
        //     'name' => 'MEN',
        //     'image' => 'public/product/Teddy Mini Bag .jpg',
        //     'price' => 12.00,
        //     'description' => 'Boxy bag in soft, plush teddy fabric with a zipper at top. ',
        //     'additional_info' => 'Lined. Height 3 1/2 in. Width 6 in. Depth 3 1/2 in',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'men'
        // ]);

        //'category_id' => 6

        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/EMBELLISHED VINYL .jpg',
        //     'price' => 20.00,
        //     'description' => ' SHOES High-heel slingback shoes.  ',
        //     'additional_info' => 'HIGH-HEELVinyl upper. Embellished rhinestone details on the front.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'women'

        // ]);
        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/FABRIC OVER THE KNEE BOOTS.jpg',
        //     'price' => 49.99,
        //     'description' => 'Sock-style ankle boots in a combination of materials.',
        //     'additional_info' => 'Track sole. Back pull tab detail..',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'women'
        // ]);
        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/FLAT CRISS-CROSS .jpg',
        //     'price' => 30.10,
        //     'description' => 'LEATHER SLIDER SANDALS',
        //     'additional_info' => '',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'women'
        // ]);
        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/LACE UP FABRIC SLIDER SANDALS.jpg',
        //     'price' => 35.10,
        //     'description' => 'Flat slider sandals in elastic fabric with thin criss cross straps.',
        //     'additional_info' => 'Chunky sole. Tied closure around the ankle.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'women'
        // ]);
        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/STRAPPY PLATFORM METALLIC SANDALS.jpg',
        //     'price' => 50.20,
        //     'description' => ' High-heel sandals.',
        //     'additional_info' => 'Metallic-effect finish. Thin straps on the front. Geometric high heel with platform. Buckled ankle strap fastening.',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'women'
        // ]);
        // Product::create([
        //     'name' => 'WOMEN',
        //     'image' => 'public/product/TRAINERS.jpg',
        //     'price' => 50.20,
        //     'description' => 'Lace-up trainers.',
        //     'additional_info' => 'Chunky track soles.',
        //     'number_of_sold' => 1,
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'women'
        // ]);

        //'category_id' => 5

        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Corduroy Overall Dress 34.99.jpg',
        //     'price' => 34.99,
        //     'description' => 'Short, loose-fit overall dress in cotton corduroy. Adjustable suspenders with metal fasteners.',
        //     'additional_info' => 'Chest pocket, front pockets, and back pockets. Buttons at sides and a mock fly. Unlined.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'kids'
        // ]);
        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Quilted Outdoor Joggers 74.00.jpg',
        //     'price' => 74.00,
        //     'description' => 'Regular-fit, lightly padded, quilted joggers in windproof, water-repellent functional fabric designed for light showers and protection from wind.',
        //     'additional_info' => 'Covered elastic at waistband, zip fly, and a woven belt with magnetic fastener. Diagonal side pockets and a coin pocket at one side with zipper for safer storage. Lined.',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'kids'
        // ]);
        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Quilted Outdoor Top .jpg',
        //     'price' => 64.99,
        //     'description' => 'Lightly padded top in quilted, windproof, water-repellent functional fabric designed for light showers and protection from wind. Round neckline, dropped shoulders, and long sleeves with a narrow elastic at cuffs..',
        //     'additional_info' => 'Diagonal side pockets with concealed zipper. Drawstring at hem. Lined.',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'kids'
        // ]);
        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Sports Anorak 64.99.jpg',
        //     'price' => 64.99,
        //     'description' => 'Regular-fit sports anorak in soft, warm teddy fleece with sections in quilted, woven fabric. Lined hood with drawstring and cord stoppers at front. ',
        //     'additional_info' => ' Half-zip, heavily dropped shoulders, and long sleeves. Large front pocket with flap and concealed zipper, side pockets with zipper, and ribbing at cuffs and hem.',
        //     'store_id' => 2,
        //     'category_id' => 5,
        //     'section' => 'kids'
        // ]);
        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Square-necked Dress 90.00.jpg',
        //     'price' => 90.00,
        //     'description' => 'fitted dress in woven fabric. Square neckline, concealed zipper at back, narrow, covered elastic over shoulders, and long sleeves',
        //     'additional_info' => 'Straight-cut hem. Satin lining.',
        //     'store_id' => 2,
        //     'category_id' => 6,
        //     'section' => 'kids'
        // ]);
        // Product::create([
        //     'name' => 'KIDS',
        //     'image' => 'public/product/Teddy Sports Joggers 49.99.jpg',
        //     'price' => 49.99,
        //     'description' => 'Regular-fit sports joggers in soft teddy fabric with quilted sections. Smocked, elasticized waistband with a concealed, elasticized drawstring and cord stopper',
        //     'additional_info' => 'Side pockets with zipper and tapered legs with covered elastic at hems.',
        //     'store_id' => 2,
        //     'category_id' => 4,
        //     'section' => 'kids'
        // ]);
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
        User::create([
            'name' => 'Super ADMIN',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0771496574',
            'user_role' => 'superadmin'
        ]);
        User::create([ // 6
            'name' => 'ZARA ADMIN1',
            'email' => 'zaraadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'store_id' => '1'
        ]);
        User::create([ // 7
            'name' => 'ZARA EMPLOYEE1',
            'email' => 'zaraemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'store_id' => '1'
        ]);
        User::create([ // 8
            'name' => 'MANGO ADMIN1',
            'email' => 'mangoadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'store_id' => '2'
        ]);
        User::create([ // 9
            'name' => 'MANGO EMPLOYEE1',
            'email' => 'mangoemployee1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0778965741',
            'user_role' => 'employee',
            'store_id' => '2'
        ]);

        User::create([ // 8
            'name' => 'prada admin',
            'email' => 'pradaadmin1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'admin',
            'store_id' => '3'
        ]);
        User::create([ // 8
            'name' => 'prada employee',
            'email' => 'pradaaemployee@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0789317598',
            'user_role' => 'employee',
            'store_id' => '3'
        ]);

        User::create([
            'name' => 'customer1',
            'email' => 'customer1@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([
            'name' => 'customer2',
            'email' => 'customer2@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
        User::create([
            'name' => 'customer3',
            'email' => 'customer3@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => NOW(),
            'address' => 'JORDAN',
            'phone_number' => '0777777777',
            'user_role' => 'customer'
        ]);
    }
}
