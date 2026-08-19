<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MANAGE ADMINS PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $admins = Admin::latest()->get();

        return view(
            'admin-manage-admins',
            compact('admins')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE ADMIN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'email' => [
                'required',
                'email',
                'unique:admins,email',
            ],

            'password' => [
                'required',
                'min:6',
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'in:view_dashboard,view_website,view_products,add_products,view_orders,view_customers,view_inventory,view_coupons,view_settings,view_visitors',
            ],
        ]);

        $permissions = $request->input(
            'permissions',
            []
        );

        $admin = new Admin();

        $admin->email =
            trim($request->email);

        $admin->password =
            Hash::make($request->password);

        $this->applyPermissions(
            $admin,
            $permissions
        );

        $admin->save();

        return redirect(
            '/admin/manage-admins'
        )->with(
            'success',
            'Admin created successfully!'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT ADMIN PAGE
    |--------------------------------------------------------------------------
    */

    public function edit(Admin $admin)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return view(
            'admin-edit-admin',
            compact('admin')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ADMIN
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Admin $admin
    ) {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique(
                    'admins',
                    'email'
                )->ignore($admin->id),
            ],

            'password' => [
                'nullable',
                'min:6',
            ],

            'permissions' => [
                'nullable',
                'array',
            ],

            'permissions.*' => [
                'in:view_dashboard,view_website,view_products,add_products,view_orders,view_customers,view_inventory,view_coupons,view_settings,view_visitors',
            ],
        ]);

        $permissions = $request->input(
            'permissions',
            []
        );

        $admin->email =
            trim($request->email);

        /*
        | Only change the password if a new
        | password was entered.
        */
        if ($request->filled('password')) {
            $admin->password =
                Hash::make($request->password);
        }

        /*
        | Important:
        | Permissions are replaced completely.
        | So unchecked boxes become false.
        */
        $this->applyPermissions(
            $admin,
            $permissions
        );

        $admin->save();

        return redirect(
            '/admin/manage-admins'
        )->with(
            'success',
            'Admin updated successfully!'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ADMIN
    |--------------------------------------------------------------------------
    */

    public function destroy(Admin $admin)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $admin->delete();

        return redirect(
            '/admin/manage-admins'
        )->with(
            'success',
            'Admin deleted successfully!'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | APPLY ALL PERMISSIONS
    |--------------------------------------------------------------------------
    */

    private function applyPermissions(
        Admin $admin,
        array $permissions
    ): void {
        $admin->can_view_dashboard =
            in_array(
                'view_dashboard',
                $permissions
            );

        $admin->can_view_website =
            in_array(
                'view_website',
                $permissions
            );

        $admin->can_view_products =
            in_array(
                'view_products',
                $permissions
            );

        $admin->can_add_products =
            in_array(
                'add_products',
                $permissions
            );

        $admin->can_view_orders =
            in_array(
                'view_orders',
                $permissions
            );

        $admin->can_view_customers =
            in_array(
                'view_customers',
                $permissions
            );

        $admin->can_view_inventory =
            in_array(
                'view_inventory',
                $permissions
            );

        $admin->can_view_coupons =
            in_array(
                'view_coupons',
                $permissions
            );

        $admin->can_view_settings =
            in_array(
                'view_settings',
                $permissions
            );

        $admin->can_view_visitors =
            in_array(
                'view_visitors',
                $permissions
            );
    }
}