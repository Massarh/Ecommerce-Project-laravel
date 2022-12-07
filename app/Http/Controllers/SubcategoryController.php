<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\CategorySubcategory;

class SubcategoryController extends Controller
{

    public function getSubcategoryByCatId($categoryId)
    {
        $category = Category::find($categoryId);
        $subcategories= $category->subcategory;


        return view('admin.subcategory.index', compact('subcategories','category'));
    }

// ----------------------------------------------------------------------------

    public function create()
    {
        return view('admin.subcategory.create');
    }

// ----------------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'category'=>'required', // <select name="category" ...>
        ]);
        $subcategory = Subcategory::create([  
            'name'=>$request->name,
            'category_id'=>auth()->user()->category_id,
            // category_id : column name in db //category: <select name="category" ...> 
        ]);
        $subcategory=CategorySubcategory::create([  
            'category_id'=>auth()->user()->category_id, 
            'subcategory_id'=>$subcategory->id,
        ]);
        notify()->success('Section created successfully');
        return redirect()->route('section.getSubcategoryByCatId', [auth()->user()->category_id]);
        //return $a; // {"name":"lenove","category_id":"1","updated_at":"2022-10-24T06:39:26.000000Z","created_at":"2022-10-24T06:39:26.000000Z","id":1}
    }

// ----------------------------------------------------------------------------

    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }

// ----------------------------------------------------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'category'=>'required',
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();

        notify()->success('Section updated successfully');
        return redirect()->route('section.getSubcategoryByCatId', [$request->category]);
    }

// ----------------------------------------------------------------------------

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $categoryId = $subcategory->category_id;
        $subcategory->delete();
        notify()->success('Section deleted successfully');
        return redirect()->route('section.getSubcategoryByCatId', [$categoryId]);
    }
}
