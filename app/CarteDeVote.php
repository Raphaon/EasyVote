<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarteDeVote extends Model
{
    protected $fillable = [
    	'imgRecto', 'imgVerso', 'dateDeliv', 'compteARebours', 'statut', 'electeur_id', 'statutCarte',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function electeur(){
    	return $this->belongsTo("App\Electeur");
    }

    public function getcdvRectoAttribute(){
        return asset("uploads/cdv/".$this->imgRecto);
    }

    public function getcdvVersoAttribute(){
        return asset("uploads/cdv/".$this->imgVerso);
    }
}