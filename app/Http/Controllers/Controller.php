<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const CHECKBOXES = [];

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if(Auth::check()){

                View::share('user_announcements', Auth::user()->getUnreadAnnouncements());

            }

            return $next($request);
        });


    }

}
