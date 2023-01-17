<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    // for superadmin only
    public function index()
    {
        if (auth()->user()->user_role == 'superadmin') {
            $sliders = Slider::get();
            return view('admin.slider.index', compact('sliders'));
        }
        abort(403);
    }



    //--------------------------------------------------------

    // for superadmin only
    public function create()
    {
        if (auth()->user()->user_role == 'superadmin') {
            return view('admin.slider.create');
        }
        abort(403);
    }

    //--------------------------------------------------------

    // for superadmin only
    public function store(Request $request)
    {
        if (auth()->user()->user_role == 'superadmin') {

            $request->validate([
                'image' => 'required|mimes:jpg,png'
            ]);
            $image = $request->file('image')->store('public/slider');
            Slider::create([
                'image' => $image
            ]);

            Toastr::success('Image created successfully', 'success');
            return redirect()->route('slider.index');
        }
        abort(403);
    }

    //--------------------------------------------------------

    // for superadmin only
    public function destroy($sliderId)
    {
        if (auth()->user()->user_role == 'superadmin') {
            $slider = Slider::find($sliderId);
            Storage::delete($slider->image);
            $slider->delete();
            Toastr::success('Image deleted successfully', 'success');
            return redirect()->back();
        }
        abort(403);
    }
}
