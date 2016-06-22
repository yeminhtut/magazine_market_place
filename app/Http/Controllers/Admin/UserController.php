<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
        
    }
    
    public function users(Request $request) {
        
        $data['users'] = \App\Classes\User::orderby('name')->paginate(10);
        
        return view('admin.users', $data);
    }
    
    public function do_edit_user(Request $request, $uid) {
        
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'email' => 'required'
        ]);
        
        $uid = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
        $user = \App\Classes\User::find($uid);       

        $user_form_fields = array(
            'name',
            'email',
            'type',
            'password');
        
        foreach($user_form_fields as $field_name) {
            if( isset($request->$field_name) && $request->$field_name ) {
                if($field_name=='password')
                    $user->$field_name = bcrypt($request->$field_name);
                else
                    $user->$field_name = $request->$field_name;
            }
        }
        
        $user->save();
        
        return back()->with('status', 'Updated!');
    }
    
    public function edit_user($uid) {
        
        $uid = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
        $data['user'] = \App\Classes\User::find($uid);

        return view('admin.edit_user', $data);
    }
    
    public function do_add_user(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|size:8'
        ]);
        
        $user_form_fields = array(
            'name',
            'email',
            'type',
            'password');
        
        $user = new \App\Classes\User();
        
        foreach($user_form_fields as $field_name) {
            if( isset($request->$field_name) && $request->$field_name ) {
                if($field_name=='password')
                    $user->$field_name = bcrypt($request->$field_name);
                else
                    $user->$field_name = $request->$field_name;
            }
        }
        
        $user->save();
        
        return redirect()->route('admin_user_listing')->with('status', 'New user created!');
    }    
    
    public function add_user() {
        
        return view('admin.add_user');
    }
    
    public function delete_user($uid) {
        
        $uid = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
        $data['user'] = \App\Classes\User::find($uid);

        return view('admin.delete_user', $data);
    }
    
    public function do_delete_user($uid) {
        
        $uid = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
        $data['user'] = \App\Classes\User::find($uid);
        $data['user']->delete();

        return redirect()->route('admin_user_listing')->with('status', 'User deleted!');
    }       
}