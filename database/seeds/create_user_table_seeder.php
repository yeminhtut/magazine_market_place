<?php
use Illuminate\Database\Seeder;
use App\Classes\Permission;
use App\Classes\Role;
use App\Classes\User;
    class create_user_table_seeder extends seeder
    {
        public function run()
        {
        	//create user
   //      	$user = User::create([
   //              'name' => 'Ye Min Htut',
   //              'email' => 'yehtut.it@gmail.com',
   //              'password' => bcrypt('yemin123'),
   //          ]);
   // 			$owner = new App\Classes\Role();
			// $owner->name         = 'owner';
			// $owner->display_name = 'Project Owner'; // optional
			// $owner->description  = 'User is the owner of a given project'; // optional
			// $owner->save();

			// $admin = new App\Classes\Role();
			// $admin->name         = 'admin';
			// $admin->display_name = 'User Administrator'; // optional
			// $admin->description  = 'User is allowed to manage and edit other users'; // optional
			// $admin->save();

			// $user = User::where('email', '=', 'ye.minhtut@travelogy.com')->first();

			// // role attach alias
			// $user->attachRole($admin); // parameter can be an Role object, array, or id

			// // or eloquent's original technique
			// $user->roles()->attach($admin->id); // id only


			$createPost = new App\Classes\Permission();
			$createPost->name         = 'create-post';
			$createPost->display_name = 'Create Posts'; // optional
			// Allow a user to...
			$createPost->description  = 'create new blog posts'; // optional
			$createPost->save();

			$editUser = new App\Classes\Permission();
			$editUser->name         = 'edit-user';
			$editUser->display_name = 'Edit Users'; // optional
			// Allow a user to...
			$editUser->description  = 'edit existing users'; // optional
			$editUser->save();

			$admin = App\Classes\Role::where('name', '=','admin')->first();
			$admin->attachPermission($createPost);
			// equivalent to $admin->perms()->sync(array($createPost->id));

			$owner = App\Classes\Role::where('name', '=','owner')->first();

			$owner->attachPermissions(array($createPost, $editUser));
			// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));

    }
}