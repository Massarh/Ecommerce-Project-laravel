<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\CategorySubcategory;
use App\Models\Product;

class SubcategoryController extends Controller
{

    public function  index()
    {
        if (auth()->user()->user_role==='superadmin'){
            $subcategories=Subcategory::get();
            return view('admin.subcategory.all-subcategory-for-superadmin', compact('subcategories'));   
        }
        abort(403);

    }

// ----------------------------------------------------------------------------

    public function getSubcategoryByCatId($slug)
    {
       // url validation
        if (auth()->user()->user_role==='admin'||auth()->user()->user_role==='employee')
        {
            $isLegal = auth()->user()->category->slug == $slug;
            if(!$isLegal)
            {
            abort(403);
            };
        }
        // end url validation

        $category = Category::where('slug',$slug)->first();

        // if super admin write wrong slug
        if(is_null($category)){
            abort(404);

        }
        $subcategories= $category->subcategory;

        return view('admin.subcategory.index', compact('subcategories','category'));
    }

// ----------------------------------------------------------------------------

    public function create()
    {
        if(auth()->user()->user_role=="superadmin")
        {
            return view('admin.subcategory.superadmin-create');

        } elseif(auth()->user()->user_role=="admin")
        {   
            $adminSubcategoryIds=[];
                $adminSubcategories=auth()->user()->category->subcategory;
                foreach ($adminSubcategories as $key => $adminSubcategory) {
                    array_push($adminSubcategoryIds, $adminSubcategory->id);
                };

                $restSubcategories=Subcategory::whereNotIn('id',$adminSubcategoryIds )->get();
            return view('admin.subcategory.create',compact('restSubcategories'));
        }
    }

// ----------------------------------------------------------------------------

    public function store(Request $request)
    {
        if (auth()->user()->user_role=='superadmin') 
        {
            $request->validate([
                'name'=>'required|min:3',
            ]);
        
            $subcategory = Subcategory::create([  
                'name'=>$request->name,
            ]);
            
            notify()->success('Section created successfully');
            return redirect()->route('section.index');

        } else if (auth()->user()->user_role=='admin') 
        {
            $request->validate([
                'subcategory'=>'required',
            ]);
            
            $subcategory=CategorySubcategory::create([  
            'category_id'=>auth()->user()->category_id, 
            'subcategory_id'=>$request->subcategory,
            ]);
            return redirect()->route('section.getSubcategoryByCatId', [auth()->user()->category->slug]);

        }
    }

// ----------------------------------------------------------------------------

    public function edit($subcategoryId)
    {
        if (auth()->user()->user_role=='superadmin'){
            $oldSubcategory=Subcategory::find($subcategoryId);
            return view('admin.subcategory.superadmin-edit',compact('oldSubcategory'));
        }

        if (auth()->user()->user_role=='admin'){
            $oldSubcategory=Subcategory::find($subcategoryId);
            $adminSubcategoryIds=[];
            $adminSubcategories=auth()->user()->category->subcategory;
            foreach ($adminSubcategories as $key => $adminSubcategory) {
                array_push($adminSubcategoryIds, $adminSubcategory->id);
            };

            $restSubcategories=Subcategory::whereNotIn('id',$adminSubcategoryIds )->get();
            return view('admin.subcategory.edit',compact('oldSubcategory','restSubcategories'));
        }
    }

// ----------------------------------------------------------------------------

    public function update(Request $request, $oldSubcategoryId)
    {
        if (auth()->user()->user_role==='superadmin')
        {
            $request->validate([
                'name'=>'required|min:3',
            ]);
            $subcategory = Subcategory::find($oldSubcategoryId);
            $subcategory->name =$request->name ;
            $subcategory->save();

            notify()->success('Section updated successfully');
            return redirect()->route('section.index');

        } elseif(auth()->user()->user_role === 'admin'){
            $request->validate([
                'subcategory'=>'required',
            ]);
            $newSubcategoryId=$request->subcategory;
            $categoryId= auth()->user()->category_id;
            
            // if the admin insert the same subcategory i will not do anything.
            if($newSubcategoryId==$oldSubcategoryId){
                notify()->success('nothing to update');
                return redirect()->route('section.getSubcategoryByCatId', [auth()->user()->category->slug]);
        
            };
        
            $productsCount=Product::where('category_id',$categoryId)
            ->where('subcategory_id',$oldSubcategoryId )->count();
            if($productsCount!=0) 
            {
            // you cant delete
            $request->session()->flash('status', 'cannot update this section because it contains products.');
            return redirect()->back();
            } else {

                // delete link between category and old subcategory in jt 
                $categorySubcategory = CategorySubcategory::where('category_id',$categoryId)->where('subcategory_id',
                $oldSubcategoryId)->first();

                $categorySubcategory->delete();

                // create new link between category and new subcategory in jt
                $createcategorySubcategory = CategorySubcategory::create([
                    'category_id'=>$categoryId,
                    'subcategory_id' =>  $newSubcategoryId
                ]);
                notify()->success('Section updated successfully');
                return redirect()->route('section.getSubcategoryByCatId', [auth()->user()->category->slug]);
            }
        }
    }

// ----------------------------------------------------------------------------

    public function destroy($subcategoryId,Request $request)
    {
        // sold sent email to admin here
        if (auth()->user()->user_role==='superadmin')
        {
            $subcategory=Subcategory::find($subcategoryId);
            $productCount=count($subcategory->product);
            $categoryCount=count($subcategory->category);

            if($productCount ==0 && $categoryCount==0)
            {
                $subcategory->delete();

                notify()->success('Section deleted successfully');
                return redirect()->back(); 

            } else {
                $request->session()->flash('status', 'cannot delete this section because some stores use it');
                return redirect()->back();   
            }         
        }
        
        if(auth()->user()->user_role==='admin'){
            // delete link between category and old subcategory in jt 
            $categoryId= auth()->user()->category_id;
            $categorySubcategory = CategorySubcategory::where('category_id',$categoryId)->where('subcategory_id',$subcategoryId)->first();
            $categorySubcategory->delete();
            // delete all products that related to this category and old subcategory 

            $products=Product::where('category_id',$categoryId)->where('subcategory_id',$subcategoryId)->get();
            //   each delete all objects on products array
            $products->each->delete();

            notify()->success('Section deleted successfully');
            return redirect()->route('section.getSubcategoryByCatId', [auth()->user()->category->slug]);
        }
    }
}
