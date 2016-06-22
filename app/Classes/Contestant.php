<?php

namespace App\Classes;

use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $table = 't_contest';

    protected $fillable = [
        'contest_id', 'email', 'name','location','ph','nric','source','user_ip','browser'
    ];
}