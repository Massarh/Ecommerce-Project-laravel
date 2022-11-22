<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('user_role', 'customer')->get();
        return view('admin.user.index', compact('users'));
    }

}
