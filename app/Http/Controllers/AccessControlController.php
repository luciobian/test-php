<?php

namespace App\Http\Controllers;

use App\AccessControl;
use Illuminate\Http\Request;

class AccessControlController extends Controller
{
    /**
     * Show view of Access control
     *
     * @return void
     */
    public function show()
    {
        $access_control = AccessControl::orderBy('created_at', 'desc')->get()->groupBy('type');

        return view('access_control', ['access_control'=>$access_control]);
    }
}
