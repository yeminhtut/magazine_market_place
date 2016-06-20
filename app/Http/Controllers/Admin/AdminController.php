<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if( Auth::user() ) {
            //Auth::user()->adminCheck();
        }
    }

    public function index() {
        $this->data = [];
        return view('index', $this->data);
    }
}