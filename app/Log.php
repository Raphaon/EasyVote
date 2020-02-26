<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id', 'action', 'action_time', 'level',
    ];

    public function user(){
    	return $this->belongsTo("App\User");
    }
}
