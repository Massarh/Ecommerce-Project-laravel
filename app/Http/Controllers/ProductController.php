<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    // Superadmin, Admin, Employee [superadmin -> when click on button in store ]
    public function getProductByCatAndSubId($categorySlug, $subcategorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        if (auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            // URL validate 
            $subcategories = auth()->user()->category->subcategory;
            $subcategorySlugs = [];
            foreach ($subcategories as $key => $subcategory) {
                array_push($subcategorySlugs, $subcategory->slug);
            }
            $isLegal = in_array($subcategorySlug, $subcategorySlugs) && auth()->user()->category->slug == $categorySlug;
            if (!$isLegal) {
                abort(403);
            }
        } elseif (auth()->user()->user_role == 'superadmin') {
            // URL validate
            if (!$category) {
                abort(404);
            }

            $subcategories = $category->subcategory;
            $subcategorySlugs = [];
            foreach ($subcategories as $key => $subcategory) {
                array_push($subcategorySlugs, $subcategory->slug);
            }
            $isLegal = in_array($subcategorySlug, $subcategorySlugs);

            if (!$isLegal) {
                abort(404);
            }
        } else {
            // if the user is not superadmin or admin or customer 
            abort(403);
        }

        $subcategory = Subcategory::where('slug', $subcategorySlug)->first();
        $products = Product::where('category_id', $category->id)
            ->where('subcategory_id', $subcategory->id)->get();
        return view('admin.product.index', compact('products'));
    }

    // ----------------------------------------------------------------------------

    // for admin, employee
    public function index()
    {
        if (auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            $products = Product::where('category_id', auth()->user()->category_id)->get();
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
        if (auth()->user()->user_role == 'admin') {
            $request->validate([
                'name'            => 'required',
                'description'     => 'required|min:3',
                'image'           => 'required|mimes:png,jpg',
                'price'           => 'required|numeric',
                'additional_info' => 'required',
                'subcategory'     => 'required',
            ]);

            $image = $request->file('image')->store('public/product');
            Product::create([
                'name'            => $request->name,
                'description'     => $request->description,
                'image'           => $image,
                'price'           => $request->price,
                'additional_info' => $request->additional_info,
                'category_id'     => auth()->user()->category_id,
                'subcategory_id'  => $request->subcategory
            ]);

            Toastr::success('Product created successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function edit($id)
    {
        if (auth()->user()->user_role == 'admin') {
            $products = Product::where('category_id', auth()->user()->category_id)->get();
            $productIds = [];
            foreach ($products as $prod) {
                array_push($productIds, $prod->id);
            }
            $isLegal = in_array($id, $productIds);
            if (!$isLegal) {
                abort(403);
            }

            $product = Product::find($id);
            return view('admin.product.edit', compact('product'));
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function update(Request $request, $id)
    {
        if (auth()->user()->user_role == 'admin') {
            $request->validate([
                'name'            => 'required',
                'description'     => 'required|min:3',
                'price'           => 'required|numeric',
                'additional_info' => 'required',
                'subcategory'     => 'required',
            ]);
            $product = Product::find($id);

            if ($request->file('image')) {
                $image = $request->file('image')->store('public/product');
                Storage::delete($product->image);
                $product->image =  $image;
            }

            //things to be updated 
            $product->name          =  $request->name;
            $product->description   =  $request->description;
            $product->price         = $request->price;
            $product->additional_info  = $request->additional_info;
            $product->subcategory_id   = $request->subcategory;
            $product->save();

            //Notification 
            Toastr::success('Product updated successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function destroy($id)
    {
        if (auth()->user()->user_role == 'admin') {
            $product = Product::find($id);
            $filename = $product->image;
            $product->delete();
            // Delete the image from a folder product [public\storage\product\...]
            Storage::delete($filename);

            Toastr::success('Product deleted successfully', 'success');
            return redirect()->route('product.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for customer in all-product

    // To associate a category-field and a subcategory
    public function loadSubCategories(Request $request)
    {

        $categoryId = $request->categoryId;
        if ($categoryId) {

            $subcategories = Category::find($categoryId)->subcategory()->get()->pluck('name', 'id');
        } else {

            //when user click on select in category dropdown menu
            $subcategories = Subcategory::get()->pluck('name', 'id');
        }

        return response()->json($subcategories);
    }
}
