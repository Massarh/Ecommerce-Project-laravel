<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $currentUser=auth()->user();

        if($currentUser->user_role=='admin' || $currentUser->user_role=='employee'){
            $user = User::with('category')
            ->where('id', $currentUser->id)
            ->first();
            $category = $user->category;
            return view('admin.category.index', compact('category'));

        }elseif($currentUser->user_role=='superadmin'){
            $categories = Category::get();
            return view('admin.category.index', compact('categories'));
        }
    }

    // ----------------------------------------------------------------------------

    public function create()
    {
        $category = Category::all();
        
        return view('admin.category.create', compact('category'));
    }

    // ----------------------------------------------------------------------------

    public function store(Request $request)
    {
        if(auth()->user()->user_role=='admin'){
        $request->validate([
            'name'        => 'required|unique:categories',
            'description' => 'required',
            'image'       => 'required||mimes:png,jpg', // \/ 
            // mimes:png,jpg --> لازم يكون قيمتين/نوعين امتداد فقط غير هيك بصير ياخد اوا نوع امتداد كتبته
        ]);

        $image = $request->file('image')->store('public/files');
        $category = Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), // "Str" is class in laravel [contains a lot of function]
            // slug() is function in Str -> [public static function slug($title, $separator = '-', $language = 'en') { ... }]
            'description' => $request->description,
            'image'       => $image
        ]);
        // to update category_id in user
            User::where('id', auth()->user()->id)
            ->update(['category_id' => $category->id]);

            Toastr::success('Stroe created successfully', 'success');
            return redirect()->route('store.index');
        }
    }

    // ----------------------------------------------------------------------------

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    // ----------------------------------------------------------------------------

    public function update(Request $request, $id)
    { // both ways right
        //  way 1
        $category = Category::find($id); //first we find the category
        $image = $category->image; //then we go to the image of that cat id

        if ($request->file('image')) { //new or old imahe condition

            $image = $request->file('image')->store(
                'public/files'
            );

            Storage::delete($category->image);
        }
        //things to be updated 
        $category->name        =  $request->name;
        $category->description =  $request->description;
        $category->image       =  $image;
        $category->save();

        //Notification 
        Toastr::success('Store updated successfully', 'success');
        return redirect()->route('store.index');
    }

    // ----------------------------------------------------------------------------

    public function destroy($id)
    {
        $category = Category::find($id);
        $filename = $category->image;
        
        $category->delete();
        Storage::delete($filename); // Delete the image from a folder files [public\storage\files\...]
        Toastr::success('Store deleteed successfully', 'success');
        return redirect()->route('store.index');
    }


    // ----------------------------------------------------------------------------
    public function tests($request)
    {
        $request->validate([
            'name'        => 'required|unique:categories',
            'description' => 'required',
            'image'       => 'required|mimes:png, jpeg',
        ]);

        $image = $this->file('image')->store('public/files');
        return view('/test', compact('image'));
    }

    // ----------------------------------------------------------------------------

    public function categoriesWithUser ()
    {
        $categories = Category::get();
        return view('admin.user.index', compact('categories'));
    }

}
