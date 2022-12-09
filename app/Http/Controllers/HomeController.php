<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        // if logining (Admin) -> (auth/dashboard)
        if(auth()->user()->user_role!='customer'){
            return redirect()->to('auth/dashboard');
        }
        // if logining (User) -> (main page)
        return redirect()->to('/');
    }

// vendor-scripts.blade.php
    // public function root()
    // {
    //     return view('index');
    // }
    
}
