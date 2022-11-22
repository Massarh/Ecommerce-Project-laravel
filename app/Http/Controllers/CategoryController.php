<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        if(auth()->user()->user_role=='admin'|| auth()->user()->user_role=='employee'){
            User::where('id', auth()->user()->id)
            ->update(['category_id' => $category->id]);
        }

        //return view('/test',compact('image')); // public/files/G82chwJKSfQo24cNu6rmwADCVQuiZPLg9GocgG8L.png
        notify()->success('Category created successfully');
        return redirect()->route('category.index');
    }

    // ----------------------------------------------------------------------------

    public function show($id)
    {
        //
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
        notify()->success('Category updated successfully');
        return redirect()->route('category.index');

        //  way 2
        // $category = Category::find($id);
        // $filename = $category->image; // 
        // if ($request->file('image')) //image is name input in file edit
        // { // to edit the image of folder files-in-public
        //     $image = $request->file('image')->store('public/files');
        //     Storage::delete($filename); //$category->image

        //     //to updated with image
        //     $category->name        =  $request->name;
        //     $category->description =  $request->description;
        //     $category->image       =  $image;
        //     $category->save();
        // } else {
        //     //to updated without image
        //     $category->name        =  $request->name;
        //     $category->description =  $request->description;
        //     $category->save();
        // }

        // notify()->success('Category updated successfully');
        // return redirect()->route('category.index');
    }

    // ----------------------------------------------------------------------------

    public function destroy($id)
    {
        $category = Category::find($id);
        $filename = $category->image;
        $category->delete();
        Storage::delete($filename); // Delete the image from a folder files [public\storage\files\...]
        notify()->success('Category deleteed successfully');
        return redirect()->route('category.index');
        // $category = Category::find($id);
        // $category->delete();
        // notify()->success('Category deleteed successfully');
        // return redirect()->route('category.index');
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
