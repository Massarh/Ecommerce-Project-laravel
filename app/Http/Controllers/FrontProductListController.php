<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;

class FrontProductListController extends Controller
{

    public function index() // NOT understanding (explain in 143 video)
    {
        $products = Product::latest()->limit(9)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
                //return $randomActiveProducts ; // output:: array-object
        $randomActiveProductIds = [];
        foreach ($randomActiveProducts as $product) {
            array_push($randomActiveProductIds, $product->id);
        }
                //return $randomActiveProductIds ; // output:: [1,3,2] كل ما اعمل ريفرش بتغير ترتيبهم
        $randomItemProducts = Product::where('id', '!=',$randomActiveProductIds)->limit(3)->get(); // output::[{obj},{obj}]
        // $randomItemProducts = Product::whereNotIn('id',$randomActiveProductIds)->limit(3)->get(); // output:: []
        // return $randomItemProducts;
        return view('product', compact('products', 'randomItemProducts' ,'randomActiveProducts'));
    }

    // ----------------------------------------------------------------------------

    public function show($id)
    {
        $product = Product::find($id);
        //تحت العنصر الي فاتحه id لعرض العناصر الي الهم نفس 
        $productFormSameCategories = Product::inRandomOrder()
        ->where('category_id', $product->category_id)
        ->whereBetween('price', [$product->price-50, $product->price+50]) // Massarh
        ->where('id', '!=',$product->id) 
        ->limit(3)
        ->get();

        return view('show', compact('product', 'productFormSameCategories'));
    }

    // ----------------------------------------------------------------------------

    public function allproduct($name, Request $request)
    {
        $category = Category::where('slug', $name)->first();
        $categoryId = $category->id;
        $filterSubCategories=null;

        if($request->subcategory) {  // filter products
            $products = $this->filterProducts($request);
            $filterSubCategories = $this->getSubcategoriesId($request);  
            // return $filterSubCategories; //output:: [1,2,3]
            
        } elseif ($request->min||$request->max) {
                $products = $this->filterByPrice($request);
        } else {

            $products = Product::where('category_id', $category->id)->get();
        }
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;

        return view('category', compact('products', 'subcategories', 'slug', 'filterSubCategories','categoryId'));

    }

    // ----------------------------------------------------------------------------

    public function filterProducts(Request $request) 
    {
        $subId = [];
        $subcategories = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach( $subcategories as $sub) {
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn('subcategory_id', $subId)->get();
        return $products;
    }
     // ----------------------------------------------------------------------------
    
    public function getSubcategoriesId(Request $request) 
    {
        $subId = [];

        $subcategories = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach( $subcategories as $sub) {
            array_push($subId, $sub->id);
        }
        return $subId;
    }

    // ----------------------------------------------------------------------------
    
    public function filterByPrice(Request $request) 
    {
        $categoryId = $request->categoryId;

        if($request->min && $request->max){
        $product = Product::whereBetween('price', [$request->min, $request->max])->where('category_id', $categoryId)->get();
        } elseif ($request->min) {
        $product= Product::where('price', '>', $request->min)->where('category_id', $categoryId)->get();
        } else { // $request->max
        $product = Product::where('price', '<', $request->max)->where('category_id', $categoryId)->get();
        }

        return $product;
    }

    // ----------------------------------------------------------------------------
// to search product
    public function moreProducts(Request $request)
    {
        if ($request->search) {
            $products = Product::where('name', 'like', '%'.$request->search.'%')
            ->orWhere('description', 'like', '%'.$request->search.'%')
            ->orWhere('additional_info', 'like', '%'.$request->search.'%')
            ->paginate(50); // SQL
            return view('all-product', compact("products"));
            /*SELECT count(*) AS aggregate FROM `products` WHERE `name` LIKE % This IS % OR `description` LIKE % This IS %*/
        }
        $products = Product::latest()->paginate(50);
        return view('all-product', compact("products"));
    }

}
