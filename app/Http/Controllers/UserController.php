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

            if ($request['categoryId']) {
                return redirect()->route('admin.view', $request['categoryId']);
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
    public function viewAdminAndEmployee($categoryId)
    // error here
    {
        if (auth()->user()->user_role == "superadmin") {
            $adminsAndEmployees = User::where('category_id', $categoryId)->get();
            if (!$adminsAndEmployees) {
                abort(404);
            }

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
            if (!$adminOrEmployee) {
                abort(404);
            }

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
            $newAdmins = User::where("user_role", "admin")->where('category_id', null)
                ->orWhere("user_role", "employee")->where('category_id', null)->get();
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
        if (auth()->user()->user_role == 'superadmin' || auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'employee') {
            return view('admin.profile.profile', compact('user'));
        } elseif (auth()->user()->user_role == 'customer') {
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
        $request->validate([
            'name'    => ['nullable', 'max:255'],
            'phone_number' => ['nullable', 'digits:10', 'numeric'],
            'address' => ['nullable', 'max:255'],
            'image'   => ['nullable'], //, 'mimes:png,jpg'
        ]);

        // collect(request()->all())->filter() dosenot show null vale
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
