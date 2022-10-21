<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

// ----------------------------------------------------------------------------

    public function create()
    {
        return view('admin.category.create');
    }

// ----------------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:categories',
            'description' => 'required',
            'image'       => 'required||mimes:png,jpg', // \/ 
            // اذا دخلت صوره امتدادها مو اول قيمه انا معطيته اياها ما برضا ياخذها ولا المشكلة من الصور نفسها
        ]);

        $image = $request->file('image')->store('public/files');
        Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), // "Str" is class in laravel [contains a lot of function]
            // slug() is function in Str -> [public static function slug($title, $separator = '-', $language = 'en') { ... }]
            'description' => $request->description,
            'image'       => $image
        ]);
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
    {
        $category = Category::find($id);
        $image = $category->image;
        // if($category->file('image')) //image is name input in file edit
        // { // to edit the image of folder files-in-public
        //     $image = $request->file('image')->store('public/files');
        //     Storage::delete($category->image);
        // }

        $category->name        =  $request->name;
        $category->description =  $request->description;
        $category->image       =  $image;
        $category->save(); 

        notify()->success('Category updated successfully');
        return redirect()->route('category.index');
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
}
