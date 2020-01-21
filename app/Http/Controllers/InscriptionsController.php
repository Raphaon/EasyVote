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
use App\Constants;
use App\Personne;
use Illuminate\Http\Request;

class InscriptionsController extends Controller
{    

	/**
	 * Lister et traiter toes les inscriptions non encore traitées
	 */
    public function waiting(){
    	$data = [
    		'title' => "Inscriptions non traitées - ELECAM",
    		'inscriptions_w' => Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->get(),
    	];

    	return view("dashboard.inscriptions.waiting", $data);
    }

    /**
     * Lister et traiter toes les inscriptions rejetées 
     */
    public function rejected(){
    	$data = [
    		'title' => "Inscriptions rejetées - ELECAM",
    		'inscriptions_r' => Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->get(),
    	];

    	return view("dashboard.inscriptions.rejected", $data);
    }

    /**
     * Lister et (eventuellement) traiter toes les inscriptions valides
     */
    public function valide(){
    	$data = [
    		'title' => "Inscriptions valides - ELECAM",
    		'inscriptions_v' => Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->get(),
    	];

    	return view("dashboard.inscriptions.valide", $data);
    }

    /**
     * Mettre à jour le statut du dossier d'un inscrit
     */
    public function updateStatutProcess(){
        echo json_encode("updateStatutProcess");
    }

    /**
     * Mettre à jour le statut des différents éléments du dossier d'un inscrit
     */
    public function updateStatutElements(){
        echo json_encode("updateStatutElements");
    }
}
