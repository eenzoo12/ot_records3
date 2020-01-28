<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    public function user()
	{
	    return $this->belongsTo('App\User', 'User_id');
	}
}
