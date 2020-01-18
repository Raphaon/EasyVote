<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{

	protected $fillable = [
        "nom", "prenom", "dateNaiss", "lieuNaiss", "profession_occupation", "nomPere", "nomMere", "domicile_residence", "numCNI", "telephone", "photocni", "photoP", "commune_id", "statut_process", 'statut_elements',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function commune(){
        return $this->belongsTo("App\Commune");
    }

    public function electeur(){
        return $this->hasOne("App\Electeur");
    }
}
