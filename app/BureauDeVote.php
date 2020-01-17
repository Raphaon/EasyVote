<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BureauDeVote extends Model
{
    protected $fillable = [
    	'nomBureau', 'commune_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function commune(){
    	return $this->belongsTo("App\Commune");
    }

    public function elections(){
    	return $this->hasMany("App\Election");
    }
}
