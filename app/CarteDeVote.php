<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarteDeVote extends Model
{
    protected $fillable = [
    	'imgRecto', 'imgVerso', 'dateDeliv', 'compteARebours', 'statut', 'personne_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function electeur(){
    	return $this->belongsTo("App\Electeur");
    }
}