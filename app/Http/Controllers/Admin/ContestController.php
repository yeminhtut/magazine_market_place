<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Classes;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function get_all_contest(){
        $data['contests'] = \App\Classes\Contest::orderby('id', 'desc')->paginate(1); 
        return view('admin.contest', $data);
    }

    public function add_contest(){
        return view('admin.add_contest');
    }

    public function do_add_contest(Request $request){
         $this->validate($request, [
            'contest_name' => 'required',            
        ]);
        
        $contest_form_fields = array(
            'contest_name',
            'start_date',
            'end_date'
            );
        
        $contest = new \App\Classes\Contest();
        
        foreach($contest_form_fields as $field_name) {
            if( isset($request->$field_name) && $request->$field_name ) {
                $contest->$field_name = $request->$field_name;
            }
        }
        
        $contest->save();
        
        return redirect()->route('admin_contest_listing')->with('status', 'New contest created!');
    }

    public function get_all_contestant(Request $request){
        echo 'show all contestants';
    }
}