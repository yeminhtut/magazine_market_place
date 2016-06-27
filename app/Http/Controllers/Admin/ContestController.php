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
        $data['contests'] = \App\Classes\Contest::orderby('id', 'desc')->paginate(10); 
        return view('admin.contest', $data);
    }

    public function add_contest(){
        return view('admin.add_contest');
    }

    public function do_add_contest(Request $request){

        $this->validate($request, [
            'contest_name' => 'required', 
            'start_date',
            'end_date'           
        ]);
        
        $last_contest = \App\Classes\Contest::select('contest_id', 'contest_name')->orderBy('ID', 'desc')->first();
        $last_contest_id = $last_contest->contest_id;
        $contest_id = $last_contest_id + 1;
        $contest_name = $_POST['contest_name'];     
        $start_date = date('Y-m-d',strtotime($_POST['start_date']));
        $end_date = date('Y-m-d',strtotime($_POST['end_date']));

        $contest = new \App\Classes\Contest();
        $contest->contest_id = isset($contest_id)? $contest_id:'';
        $contest->contest_name = isset($contest_name)? $contest_name: '';
        $contest->start_date   = isset($start_date)? $start_date: '';
        $contest->end_date     = isset($end_date)? $end_date: '';
        
        $contest->save();
        
        return redirect()->route('admin_contest_listing')->with('status', 'New contest created!');
    }

    public function get_all_contestant(Request $request){
        $data['contestants'] = \App\Classes\Contestant::orderby('id', 'desc')->paginate(10); 
        //var_dump($data['contestants']);
        return view('admin.contestant', $data);
    }
}