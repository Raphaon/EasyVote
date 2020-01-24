<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{

	protected $fillable = [
        "nom", "prenom", "dateNaiss", "lieuNaiss", "profession_occupation", "nomPere", "nomMere", "domicile_residence", "numCNI", "telephone", "photocniRecto", "photocniVerso", "photoP", "commune_id", "bureau_de_vote_id", "statut_process", 'statut_elements', 'date_inscription',
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

    public function bureauDeVote(){
        return $this->belongsTo("App\BureauDeVote");
    }

    public function getcniPhotoAttribute(){
        return asset("uploads/cni/".$this->photocniRecto);
    }

    public function getcniPhotoVersoAttribute(){
        return asset("uploads/cni/".$this->photocniVerso);
    }

    public function getimgPersonneAttribute(){
        return asset("uploads/personnes/".$this->photoP);
    }
}
