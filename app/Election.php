<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = [
    	'nomElection',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function bureauDeVote(){
    	return $this->hasMany("App\BureauDeVote");
    }
}
