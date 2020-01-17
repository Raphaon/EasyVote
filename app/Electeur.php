<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{

	protected $fillable = [
		'personne_id',
	];


	public function personne(){
		return $this->belongsTo("App\Personne");
	}

	public function carteDeVote(){
		return $this->hasOne("App\CarteDeVote");
	}
}
