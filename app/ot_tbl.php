<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\agency;
use App\ot_shift;
use App\department;

class ot_tbl extends Model
{
	protected $fillable = [
        'name', 'date', 'department_id', 'periodfrom', 'periodto', 'date', 'shift', 'agency', 'jcontent', 'results', 'tfrom', 'tto', 'hrs',
    ];
	
    public function agency()
	{
	    return $this->belongsTo('App\agency', 'agency_id');
    }
    public function user()
	{
	    return $this->belongsTo('App\User', 'User_id');
	}
	public function department()
	{
	    return $this->belongsTo('App\department_tbl', 'department_id');
	}
	public function shift()
	{
	    return $this->belongsTo('App\ot_shift', 'shift_sched');
	}
}
