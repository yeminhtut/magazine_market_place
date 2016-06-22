<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Classes;

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

    public function test(){
        $user = Auth::user();
        //dd($user);
        if ($user->hasRole('owner')) {
            echo 'You are owner';
        }

        if ($user->hasRole('admin')) {
            echo 'You are admin';
        }

    }

    public function get_all_user(Request $request){
        $data['users'] = \App\Classes\User::orderby('name')->paginate(10);        
        return view('admin.users', $data);
    }
}