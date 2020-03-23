<?php

namespace App\Http\Controllers;

use App\AccessControl;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $acceess_control = AccessControl::with('user')->where('user_id', Auth::user()->id)->get();

        $failed = $acceess_control->sortByDesc ('created_at')->where('type', 'I')->first();
        $success = $acceess_control->sortByDesc ('created_at')->where('type', 'C')->first();

        return view('home', ['success'=>$success, 'failed'=>$failed]);
    }
}
