<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;


class CategoryController extends Controller
{

    // for superadmin only 
    public function  index()
    {
        if (auth()->user()->user_role === 'superadmin') {
            $categories = Category::get();
            return view('admin.category.all-category-for-superadmin', compact('categories'));
        }
        abort(403);
    }

    // ----------------------------------------------------------------------------

    // Superadmin, Admin, Employee [superadmin -> when click on button in store ]
    public function getCategoryByStoreSlug($storeSlug)
    {
        $store = Store::where('slug', $storeSlug)->first();
        if (auth()->user()->user_role === 'admin' || auth()->user()->user_role === 'employee') {
            $isLegal = auth()->user()->store->slug == $storeSlug;
            //  URL authorization 
            if (!$isLegal) {
                abort(403);
            };
            //END URL authorization 
        } elseif (auth()->user()->user_role == 'superadmin') {
            //  URL authorization 
            if (!$store) {
                abort(404);
            }
            //END URL authorization 
        } else {
            // if the user is not superadmin or admin or customer 
            abort(403);
        }
        $categories = $store->categories;
        return view('admin.category.index', compact('categories', 'store'));
    }




    // ----------------------------------------------------------------------------

    // for admin , superadmin 
    public function create()
    {

        if (auth()->user()->user_role == "superadmin") {
            return view('admin.category.superadmin-create');
        } elseif (auth()->user()->user_role == "admin") {
            $adminCategoryIds = [];
            $adminCategories = auth()->user()->store->categories;
            foreach ($adminCategories as $key => $adminCategory) {
                array_push($adminCategoryIds, $adminCategory->id);
            };

            $restCategories = Category::whereNotIn('id', $adminCategoryIds)->get();
            return view('admin.category.create', compact('restCategories'));
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin , superadmin 
    public function store(Request $request)
    {
        if (auth()->user()->user_role == 'superadmin') {
            $request->validate([
                'name' => 'required|min:3',
            ]);

            $category = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            Toastr::success('Category created successfully', 'success');
            return redirect()->route('category.index');
        } else if (auth()->user()->user_role == 'admin') {

            $request->validate([
                'categoryId' => 'required',
            ]);

            $category = StoreCategory::create([
                'store_id' => auth()->user()->store_id,
                'category_id' => $request->categoryId,
            ]);
            Toastr::success('Category created successfully', 'success');
            return redirect()->route('category.getCategoryByStoreSlug', [auth()->user()->store->slug]);
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin , superadmin 
    public function edit($categorySlug)
    {
        $oldCategory = Category::where('slug', $categorySlug)->first();
        if (auth()->user()->user_role == 'superadmin') {
            // URL authorization
            if (!$oldCategory) {
                abort(404);
            }
            //END URL authorization 
            return view('admin.category.superadmin-edit', compact('oldCategory'));
        } elseif (auth()->user()->user_role == 'admin') {
            // URL authorization 
            $categories = auth()->user()->store->categories;
            $existedCategorySlugs = [];
            foreach ($categories as $key => $category) {
                array_push($existedCategorySlugs, $category->slug);
            }
            $isLegal = in_array($categorySlug, $existedCategorySlugs);
            if (!$isLegal) {
                abort(403);
            }
            //END URL authorization 
            $restCategories = Category::whereNotIn('slug', $existedCategorySlugs)->get();
            return view('admin.category.edit', compact('oldCategory', 'restCategories'));
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin , superadmin 
    public function update(Request $request, $oldCategoryId)
    {
        if (auth()->user()->user_role === 'superadmin') {
            $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($oldCategoryId);
            $category->name = $request->name;
            $category->save();
            Toastr::success('Category updated successfully', 'success');
            return redirect()->route('category.index');
        } elseif (auth()->user()->user_role === 'admin') {
            $request->validate([
                'categoryId' => 'required',
            ]);
            $newCategoryId = $request->categoryId;
            // check that new subcategory id exist and is not one of my subcategory
            //here
            // also check that old subcategory is one of his subcategory
            // here 
            $storeId = auth()->user()->store_id;

            // if the admin insert the same subcategory i will not do anything for improving performance.
            if ($newCategoryId == $oldCategoryId) {
                Toastr::success('nothing to update', 'success');
                return redirect()->route('category.getCategoryByStoreSlug', [auth()->user()->store->slug]);
            };

            $productsCount = Product::where('store_id', $storeId)
                ->where('category_id', $oldCategoryId)->count();
            // zero =false
            if ($productsCount) {
                // you cant delete
                $request->session()->flash('status', 'cannot update this category because it contains products.');
                return redirect()->back();
            } else {

                // delete link between category and old subcategory in jt 
                $storeCategory = StoreCategory::where('store_id', $storeId)->where(
                    'category_id',
                    $oldCategoryId
                )->first();

                $storeCategory->delete();

                // create new link between category and new subcategory in jt
                $createStoreCategory = StoreCategory::create([
                    'store_id' => $storeId,
                    'category_id' =>  $newCategoryId
                ]);
                Toastr::success('Category updated successfully', 'success');
                return redirect()->route('category.getCategoryByStoreSlug', [auth()->user()->store->slug]);
            }
        } else {
            abort(403);
        }
    }

    // ----------------------------------------------------------------------------

    // for admin , superadmin 
    public function destroy($categoryId, Request $request)
    {
        // sold sent email to admin here
        if (auth()->user()->user_role === 'superadmin') {
            $category = Category::find($categoryId);
            $productCount = count($category->products);
            $storeCount = count($category->stores);

            if ($productCount == 0 && $storeCount == 0) {
                $category->delete();

                Toastr::success('Category deleted successfully', 'success');
                return redirect()->back();
            } else {
                $request->session()->flash('status', 'cannot delete this Category because some stores use it');
                return redirect()->back();
            }
        } elseif (auth()->user()->user_role === 'admin') {
            // delete link between category and old subcategory in jt 
            $storeId = auth()->user()->store_id;
            $storeCategory = StoreCategory::where('store_id', $storeId)->where('category_id', $categoryId)->first();
            $storeCategory->delete();
            // delete all products that related to this category and  subcategory 

            $products = Product::where('store_id', $storeId)->where('category_id', $categoryId)->get();
            //   each delete all objects on products array
            $products->each->delete();

            Toastr::success('Category deleted successfully', 'success');
            return redirect()->route('category.getCategoryByStoreSlug', [auth()->user()->store->slug]);
        } else {
            abort(403);
        }
    }
}
