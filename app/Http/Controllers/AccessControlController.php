<?php

namespace App\Http\Controllers;

use App\AccessControl;

class AccessControlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show view of Access control
     *
     * @return void
     */
    public function show()
    {
        $access_success = AccessControl::orderBy('created_at', 'desc')->where('type', 'C')->paginate(5,['*'], 'success');

        $access_failed = AccessControl::orderBy('created_at', 'desc')->where('type', 'I')->paginate(5,['*'], 'failed');

        return view('access_control', ['success'=>$access_success, 'failed'=>$access_failed]);
    }
}
