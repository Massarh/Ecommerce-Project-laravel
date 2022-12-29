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
    // Superadmin , Admin , Employee
    public function index()
    {
        if (auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            $category = Category::find(auth()->user()->category_id);

            return view('admin.category.index', compact('category'));
        } elseif (auth()->user()->user_role == 'superadmin') {
            $categories = Category::get();
            return view('admin.category.index', compact('categories'));
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function create()
    {
        if (auth()->user()->user_role == 'admin') {
            $category = Category::all();
            return view('admin.category.create', compact('category'));
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function store(Request $request)
    {
        if (auth()->user()->user_role == 'admin') {
            $request->validate([
                'name'        => 'required|unique:categories',
                'description' => 'required',
                // mimes:png,jpg --> لازم يكون قيمتين/نوعين امتداد فقط غير هيك بصير ياخد اوا نوع امتداد كتبته
                'image'       => 'required||mimes:png,jpg',
            ]);

            $image = $request->file('image')->store('public/files');
            $category = Category::create([
                'name'        => $request->name,
                // "Str" is class in laravel [contains a lot of function]
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'image'       => $image
            ]);

            // to update category_id in user
            User::where('id', auth()->user()->id)
                ->update(['category_id' => $category->id]);

            Toastr::success('Stroe created successfully', 'success');
            return redirect()->route('store.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function edit($categorySlug)
    {
        if (auth()->user()->user_role == 'admin') {

            if (auth()->user()->category->slug != $categorySlug) {
                abort(403);
            }
            $category = Category::where("slug", $categorySlug)->first();
            return view('admin.category.edit', compact('category'));
        }
        abort(403);
    }
    // ----------------------------------------------------------------------------

    // for admin only
    public function update(Request $request, $categorySlug)
    {
        if (auth()->user()->user_role == 'admin') {
            $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);

            if (auth()->user()->category->slug != $categorySlug) {
                abort(403);
            }
            $category = Category::where("slug", $categorySlug)->first();

            if ($request->file('image')) {
                $image = $request->file('image')->store('public/files');
                Storage::delete($category->image);
                $category->image = $image;
            }

            //things to be updated 
            $category->name        =  $request->name;
            $category->description =  $request->description;
            $category->save();

            //Notification 
            Toastr::success('Store updated successfully', 'success');
            return redirect()->route('store.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------
    //  for superadmin only
    public function destroy($categorySlug)
    {
        if (auth()->user()->user_role == 'superadmin') {
            $category = Category::where("slug", $categorySlug)->first();
            if (!$category) {
                abort(404);
            }
            // Delete the image from a folder files [public\storage\files\...]
            Storage::delete($category->image);
            $category->delete();
            Toastr::success('Store deleteed successfully', 'success');
            return redirect()->route('store.index');
        }
        abort(403);
    }
}
