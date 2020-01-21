<?php

	/*
    |--------------------------------------------------------------------------
    | InscriptionsController
    | 
    | Les actions à effectuer sur une inscription seront effectuées ici ...
    |--------------------------------------------------------------------------
    */
namespace App\Http\Controllers;

use App;
use Auth;
use App\Personne;
use App\Constants;
use Illuminate\Http\Request;

class InscriptionsController extends Controller
{    

	/**
	 * Lister et traiter toes les inscriptions non encore traitées
	 */
    public function waiting(){
    	$data = [
    		'title' => "Inscriptions non traitées - ELECAM",
    		'inscriptions_w' => Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->paginate(10),
    	];

    	return view("dashboard.inscriptions.waiting", $data);
    }

    /**
     * Lister et traiter toes les inscriptions rejetées 
     */
    public function rejected(){
    	$data = [
    		'title' => "Inscriptions rejetées - ELECAM",
    		'inscriptions_r' => Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->paginate(10),
    	];

    	return view("dashboard.inscriptions.rejected", $data);
    }

    /**
     * Lister et (eventuellement) traiter toes les inscriptions valides
     */
    public function valide(){
    	$data = [
    		'title' => "Inscriptions valides - ELECAM",
    		'inscriptions_v' => Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->paginate(10),
    	];

    	return view("dashboard.inscriptions.valide", $data);
    }

    /**
     * Mettre à jour le statut du dossier d'un inscrit
     */
    public function updateStatutProcess(Request $request){

        $this->validate($request, [
            'id' => 'required|numeric',
            'statut' => 'required'
        ]);
        extract($_POST); // Pour faciliter l'utilisation des variables

        $person_to_update = Personne::find($id);

        if($statut == 1){
            // On effectue le update
            $person_to_update->update(['statut_process'=>Constants::REJECTEDINSCRIPTION]);

            // Puis on enregistre le log
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "REJECTEDINSCRIPTION of ". $person_to_update->nom ." " . $person_to_update->prenom ."(CNI : ".$person_to_update->numCNI.")",
                'action_time' => time(),
                'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

            $data = [
                'status'=>"danger",
                'mesg' => "Dossier rejeté avec succès !",
            ];
        }elseif($statut == 2){
            // A ce stade, il faut valider et instancier la personne ==> electeur
            $person_to_update->update(['statut_process'=>Constants::VALIDEINSCRIPTION]);

            App\Electeur::create([
                'personne_id' => $person_to_update->id,
            ]);

            // Puis on enregistre le log
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "VALIDEINSCRIPTION of ". $person_to_update->nom ." " . $person_to_update->prenom ."(CNI : ".$person_to_update->numCNI.")",
                'action_time' => time(),
                'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

            $data = [
                'status'=>"success",
                'mesg' => "Dossier validé avec succès !",
            ];
        }else{
            $data = [
                'status' => "warning",
                'mesg' => "An error occured. Please try again .."
            ];
        }

        echo json_encode($data);
    }

    /**
     * Mettre à jour le statut des différents éléments du dossier d'un inscrit
     */
    public function updateStatutElements(){
        echo json_encode("updateStatutElements");
    }
}
