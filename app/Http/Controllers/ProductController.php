<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;

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
        notify()->success('Product created successfully');
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
        notify()->success('Product deleted successfully');
        return redirect()->route('product.index');
    }

    // ----------------------------------------------------------------------------
    // To associate a category-field and a subcategory
    public function loadSubCategories(Request $request, $id)
    {
        // {"1":"lenove","3":"dell","4":"mac"}
        $subcategories = Category::find('category_id')->subcategory()->pluck('name', 'id')->get();
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

        // $product = Product::where('name', "")->get();
        // return $product;
        $name=$request->input('name');
        dd($name) ;
        
        $products = Product::when($name, function ($query, $name) {
                            $query->where('name', $name);
                        })
                        ->get();
        return $products;
        // .......................................................................

        // test get eloquent queries


        // $category = Category::with('subcategory')->find(1);
        //  return $category;

        // .......................................................................


        // $Subcategory = Subcategory::with('category')->find(1);
        //  return $Subcategory;

        // .....................................................................


        // $subcategory = Category::find(1)->subcategory()->orderBy('name')->get();
        //  return $subcategory;

        // .......................................................................


        // $category = Category::first();
        //   return $category;
        // --------------------------------------------------------------------------

        // $category = Category::find(3);
        //   return $category;

        // --------------------------------------------------------------------------


        // $category = Category::get();
        //    return $category;

        // --------------------------------------------------------------------------


        // $category = Category::orderBy('id', 'desc')->get();
        //  return $category;
        // ----------------------------------------------------------------------

        // $category = category::where('name', 'Zara')
        // ->Where('name', 'Nike')->get();
        //    return $category;


        // --------------------------------------------------------------------------

        // $category = category::where('name', 'Zara')
        // ->orWhere('name', 'Nike')->get();
        //    return $category;

        // --------------------------------------------------------------------------

        // $category = category::where('updated_at', null)->get();

        // return $category;

        // --------------------------------------------------------------------------

        // $category = category::where(null)->get();

        // return $category;


        // ...............................................................................
        // $name = 'Zara';
        //    $status=$name==null?null:$name;
        //    return $status;
        // $category = category::$name!=null?where('name',$name):''->get();
        // return $category;

        // --------------------------------------------------------------------------
        // $price = Product::where('name', 'like', '%me%')->sum('price');
        //    return $price;

        // --------------------------------------------------------------------------
        // $category = Category::whereBetween('id', [1, 2])->get();
        // return $category;

        // --------------------------------------------------------------------------
        // $category = Category::whereNotBetween('id', [1, 2])->get();
        // return $category;

        // --------------------------------------------------------------------------

        // $category = Category::whereIn('id', [1, 3])->get();
        // return $category;

        // .......................................................................

        // $category = Category::whereNotIn('id', [1, 3])->get();
        // return $category;
        // --------------------------------------------------------------------------

        // $category = Category::whereNull('created_at')->get();
        // return $category;

        // .................................................................

        // $category = Category::whereNotNull('created_at')->get();
        //  return $category;
        // --------------------------------------------------------------------------

        // $category = Category::whereDate('created_at', '2022-11-24')->get();
        // return $category;
        // --------------------------------------------------------------------------
        //it is an array because you can put multiple condtions
        // $category = Category::whereColumn([['updated_at', '=', 'created_at']])->get();
        //  return $category;
        // --------------------------------------------------------------------------

        // $category = Category::with('product')->get();
        //  return $category;

        // --------------------------------------------------------------------------

        // $product = Product::with('category')->get();
        //    return $product;

        // --------------------------------------------------------------------------

        // $category = Category::with('product')->find(1);
        // return $category;

        // ------------------------------------------------------------------------

        // $category = Category::with('orderItem', 'subcategory')->get();
        // return $category;

        // ------------------------------------------------------------------------
        // $category = Category::with(['product'  => function ($query) {


        //      $query->with('subcategory');
        // }])->find(1);
        //    return $category;

        // --------------------------------------------------------------------------
        //strange
        // $category = Category::with(['subcategory'  => function ($query) {

        //     $query->where('subcategory_id',1);
        // }])->find(1);
        //    return $category;


        // --------------------------------------------------------------------------

        // $category = Category::withCount('product')->find(2);
        //   return $category;

        // --------------------------------------------------------------------------

        //   لازم تحط ال fk
        // $category = Category::with('product:id,name,category_id')->find(1);
        //  return $category;

        // --------------------------------------------------------------------------

        // $category = Category::with(['product'  => function ($query) {
        // $query->where('name', 'Zara Men Product1');
        // $query->orderBy('id', 'desc');
        // }])->find(1);
        //    return $category;

        // --------------------------------------------------------------------------
        // $category = Category::has('orderItem')->get();

        //    return $category;
        // -------------------------------------------------------------------------

        // ------------------------------------------------------------------------

        // $category = category::whereHas('subcategory', function (Builder $query) {
        // $query->where('name', 'like', '%zara%');
        // })->get();
        // return $category;

        // ------------------------------------------------------------------------

        // $category = category::whereDoesntHave('subcategory', function (Builder  $query) {
        // $query->where('name', 'like', '%zara%');
        // })->get();
        // return $category;


        // ------------------------------------------------------------------------
        // $category = Category::whereHas('subcategory.product', function (Builder $query) {
        // $query->where('name', 'Zara Men Product1');
        // })->get();

        // return $category;







        // ........................................................
        // whereDate / whereMonth / whereDay / whereYear / whereTime
    }
}
