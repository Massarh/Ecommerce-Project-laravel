<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;

class TestController extends Controller
{
  //////////////////////////////////////////////////////////////
  ///////////////  For Test   /////////////////////////////////
  ////////////////////////////////////////////////////////////
  public function test(Request $request)
  {

    // $mas=[
    //     [
    //     "name"=>"me2",
    //  
    //     "created_at"=>now(),
    //     "updated_at"=>now()
    //     ],
    //   [
    //     "name"=>"me3",
    //     
    //     "created_at"=>now(),
    //     "updated_at"=>now()
    //   ]
    //   ];

    //       return  Category::insert($mas);

    // .......................................................................

    // test get eloquent queries
    // done

    // $products=Store::first()->products()->where('section', 'men')->count();
    //   return $products;
    // --------------------------------------------------------------------------

    // $store = Store::find(3);
    //   return $store;

    // --------------------------------------------------------------------------

    // $store = Store::get();
    //    return $store;

    // --------------------------------------------------------------------------

    // $stores = DB::table('stores')
    // ->select('name','id')
    // ->get();

    // return $stores;

    // --------------------------------------------------------------------------

    // $Store = Store::orderBy('id', 'desc')
    // ->select('name','id')
    // ->where('id','>',2)
    // ->get();
    // return $Store;
    // ----------------------------------------------------------------------

    // $Store = Store::where('name', 'Zara')
    // ->Where('name', 'Nike')->get();
    //    return $Store;


    // --------------------------------------------------------------------------

    // $Store = Store::
    //     where('name', 'prada')
    //     ->orWhere('name', 'h&m')
    //     ->orWhere('id', '3')
    //     ->get();
    //     return $Store;

    // --------------------------------------------------------------------------
    // select * from Store where name = 'prada' and (id > 5 or name = 'CHRISTIAN DIOR')

    // $Store = Store::
    //     where('name', 'PRADA')
    //     ->orWhere(function($query) {
    //         $query->where('id','>', '5')
    //             ->where('name', 'CHRISTIAN DIOR'); 
    //     })
    //     ->get();

    // return $Store;
    // --------------------------------------------------------------------------
    // $Store = Store::where('id', '<', 1)

    //     ->orWhere(function ($query) {
    //         $query->where('id', '>', '5')
    //             ->orWhere('name', 'CHRISTIAN DIOR');
    //     })
    //     ->get();

    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::where('updated_at', Null)->get();

    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::where(null)->get();

    // return $Store;

    // ..............................................................................

    // $a = Store::find(3)->categories;
    // return $a;

    // .....................................................................

    // $a = Store::find(3)
    // ->categories()->orderBy('name','asc')->get();
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
    // $Store = Store::whereBetween('id', [1, 3])->get();
    // return $Store;

    // --------------------------------------------------------------------------
    // [1, 3] -> 1, 2, 3 include
    // $Store = Store::whereNotBetween('id', [1, 3])->get();
    // return $Store;

    // --------------------------------------------------------------------------
    // [1, 3] -> Only 1 and 3

    // $Store = Store::whereIn('id', [1,3])->get();
    // return $Store;

    // .......................................................................

    // $Store = Store::whereNotIn('id', [1, 2,3])->get();
    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::whereNull('updated_at')->get();
    // return $Store;

    // .................................................................

    // $Store = Store::whereNotNull('updated_at')->get();
    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::whereDate('created_at', '2022-12-21')->get();
    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::whereDay('created_at', '21')->get();
    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::whereMonth('created_at', '1')->get();
    // return $Store;

    // --------------------------------------------------------------------------

    //it is an array because you can put multiple condtions
    // $Store = Store::whereColumn([['updated_at', '!=', 'created_at']])->get();
    // return $Store;

    // --------------------------------------------------------------------------

    // $Store = Store::with('products')->first();
    // return $Store;

    // --------------------------------------------------------------------------
    // $product = Product::where('store_id', 1)->find(2);

    // $product = Product::with('store')->find(2);
    //    return $product;

    // --------------------------------------------------------------------------

    // $Store = Store::with('products')->find(1);
    // return $Store;

    // ------------------------------------------------------------------------
    // start
    // $Store = Store::with('categories')->first(); 
    // return $Store;

    // $category = Category::with('stores')->first(); 
    // return $category;

    // ..............................................................................

    // $categories = category::with('products')->get();
    // return $category;

    // .......................................................................
    // $product = Product::with('categories')->get(); 
    // return $product;

    // .......................................................................

    // $categories = Category::with('stores')->where('id','>',5)->orderBy('id','desc')->get();
    // return $categories;

    // .....................................................................
    // end

    // $store = Store::with('users', 'categories','products')->find(1);
    // return $store;

    // ------------------------------------------------------------------------
    // $category = Category::with(['products'  => function ($query) {
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
