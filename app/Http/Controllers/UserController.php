<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function viewCreateAdminOrEmployee(Request $request)
    {
        $categories = Category::get();
        return view('admin.admin-and-employee.add-admin', compact('categories'));
    }

    // for superadmin only
    public function createAdminOrEmployee(Request $request)
    {
        if (auth()->user()->user_role == "superadmin") {
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

            $categoryId = $request['categoryId'];
            if ($categoryId) {
                $category = Category::find($categoryId);
                return redirect()->route('admin.view', $category->slug);
            }
            return redirect()->route('newAdmin.view');
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for superadmin only
    public function viewStore()
    {
        if (auth()->user()->user_role == "superadmin") {

            $categories = Category::get();
            return view('admin.admin-and-employee.view-store', compact('categories'));
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for superadmin only
    public function viewAdminAndEmployee($categorySlug)
    // error here
    {
        if (auth()->user()->user_role == "superadmin") {
            $category = Category::where('slug', $categorySlug)->first();

            // URL AUTHORIZATION
            if (!$category) {
                abort(404);
            }
            //END URL AUTHORIZATION

            $adminsAndEmployees = $category->user;
            return view('admin.admin-and-employee.view-admin-and-employee', compact('adminsAndEmployees'));
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for superadmin only
    public function deleteAdminOrEmployee($userId, Request $request)
    {
        if (auth()->user()->user_role == "superadmin") {

            $adminOrEmployee = User::find($userId);

            if ($adminOrEmployee->user_role == 'employee') {

                $adminOrEmployee->delete();
            } else if ($adminOrEmployee->user_role == 'admin' && $adminOrEmployee->category_id) {

                //  'from admin&employee';
                $numberOfAdmin = User::where("category_id", $adminOrEmployee->category_id)->where("user_role", "admin")->count();
                if ($numberOfAdmin > 1) {
                    $adminOrEmployee->delete();
                } else {
                    $request->session()->flash('status', 'cannot delete the last admin in this store,please create a new admin before you try to delete him.');
                }
            } else if ($adminOrEmployee->user_role == 'admin' && !$adminOrEmployee->category_id) {

                //  'from new admin';
                $adminOrEmployee->delete();
            }

            return redirect()->back();
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for superadmin only
    public function viewNewAdmin()
    {
        if (auth()->user()->user_role == "superadmin") {
            $newAdmins = User::where("user_role", "admin")->whereNull('category_id')
                ->orWhere("user_role", "employee")->whereNull('category_id')->get();
            // return $newAdmins;
            return view('admin.admin-and-employee.view-new-admin', compact('newAdmins'));
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for four user_role
    public function showUserProfile()
    {
        $user = auth()->user();
        if( $user->user_role == 'superadmin' ||  $user->user_role == 'admin' ||  $user->user_role == 'employee') {
            return view('admin.profile.profile', compact('user'));
        } elseif ($user->user_role == 'customer') {
            return view('customerProfile.profile', compact('user'));
        }
    }

    //--------------------------------------------------------

    public function editProfile()
    {
        $user = User::find(auth()->user()->id);
        if (auth()->user()->user_role == 'superadmin' || auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            return view('admin.profile.edit', compact('user'));
        } elseif (auth()->user()->user_role == 'customer') {
            return view('customerProfile.edit', compact('user'));
        }
    }

    //--------------------------------------------------------
    // for four user_role
    public function updateProfile(Request $request)
    {
        // MUST EDIT AND CAN BE NULL ALSO U CAN MAKE IT NULL AFTER YOU GIVE IT A VALUE.
        $request->validate([
            'name'    => ['nullable', 'max:255'],
            'phone_number' => ['nullable', 'digits:10', 'numeric'],
            'address' => ['nullable', 'max:255'],
            'image'   => ['nullable'], //, 'mimes:png,jpg'
        ]);

        // collect(request()->all())->filter() dosenot show null value
        // except(...) prevents showing same vales
        $filteredRequest = collect(request()->all())->filter()->except(
            '_token',
            '_method',
            'image'
        );

        if ($request->file('image')) {

            $user = User::where('id', auth()->user()->id)->first();
            if ($user->image) {
                Storage::delete($user->image);
            }

            $image = $request->file('image')->store('public/user');
            User::where('id', auth()->user()->id)
                ->update([
                    'image' => $image
                ]);
        }

        User::where('id', auth()->user()->id)
            ->update([...$filteredRequest]);

        Toastr::success('User updated successfully', 'success');
        return redirect()->route('profile');
    }
}
