<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = \Auth::user();
        if ($user->can('distributor')) {
            return redirect(route('view-distributor-files'));
        }
        return view('dashboard');
    }
}
