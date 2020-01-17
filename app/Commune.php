<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'codeCom', 'nomCom', 'departement_id',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function departement(){
        return $this->belongsTo("App\Departement");
    }

    public function personnes(){
        return $this->hasMany("App\Personne");
    }

    public function bureauDeVotes(){
        return $this->hasMany("App\BureauDeVote");
    }
}
