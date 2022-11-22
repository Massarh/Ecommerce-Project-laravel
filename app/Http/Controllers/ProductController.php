<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Subcategory;


class ProductController extends Controller
{

   // for super admin
    public function getProductBySubId($subcategoryId)
    {
        $products = Product::where('subcategory_id',$subcategoryId)->get();
        return view('admin.product.index', compact('products'));
    }

    // ----------------------------------------------------------------------------

    // for admin
    public function index()
    {
        $products = Product::where('category_id', auth()->user()->category_id)->get();
        return view('admin.product.index', compact('products'));
    }

    // ----------------------------------------------------------------------------

    public function create()
    {
        return view('admin.product.create');
    }

    // ----------------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'description'     => 'required|min:3',
            'image'           => 'required|mimes:png,jpg',
            'price'           => 'required|numeric',
            'additional_info' => 'required',
            'category'        => 'required',
        ]);

        $image = $request->file('image')->store('public/product');
        Product::create([
            //'name-of-column in bd' => $request-> name-of-fild in form in create file
            'name'            => $request->name,
            'description'     => $request->description,
            'image'           => $image,
            'price'           => $request->price,
            'additional_info' => $request->additional_info,
            'category_id'     => $request->category,
            'subcategory_id'  => $request->subcategory
        ]);
        notify()->success('Product created successfully');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------

    public function show($id)
    {
        //
    }

    // ----------------------------------------------------------------------------

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    // ----------------------------------------------------------------------------

    public function update(Request $request, $id)
    {
        $product = Product::find($id); //first we find the category
        // $image = $product->image; //then we go to the image of that cat id

        if ($request->file('image')) { //new or old imahe condition

            $image = $request->file('image')->store('public/product');
            Storage::delete($product->image);
        }
        //to updated 
        $product->name          =  $request->name;
        $product->description   =  $request->description;
        $product->image         =  $image;
        $product->price         = $request->price;
        $product->additional_info  = $request->additional_info;
        $product->category_id      = $request->category;
        $product->subcategory_id   = $request->subcategory;
        $product->save();

        //Notification 
        notify()->success('Product updated successfully');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------

    public function destroy($id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        Storage::delete($filename); // Delete the image from a folder product [public\storage\product\...]
        notify()->success('Product deleteed successfully');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------
    // To associate a category-field and a subcategory
    public function loadSubCategories(Request $request, $id)
    {
        $subcategory = Subcategory::where('category_id', $id)->pluck('name', 'id');
        return response()->json($subcategory); // {"1":"lenove","3":"dell","4":"mac"}
    }
}
