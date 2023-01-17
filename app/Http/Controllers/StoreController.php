<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class StoreController extends Controller
{
    // Superadmin , Admin , Employee
    public function index()
    {

        if (auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            $store = Store::find(auth()->user()->store_id);

            return view('admin.Store.index', compact('store'));
        } elseif (auth()->user()->user_role == 'superadmin') {
            $stores = Store::get();
            return view('admin.Store.index', compact('stores'));
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function create()
    {
        if (auth()->user()->user_role == 'admin') {
            return view('admin.store.create');
        } else {
            abort(403);
        }
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

            $store = Store::create([
                'name'        => $request->name,
                // "Str" is class in laravel [contains a lot of function]
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'image'       => $image
            ]);

            // to update category_id in user
            $user = User::find(auth()->user()->id);

            $user->update(['store_id' => $store->id]);

            Toastr::success('Store created successfully', 'success');
            return redirect()->route('store.index');
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin only
    public function edit($storeSlug)
    {
        if (auth()->user()->user_role == 'admin') {
            // URL AUTHORIZATION
            if (auth()->user()->store->slug != $storeSlug) {
                abort(403);
            }
            //END URL AUTHORIZATION
            $store = Store::where("slug", $storeSlug)->first();
            return view('admin.store.edit', compact('store'));
        }
        abort(403);
    }
    // ----------------------------------------------------------------------------

    // for admin only
    public function update(Request $request, $storeSlug)
    {
        if (auth()->user()->user_role == 'admin') {

            $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);

            $store = Store::where("slug", $storeSlug)->first();
            if ($request->file('image')) {
                Storage::delete($store->image);
                // the name for the new image
                $newImage = $request->file('image')->store('public/files');
                $store->image = $newImage;
            }


            //things to be updated 
            $store->name        =  $request->name;
            $store->description =  $request->description;
            $store->save();

            //Notification 
            Toastr::success('Store updated successfully', 'success');
            return redirect()->route('store.index');
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------
    //  for superadmin only
    public function destroy($storeSlug)
    {
        if (auth()->user()->user_role == 'superadmin') {
            $store = Store::where("slug", $storeSlug)->first();

            // Delete the image from a folder files [public\storage\files\...]
            Storage::delete($store->image);
            $store->delete();
            Toastr::success('Store deleted successfully', 'success');
            return redirect()->route('store.index');
        }
        abort(403);
    }
}
