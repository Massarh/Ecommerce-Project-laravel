<?php

namespace App\Http\Controllers;
// here
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Slider;

class FrontProductListController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('number_of_sold', 'desc')->limit(9)->get();
        $categories=Category::all();
        $sliders = Slider::limit(5)->get();

        return view('product', compact('products', 'categories','sliders'));
    }

    // ----------------------------------------------------------------------------

    public function show($id)
    {
        $product = Product::find($id);
        //تحت العنصر الي فاتحه id لعرض العناصر الي الهم نفس 
        $productFromSameSubcategoryAndTopSelling = Product::where('subcategory_id', $product->subcategory_id)
            ->where('id', '!=', $product->id)
            ->orderBy('number_of_sold', 'desc')
            ->limit(4)
            ->get();

        return view('show', compact('product', 'productFromSameSubcategoryAndTopSelling'));
    }

    // ----------------------------------------------------------------------------

    public function allproduct($slug, Request $request)
    {
        // subcategoryIds
        $filterSubCategories = [];
        $price = null;
        $minPrice = null;
        $maxPrice = null;
        $category = Category::where('slug', $slug)->first();
        $categoryId = $category->id;
        $search = $request->search;
        if ($request->subcategory) {  // filter products
            foreach ($request->subcategory as $key => $subcategoryId) {
                array_push($filterSubCategories, (int)$subcategoryId);
            }
        }
        if ($request->price) {
            // split string in ; for two strings in array.('0';'1000'=>['0','1000'])
            $price = explode(";", $request->price);
            $minPrice = (int)$price[0];
            $maxPrice = (int)$price[1];
            $price = [$minPrice, $maxPrice];
        }

        $subcategories = Category::find($categoryId)->subcategory;
        // this fun wil return all products that related to certain category if there is no query parameter
        $products = Product::where('category_id', $categoryId)
            ->when($price, function ($query, $price) {
                $query->whereBetween('price', $price);
            })->when($filterSubCategories, function ($query, $filterSubCategories) {
                $query->whereIn('subcategory_id', $filterSubCategories);
            })->when($search, function ($query, $search) {
                /*SELECT count(*) AS aggregate FROM `products` WHERE `name` LIKE % This IS % OR `description` LIKE % This IS %*/
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('additional_info', 'like', '%' . $search . '%');
                });
            })->paginate(16);

        $price = $request->price;
        //  return $products;
        return view('category', compact('products', 'subcategories',  'filterSubCategories', 'price', 'search', 'slug'));
    }

    // ----------------------------------------------------------------------------
    // to search product
    public function moreProducts(Request $request)
    {
        $price = null;
        $minPrice = null;
        $maxPrice = null;

        if ($request->price) {
            $price = explode(";", $request->price);
            $minPrice = (int)$price[0];
            $maxPrice = (int)$price[1];
            $price = [$minPrice, $maxPrice];
        }
        $search = $request->search;
        $categoryId = $request->category;
        $subcategoryId = $request->subcategory;

        // this fun wil return all products if there is no query parameter
        $products = Product::when($categoryId, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        })->when($price, function ($query, $price) {
            $query->whereBetween('price', $price);
        })->when($subcategoryId, function ($query, $subcategoryId) {
            $query->where('subcategory_id', $subcategoryId);
        })->when($search, function ($query, $search) {
            /*SELECT count(*) AS aggregate FROM `products` WHERE `name` LIKE % This IS % OR `description` LIKE % This IS %*/
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('additional_info', 'like', '%' . $search . '%');
            });
        })->paginate(16);
        $price = $request->price;
        return view('all-product', compact("products", "search", "price", "categoryId", "subcategoryId"));
    }
}
