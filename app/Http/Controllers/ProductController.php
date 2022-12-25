<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{

    // for super admin
    public function getProductByCatAndSubId($categoryId, $subcategoryId)
    {
        $products = Product::where('category_id', $categoryId)
            ->where('subcategory_id', $subcategoryId)->get();
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
            'subcategory'        => 'required',
        ]);

        $image = $request->file('image')->store('public/product');
        Product::create([
            //'name-of-column in bd' => $request-> name-of-fild in form in create file
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
        Toastr::success('Product updated successfully', 'success');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------

    public function destroy($id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        Storage::delete($filename); // Delete the image from a folder product [public\storage\product\...]

        Toastr::success('Product deleted successfully', 'success');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------
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

    //////////////////////////////////////////////////////////////
    ///////////////  For Test   /////////////////////////////////
    ////////////////////////////////////////////////////////////
    public function test(Request $request)
    {

        // $mas=[
        //     [
        //     "name"=>"me2",
        //     "category_id"=>1,
        //     "created_at"=>now(),
        //     "updated_at"=>now()
        //     ],
        //   [
        //     "name"=>"me3",
        //     "category_id"=>1,
        //     "created_at"=>now(),
        //     "updated_at"=>now()
        //   ]
        //   ];

        //       return  Subcategory::insert($mas);

        // .......................................................................

        // test get eloquent queries
        // done
        //   $category = Category::first();
        //   return $category->subcategory;
        // --------------------------------------------------------------------------

        // $category = Category::find(3);
        //   return $category;

        // --------------------------------------------------------------------------

        // $category = Category::get();
        //    return $category;

        // --------------------------------------------------------------------------

        // $categories = DB::table('categories')
        // ->select('name','id')
        // ->get();

        // return $categories;

        // --------------------------------------------------------------------------

        // $category = Category::orderBy('id', 'desc')
        // ->select('name','id')
        // ->where('id','>',2)
        // ->get();
        // return $category;
        // ----------------------------------------------------------------------

        // $category = category::where('name', 'Zara')
        // ->Where('name', 'Nike')->get();
        //    return $category;


        // --------------------------------------------------------------------------

        // $category = Category::
        //     where('name', 'prada')
        //     ->orWhere('name', 'h&m')
        //     ->orWhere('id', '3')
        //     ->get();
        //     return $category;

        // --------------------------------------------------------------------------
        // select * from category where name = 'prada' and (id > 5 or name = 'CHRISTIAN DIOR')

        // $category = Category::
        //     where('name', 'PRADA')
        //     ->orWhere(function($query) {
        //         $query->where('id','>', '5')
        //             ->where('name', 'CHRISTIAN DIOR'); 
        //     })
        //     ->get();

        // return $category;
        // --------------------------------------------------------------------------
        // $category = Category::where('id', '<', 1)

        //     ->orWhere(function ($query) {
        //         $query->where('id', '>', '5')
        //             ->orWhere('name', 'CHRISTIAN DIOR');
        //     })
        //     ->get();

        // return $category;

        // --------------------------------------------------------------------------

        // $category = category::where('updated_at', Null)->get();

        // return $category;

        // --------------------------------------------------------------------------

        // $category = category::where(null)->get();

        // return $category;

        // ..............................................................................

        // $a = Category::find(3)->subcategory;
        // return $a;

        // .....................................................................

        // $a = Category::find(3)
        // ->subcategory()->orderBy('name','asc')->get();
        // return $a;

        // .......................................................................

        // $number=3;
        // $plaza=null;

        // $products = Product::when($number, function ($query, $number) {
        //                     $query->where('id',"<",$number);
        //                 })->when($plaza, function ($query, $plaza) {
        //                     $query->orderBy('id','desc');
        //                 })
        //             ->get();
        // return $products;


        // --------------------------------------------------------------------------
        // $price = Product::where('name', 'like', '%me%')->sum('price');
        // return $price;

        // --------------------------------------------------------------------------
        // [1, 3] -> 1, 2, 3 include
        // $category = Category::whereBetween('id', [1, 3])->get();
        // return $category;

        // --------------------------------------------------------------------------
        // [1, 3] -> 1, 2, 3 include
        // $category = Category::whereNotBetween('id', [1, 3])->get();
        // return $category;

        // --------------------------------------------------------------------------
        // [1, 3] -> Only 1 and 3

        // $category = Category::whereIn('id', [1,3])->get();
        // return $category;

        // .......................................................................

        // $category = Category::whereNotIn('id', [1, 2,3])->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::whereNull('updated_at')->get();
        // return $category;

        // .................................................................

        // $category = Category::whereNotNull('updated_at')->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::whereDate('created_at', '2022-12-21')->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::whereDay('created_at', '21')->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::whereMonth('created_at', '1')->get();
        // return $category;

        // --------------------------------------------------------------------------

        //it is an array because you can put multiple condtions
        // $category = Category::whereColumn([['updated_at', '!=', 'created_at']])->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::with('product')->first();
        // return $category;

        // --------------------------------------------------------------------------
        // $product = Product::where('category_id', 1)->find(2);

        // $product = Product::with('category')->find(2);
        //    return $product;

        // --------------------------------------------------------------------------

        // $category = Category::with('product')->find(1);
        // return $category;

        // ------------------------------------------------------------------------
        // start
        // $category = Category::with('subcategory')->first(); 
        // return $category;

        // $subcategory = Subcategory::with('category')->first(); 
        // return $subcategory;

        // ..............................................................................

        // $category = Subcategory::with('product')->get();
        // return $category;

        // .......................................................................
        // $product = Product::with('subcategory')->get(); 
        // return $product;

        // .......................................................................

        // $Subcategory = Subcategory::with('category')->where('id','>',5)->orderBy('id','desc')->get();
        // return $Subcategory;

        // .....................................................................
        // end

        // $category = Category::with('user', 'subcategory','product')->find(1);
        // return $category;

        // ------------------------------------------------------------------------
        // $category = Category::with(['product'  => function ($query) {
        //     $query->with('subcategory');
        // }])->find(1);

        // return $category;

        // --------------------------------------------------------------------------
        // //strange
        // $category = Category::with(['subcategory'  => function ($query) {

        //     $query->where('subcategory_id',2);
        // }])->find(1);
        // return $category;


        // --------------------------------------------------------------------------

        // $category = Category::withCount('product')->get();
        // return $category;

        // --------------------------------------------------------------------------

        //  fk لازم تحط ال 
        // $category = Category::with('product:id,name,category_id')->find(1);
        // return $category;

        // .......................................................................
        // $category = Category::with(['product'  => function ($query) {
        // $query->select('id','name','category_id');

        // }])->find(1);
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::with(['product'  => function ($query) {

        // $query->orderBy('id', 'desc');
        // }])->where('id','<',3)->get();
        // return $category;

        // --------------------------------------------------------------------------
        // $category = Category::has('orderItem')->get();

        // return $category;
        // ايش الكاتيقوري الي الهم اوردر ايتم
        // -------------------------------------------------------------------------

        // ------------------------------------------------------------------------

        // $category = Category::whereHas('subcategory', function (Builder $query) {
        //     $query->where('name', 'men');
        // })->get();
        // return $category;

        // -----------------------بفرق-------------------------------------//

        // $category = Category::with(['subcategory' => function ($query) {
        //     $query->where('name', 'men');
        //     }])->get();
        //     return $category;

        // ------------------------------------------------------------------------

        // $category = Category::whereDoesntHave('subcategory', function (Builder  $query) {
        //     $query->where('name', 'men');
        // })->get();
        // return $category;


        // ------------------------------------------------------------------------
        // gorgeous
        // $category = Category::whereHas('subcategory.product', function (Builder $query) {
        // $query->where('name', 'Zara Men Product1');
        // })->get();

        // return $category;

        // ........................................................
        // whereDate / whereMonth / whereDay / whereYear / whereTime
    }
}
