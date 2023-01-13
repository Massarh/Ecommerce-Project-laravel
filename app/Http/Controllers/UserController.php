<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    // for superadmin only
    public function viewCreateAdminOrEmployee(Request $request)
    {
        if (auth()->user()->user_role == "superadmin") {
            $stores = Store::get();
            return view('admin.admin-and-employee.add-admin', compact('stores'));
        } else {
            abort(403);
        }
    }


    // for superadmin only
    public function createAdminOrEmployee(Request $request)
    {
        if (auth()->user()->user_role == "superadmin") {
            $request->validate([
                'name'  => ['required', 'string', 'max:255'],
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
                'store_id' => $request['storeId'],
            ]);

            $storeId = $request['storeId'];
            if ($storeId) {
                $store = Store::find($storeId);

                Toastr::success('Created successfully', 'success');
                return redirect()->route('admin.view', $store->slug);
            }

            Toastr::success('Created successfully', 'success');
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

            $stores = Store::get();
            return view('admin.admin-and-employee.view-store', compact('stores'));
        } else {
            abort(403);
        }
    }

    //--------------------------------------------------------

    // for superadmin only
    public function viewAdminAndEmployee($storeSlug)
    {
        if (auth()->user()->user_role == "superadmin") {
            $store = Store::where('slug', $storeSlug)->first();
            // URL AUTHORIZATION
            if (!$store) {
                abort(404);
            }
            //END URL AUTHORIZATION
            $adminsAndEmployees = $store->users;
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
            } else if ($adminOrEmployee->user_role == 'admin' && $adminOrEmployee->store_id) {

                //  'from admin&employee';
                $numberOfAdmin = User::where("store_id", $adminOrEmployee->store_id)->where("user_role", "admin")->count();
                if ($numberOfAdmin > 1) {
                    $adminOrEmployee->delete();
                } else {
                    $request->session()->flash('status', 'cannot delete the last admin in this store, please create a new admin before you try to delete him.');
                }
            } else if ($adminOrEmployee->user_role == 'admin' && !$adminOrEmployee->store_id) {

                //  'from new admin';
                $adminOrEmployee->delete();
            }

            Toastr::success('Deleted successfully', 'success');
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
            $newAdmins = User::where("user_role", "admin")->whereNull('store_id')
                ->orWhere("user_role", "employee")->whereNull('store_id')->get();
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
        if ($user->user_role == 'superadmin' ||  $user->user_role == 'admin' ||  $user->user_role == 'employee') {
            return view('admin.profile.profile', compact('user'));
        } elseif ($user->user_role == 'customer') {
            return view('customerProfile.profile', compact('user'));
        }
    }

    //--------------------------------------------------------
    // for four user_role
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'max:255'],
            'phone_number' => ['nullable', 'digits:10', 'numeric'],
            'address' => ['nullable', 'max:255'],
            'image'   => ['nullable'], //, 'mimes:png,jpg'
        ]);
        $user = auth()->user();
        if ($request->file('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $image = $request->file('image')->store('public/user');
            $user->image =  $image;
        }
        if ($request->clear) {
            $user->image  =  null;
        }

        $user->name          =  $request->name;
        $user->phone_number   =  $request->phone_number;
        $user->address         = $request->address;
        $user->save();

        Toastr::success('User information updated successfully', 'success');
        return redirect()->route('profile');
    }
}
