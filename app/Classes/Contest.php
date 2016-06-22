<?php

namespace App\Classes;

use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 't_contest_detail';

    protected $fillable = [
        'contest_name', 'start_date', 'end_date',
    ];
}