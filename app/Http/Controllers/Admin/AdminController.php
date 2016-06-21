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
        $owner = new Classes\Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Classes\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $user = Classes\User::where('email', '=', 'ye.minhtut@travelogy')->first();

        // role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id

        // or eloquent's original technique
        $user->roles()->attach($admin->id); // id only
        $createPost = new Classes\Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Classes\Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($createPost);
        // equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
        // equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
    }
}