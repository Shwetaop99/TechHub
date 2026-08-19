<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | Only track normal GET website requests
        |--------------------------------------------------------------------------
        */

        if (
            $request->isMethod('GET') &&
            !$request->ajax()
        ) {

            /*
            |--------------------------------------------------------------------------
            | Prevent counting every page request
            |--------------------------------------------------------------------------
            |
            | One browser session = one visit.
            |
            */

            if (!session()->has('visitor_session_recorded')) {

                $ipAddress =
                    $request->ip();

                $userAgent =
                    $request->userAgent() ?? '';


                /*
                |--------------------------------------------------------------------------
                | Detect Device
                |--------------------------------------------------------------------------
                */

                $device = 'Desktop';


                if (
                    preg_match(
                        '/ipad|tablet/i',
                        $userAgent
                    )
                ) {

                    $device = 'Tablet';

                } elseif (
                    preg_match(
                        '/mobile|android|iphone|ipod/i',
                        $userAgent
                    )
                ) {

                    $device = 'Mobile';

                }


                /*
                |--------------------------------------------------------------------------
                | Detect Browser
                |--------------------------------------------------------------------------
                */

                $browser = 'Unknown';


                /*
                |--------------------------------------------------------------------------
                | Brave
                |--------------------------------------------------------------------------
                |
                | Brave is Chromium based, so check it BEFORE Chrome.
                |
                */

                $secChUa =
                    $request->header(
                        'sec-ch-ua'
                    );


                if (
                    $secChUa &&
                    stripos(
                        $secChUa,
                        'Brave'
                    ) !== false
                ) {

                    $browser = 'Brave';

                } elseif (
                    stripos(
                        $userAgent,
                        'Edg'
                    ) !== false
                ) {

                    $browser =
                        'Microsoft Edge';

                } elseif (
                    stripos(
                        $userAgent,
                        'Firefox'
                    ) !== false
                ) {

                    $browser =
                        'Mozilla Firefox';

                } elseif (
                    stripos(
                        $userAgent,
                        'Chrome'
                    ) !== false
                ) {

                    $browser =
                        'Google Chrome';

                } elseif (
                    stripos(
                        $userAgent,
                        'Safari'
                    ) !== false
                ) {

                    $browser =
                        'Safari';

                }


                /*
                |--------------------------------------------------------------------------
                | Find Visitor
                |--------------------------------------------------------------------------
                */

                $visitor =
                    Visitor::where(
                        'ip_address',
                        $ipAddress
                    )
                    ->where(
                        'device',
                        $device
                    )
                    ->where(
                        'browser',
                        $browser
                    )
                    ->first();


                /*
                |--------------------------------------------------------------------------
                | Existing Visitor
                |--------------------------------------------------------------------------
                */

                if ($visitor) {

                    $visitor->increment(
                        'visits'
                    );

                    $visitor->update([

                        'last_visited_at' =>
                            Carbon::now(),

                    ]);

                }


                /*
                |--------------------------------------------------------------------------
                | New Visitor
                |--------------------------------------------------------------------------
                */

                else {

                    Visitor::create([

                        'ip_address' =>
                            $ipAddress,

                        'device' =>
                            $device,

                        'browser' =>
                            $browser,

                        'visits' =>
                            1,

                        'first_visited_at' =>
                            Carbon::now(),

                        'last_visited_at' =>
                            Carbon::now(),

                    ]);

                }


                /*
                |--------------------------------------------------------------------------
                | Mark This Browser Session
                |--------------------------------------------------------------------------
                */

                session()->put(
                    'visitor_session_recorded',
                    true
                );

            }

        }


        return $next($request);
    }
}