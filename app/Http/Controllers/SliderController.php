<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;

class SliderController extends Controller
{

    // for superadmin only
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    //--------------------------------------------------------

    // for superadmin only
    public function create()
    {
        return view('admin.slider.create');
    }

    //--------------------------------------------------------

    // for superadmin only
    public function store(Request $request){
        $request->validate([
            'image'=>'required|mimes:jpg,png'
        ]);
        $image = $request->file('image')->store('public/slider');
        Slider::create([
            'image'=>$image
        ]);

        Toastr::success('Image created successfully', 'success');
        return redirect()->route('slider.index');
    }

    //--------------------------------------------------------

    // for superadmin only
    public function destroy($id){
        Slider::find($id)->delete();

        Toastr::success('Image deleted successfully', 'success');
        return redirect()->back();
    }
}
