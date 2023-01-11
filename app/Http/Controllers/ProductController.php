<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    // Superadmin, Admin, Employee [superadmin -> when click on button in store ]
    public function getProductByStoreAndCategorySlug($storeSlug, $categorySlug)
    {
        $store = Store::where('slug', $storeSlug)->first();
       
        if (auth()->user()->user_role == 'admin'||auth()->user()->user_role == 'employee') {
            // CATEGORY URL AUTHORIZATION
            if (!(auth()->user()->store->slug == $storeSlug) ) {
                abort(403);
            }
            //END CATEGORY URL AUTHORIZATION

            //SUBCATEGORY URL AUTHORIZATION
            // his refer to the one who send the request
            $hisCategories = auth()->user()->store->categories;
            $hisCategorySlugs =[];
            foreach ($hisCategories as $key => $category) {
                array_push($hisCategorySlugs, $category->slug);
            }
        
         $isLegal= in_array($categorySlug , $hisCategorySlugs) ; 
            if (!$isLegal ) {
                abort(404);
            }
            //END SUBCATEGORY URL AUTHORIZATION
            }elseif (auth()->user()->user_role == 'superadmin') {
            // CATEGORY URL AUTHORIZATION
            if(!$store) {
                abort(404);
            }
            //END CATEGORY URL AUTHORIZATION
           
            //SUBCATEGORY URL AUTHORIZATION
            // check that subcategory Slug is inside the store that his slug is sent too.
            $storeCategories= $store->categories;
            $storeCategorySlugs =[];
            foreach ($storeCategories as $key => $category) {
                array_push($storeCategorySlugs, $category->slug);
            }
            $isLegal=in_array($categorySlug , $storeCategorySlugs);

            if (!$isLegal ) {
            abort(404);
            }
            //END SUBCATEGORY URL AUTHORIZATION
        }else{
        // if the user is not superadmin or admin or customer 
        abort(403);
        }
        $category = Category::where('slug', $categorySlug)->first();
        $products = Product::where('store_id',$store->id )
        ->where('category_id', $category->id)->get();
        return view('admin.product.index', compact('products'));
    }
    
    // for superadmin only
    public function getProductByCategorySlug($categorySlug){
        if (auth()->user()->user_role == 'superadmin') {
            $category=Category::where('slug',$categorySlug)->first();
            // URL AUTHORIZATION
            if(!$category){
                abort(404);
            }
            //END  URL AUTHORIZATION
            $products=$category->products;
            return view('admin.product.index', compact('products'));
        }else{
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin, employee
    public function index()
    {
        if (auth()->user()->user_role == 'admin'||auth()->user()->user_role == 'employee') {
            $products = Product::where('store_id', auth()->user()->store_id)->get();
            return view('admin.product.index', compact('products'));
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function create()
    {
        if (auth()->user()->user_role == 'admin') {

            return view('admin.product.create');
        }
        abort(403);

    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function store(Request $request)
    {
        if(auth()->user()->user_role=='admin'){
            $request->validate([
                'name'            => 'required',
                'description'     => 'required|min:3',
                'image'           => 'required|mimes:png,jpg',
                'price'           => 'required|numeric',
                'additional_info' => 'required',
                'categoryId'     => 'required',
                'section'        => 'required',
            ]);

            $image = $request->file('image')->store('public/product');
            Product::create([
                'name'            => $request->name,
                'description'     => $request->description,
                'image'           => $image,
                'price'           => $request->price,
                'additional_info' => $request->additional_info,
                'store_id'     => auth()->user()->store_id,
                'category_id'  => $request->categoryId
            ]);

            Toastr::success('Product created successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function edit($productId)
    {
        if(auth()->user()->user_role=='admin'){
            // URL AUTHORIZATION
            $products = Product::where('store_id', auth()->user()->store_id)->get();
            $productIds = [];
            foreach ($products as $prod) {
                array_push($productIds, $prod->id);
            }
            $isLegal = in_array($productId , $productIds) ;
            if(!$isLegal) {
                abort(403);
            }
            //END URL AUTHORIZATION
            $sections=["men"=>"men","women"=>"women","kids"=>"kids"];
            $product = Product::find($productId);  
            unset($sections[$product->section]);
            $categories = Store::find(auth()->user()->store_id)->categories()->where('category_id', '!=',$product->category->id )->get(); 
            return view('admin.product.edit', compact('product','categories','sections'));
        }
        abort(403);

    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function update(Request $request, $productId)
    {
        if(auth()->user()->user_role=='admin'){  
            $request->validate([
                'name'            => 'required',
                'description'     => 'required|min:3',
                'price'           => 'required|numeric',
                'additional_info' => 'required',
                'categoryId'     => 'required',
                'section'        => 'required',
                
            ]);
            $product = Product::find($productId);

            if ($request->file('image')) { 
                Storage::delete($product->image);
                $image = $request->file('image')->store('public/product');
                $product->image =  $image;
            }
            //things to be updated 
            $product->name          =  $request->name;
            $product->description   =  $request->description;
            $product->price         = $request->price;
            $product->additional_info  = $request->additional_info;
            $product->category_id   = $request->categoryId;
            $product->section   = $request->section;

            $product->save();

            //Notification 
            Toastr::success('Product updated successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);  
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function destroy($productId)
    {
        if(auth()->user()->user_role=='admin')
        {
            $product = Product::find($productId);
            // Delete the image from a folder product [public\storage\product\...]
            Storage::delete($product->image); 
            $product->delete();
            Toastr::success('Product deleted successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);
    }
            


    // ----------------------------------------------------------------------------

   

}