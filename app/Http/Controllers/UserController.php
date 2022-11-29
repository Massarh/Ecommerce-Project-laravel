<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('user_role', 'customer')->get();
        return view('admin.user.index', compact('users'));
    }

    function createAdmin(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //unique users mean that the email is not exist in the database(new email).
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //confirmed means that the two password is the same.
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'userRole' => ['required'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_role'=>$request['userRole'],
        ]);

        return redirect()->route('dashboard');
    }

}
