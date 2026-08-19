<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Support\Carbon;

class AdminVisitorController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC STATISTICS
        |--------------------------------------------------------------------------
        */

        $totalVisitors = Visitor::count();

        $totalVisits = Visitor::sum('visits');

        $todayVisitors = Visitor::whereDate(
            'last_visited_at',
            Carbon::today()
        )->count();

        $mobileVisitors = Visitor::where(
            'device',
            'Mobile'
        )->count();

        $desktopVisitors = Visitor::where(
            'device',
            'Desktop'
        )->count();

        $tabletVisitors = Visitor::where(
            'device',
            'Tablet'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | BROWSER STATISTICS
        |--------------------------------------------------------------------------
        */

        $browserStats = Visitor::select(
            'browser'
        )
            ->selectRaw(
                'COUNT(*) as total'
            )
            ->groupBy('browser')
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DEVICE STATISTICS
        |--------------------------------------------------------------------------
        */

        $deviceStats = Visitor::select(
            'device'
        )
            ->selectRaw(
                'COUNT(*) as total'
            )
            ->groupBy('device')
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | LAST 7 DAYS
        |--------------------------------------------------------------------------
        */

        $dailyVisitors = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()
                ->subDays($i);

            $dailyVisitors[] = [

                'date' =>
                    $date->format('d M'),

                'count' =>
                    Visitor::whereDate(
                        'last_visited_at',
                        $date
                    )->count(),

            ];

        }


        /*
        |--------------------------------------------------------------------------
        | VISITOR LIST
        |--------------------------------------------------------------------------
        */

        $visitors = Visitor::orderBy(
            'last_visited_at',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.visitors',
            compact(
                'visitors',
                'totalVisitors',
                'totalVisits',
                'todayVisitors',
                'mobileVisitors',
                'desktopVisitors',
                'tabletVisitors',
                'browserStats',
                'deviceStats',
                'dailyVisitors'
            )
        );
    }
}