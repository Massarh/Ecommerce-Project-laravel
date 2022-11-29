<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
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

    //--------------------------------------------------------

    public function createAdminOrEmployee(Request $request)
    {

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
            'user_role' => $request['userRole'],
            'category_id' => $request['categoryId'],
        ]);

        return redirect()->route('dashboard');
    }

    //--------------------------------------------------------

    public function viewStore()
    {
        $categories = Category::get();
        return view('admin.admin-and-employee.view-store', compact('categories'));
    }

    //--------------------------------------------------------

    public function viewAdminAndEmployee($categoryId)
    {
        $adminsAndEmployees = User::where('category_id', $categoryId)->get();

        return view('admin.admin-and-employee.view-admin-and-employee', compact('adminsAndEmployees'));
    }

    //--------------------------------------------------------

    public function deleteAdminOrEmployee($userId)
    {
        $adminOrEmployee = User::find($userId);
        $numberOfAdmin = User::where("category_id", $adminOrEmployee->category_id)->where("user_role", "admin")->count();
        if ($numberOfAdmin > 1) {

            $adminOrEmployee->delete();
        } else {
            notify()->error('cannot delete the last admin in this store,please create a new admin before you try to delete him.');
        }
        return redirect()->back();
    }
}
