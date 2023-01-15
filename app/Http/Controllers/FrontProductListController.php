<?php

namespace App\Http\Controllers;
// here
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;


class FrontProductListController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('number_of_sold', 'desc')->limit(12)->get();
        $stores=Store::has('products')->get();
        $sliders = Slider::limit(5)->get();

        return view('product', compact('products', 'stores','sliders'));
    }

    // ----------------------------------------------------------------------------

    public function show($productId)
    {
        $product = Product::find($productId);
        //تحت العنصر الي فاتحه id لعرض العناصر الي الهم نفس 
        $productFromSameCategoryAndTopSelling = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('number_of_sold', 'desc')
            ->limit(4)
            ->get();

        // return $productFromSameCategoryAndTopSelling;
        return view('show', compact('product', 'productFromSameCategoryAndTopSelling'));
    }

    // ----------------------------------------------------------------------------
    // to search product
    public function allProducts(Request $request,$storeSlug=null)
    {

        $price = null;
        $minPrice = null;
        $maxPrice = null;
        $store=null;
        $search = $request->search;
        $categoryId = $request->categoryId;
        $sections=[1=>"MEN",2=>"WOMEN",3=>"KIDS"];
        $sectionId = $request->sectionId;
        $section=null;
        if ($sectionId) {
            $section= $sections[$sectionId];
        }
        if($storeSlug){
            // from all products
            $store=Store::where("slug",$storeSlug)->first();
            $storeId = $store->id;
            // categories
            $categories = $store->categories()->get();
            // return $categories ;

            // end categories
            // sections
            $sections=[];
            $menProductsCount=$store->products()->where('section', 'MEN')->count();
            $menProductsCount ? $sections += [ 1 => "MEN" ] : "";
            
            $womenProductsCount=$store->products()->where('section', 'WOMEN')->count();
            $womenProductsCount ? $sections += [ 2 => "WOMEN" ]  : "";

            $kidsProductsCount=$store->products()->where('section', 'KIDS')->count();
            $kidsProductsCount ? $sections += [ 3 => "KIDS" ]  : "";
            // return $sections;    
            //end sections
        }else{
            $storeId = $request->storeId;
            $categories = Category::get();
        }
        if ($request->price) {
            $price = explode(";", $request->price);
            $minPrice = (int)$price[0];
            $maxPrice = (int)$price[1];
            $price = [$minPrice, $maxPrice];
        }
        
        // this fun wil return all products if there is no query parameter
        $products = Product::when($storeId, function ($query, $storeId) {
            $query->where('store_id', $storeId);
        })->when($section, function ($query, $section) {
            $query->where('section', $section);
        })->when($price, function ($query, $price) {
            $query->whereBetween('price', $price);
        })->when($categoryId, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        })->when($search, function ($query, $search) {
            /*SELECT count(*) AS aggregate FROM `products` WHERE `name` LIKE % This IS % OR `description` LIKE % This IS %*/
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('additional_info', 'like', '%' . $search . '%');
            });
        })->paginate(16)->withQueryString();

        $price = $request->price;
        if($storeSlug){
            
            return view('store', compact('products', 'store', 'categories','sections','search', 'price',  'storeId','storeSlug','categoryId','sectionId'));
        }else{
            $stores = Store::has('products')->get();
        return view('all-product', compact('products', 'stores', 'categories', 'search', 'price', 'storeId', 'categoryId','sectionId'));
        }
    }
     // for customer in all-product

    // when store input changes to any value accept select get section and categories relate to this 
    // store and if  store input changes to select get all sections and categories. 
    public function loadCategoriesAndSectionsDependOnStore (Request $request)
    {
        $storeId = $request->storeId;
        if ($storeId) {
            $store=Store::find($storeId);
            // categories
            $categories = $store->categories()->get()->pluck('name', 'id');
            // end categories
            // sections
            $sections=[];
            $menProductsCount=$store->products()->where('section', 'MEN')->count();
            $menProductsCount ? $sections += [ 1 => "MEN" ] : "";
            
            $womenProductsCount=$store->products()->where('section', 'WOMEN')->count();
            $womenProductsCount ? $sections += [ 2 => "WOMEN" ]  : "";

            $kidsProductsCount=$store->products()->where('section', 'KIDS')->count();
            $kidsProductsCount ? $sections += [ 3 => "KIDS" ]  : "";

            //end sections

        } else {
        //when user click on select in category dropdown menu
            // categories
            $categories = Category::get()->pluck('name', 'id');
            // end categories
            // sections
            $sections=[1=>"MEN",2=>"WOMEN",3=>"KIDS"];
            //end sections
        }
        
        $categoriesAndSections=[$categories,$sections];
        return response()->json($categoriesAndSections);
    }

    // when section input changes to any value accept select get categories that related to specific
    // section (i will preview it only if store input not selected else i will preview the intersection between it and store categories) and if section input changes to select and store is on select  i will git all sections on the project.
    public function loadCategoriesDependOnSection (Request $request)
    {
        $sections=[1=>"MEN",2=>"WOMEN",3=>"KIDS"];
        $sectionId = $request->sectionId;
        $storeId = $request->storeId;
        if($sectionId && $storeId){
            // edit
            $section= $sections[$sectionId];
            // section categories

            $categories = Category::whereHas('products', function (Builder $query) use($section,$storeId) {
                $query->where('section', $section);
                $query->where('store_id',$storeId);
            })->get()->pluck('name', 'id');
        }elseif ($sectionId && !$storeId) {

            $section= $sections[$sectionId];
            // section categories
            $categories = Category::whereHas('products', function (Builder $query) use($section) {
                $query->where('section', $section);
            })->get()->pluck('name', 'id');
        } elseif(!$sectionId && !$storeId) {
                //all categories
                $categories = Category::get()->pluck('name', 'id');
                return $categories;
        }  
        return response()->json($categories);
    }
}
