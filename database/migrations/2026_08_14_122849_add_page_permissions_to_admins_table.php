<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_dashboard')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_dashboard')
                    ->default(true);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW WEBSITE
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_website')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_website')
                    ->default(false);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW PRODUCTS
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_products')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_products')
                    ->default(false);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW CUSTOMERS
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_customers')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_customers')
                    ->default(false);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW INVENTORY
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_inventory')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_inventory')
                    ->default(false);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW COUPONS
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_coupons')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_coupons')
                    ->default(false);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW SETTINGS
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('admins', 'can_view_settings')) {

            Schema::table('admins', function (Blueprint $table) {

                $table->boolean('can_view_settings')
                    ->default(false);

            });

        }
    }


    public function down(): void
    {
        /*
        |--------------------------------------------------------------------------
        | REMOVE ONLY THE NEW PERMISSIONS
        |--------------------------------------------------------------------------
        */

        $columns = [
            'can_view_dashboard',
            'can_view_website',
            'can_view_products',
            'can_view_customers',
            'can_view_inventory',
            'can_view_coupons',
            'can_view_settings',
        ];


        foreach ($columns as $column) {

            if (Schema::hasColumn('admins', $column)) {

                Schema::table('admins', function (Blueprint $table) use ($column) {

                    $table->dropColumn($column);

                });

            }

        }
    }
};