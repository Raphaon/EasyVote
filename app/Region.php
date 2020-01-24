<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'codeReg', 'nomReg',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function departements(){
        return $this->hasMany("App\Departement");
    }

    /**
     * Region .. Departements .. Communes
     * Compris ?? Je récupère directement toutes les communes d'une région. Voir la doc pour plus d'explications
     */
    public function communes(){
        return $this->hasManyThrough("App\Commune", 'App\Departement');
    }
}
