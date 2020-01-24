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
use Illuminate\Support\Facades\Input;

class InscriptionsController extends Controller
{    

	/**
	 * Lister et traiter toes les inscriptions non encore traitées
	 */
    public function waiting(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::SUBMITTEDINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        }
        // if(!empty($request->post())){
        //     if(isset($request->order_by)){
        //     // if($this->validate($request, ['order_by'=>'required'])){
        //         $ord_by = $request->order_by;
        //         $inscs = Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->orderBy($ord_by)->paginate(10);
        //     }elseif(isset($request->type_filter) && isset($request->value_filter)){
        //         $type = $request->type_filter;
        //         $value = $request->value_filter;
        //         $inscs = array(); // Initialisation d'un tableau allant contenir les inscriptions

        //         // On commence par bureau_de_vote
        //         if(strcmp($type, "bureau_de_vote") == 0){
        //             $inscs = Personne::where([
        //                     "bureau_de_vote_id" => $value,
        //                     "statut_process" => Constants::SUBMITTEDINSCRIPTION])->paginate(10); // Pour pouvoir effectuer la pagination tranquilos
        //             // $inscs = App\BureauDeVote::find($value)->personnes;
        //         }elseif(strcmp($type, "commune") == 0){
        //             $inscs = Personne::where([
        //                     "commune_id"=>$value,
        //                     "statut_process" => Constants::SUBMITTEDINSCRIPTION])->paginate(10); // Pour pouvoir effectuer la pagination tranquilos
        //             // $inscs = App\Commune::find($value)->personnes;
        //         }elseif(strcmp($type, "departement") == 0){
        //             *
        //              * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
        //              * pour éviter les foreach etc ...
        //              * 
                     
        //             $communes_id = App\Departement::find($value)->pluck('id'); // Je balance les id des communes dans un tableau

        //             $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",Constants::SUBMITTEDINSCRIPTION)
        //                                                                   ->paginate(10); // et baaam !
        //         }elseif(strcmp($type, "region") == 0){
        //             /**
        //              * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
        //              * pour éviter les foreach etc ...
        //              * 
        //              */
        //             $communes_id = App\Region::find($value)->communes->pluck('id'); // Je balance les id des communes dans un tableau

        //             $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",Constants::SUBMITTEDINSCRIPTION)
        //                                                                   ->paginate(10); // et baaam !
        //             // dd(count($inscs));
        //         }
        //     }else{ // N'est pas supposé arriver donc ...
        //         $inscs = Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        //     }
        // }else {
        //     $inscs = Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        // }

    	$data = [
    		'title' => "Inscriptions non traitées - ELECAM",
    		'inscriptions_w' => $inscs,
    	];

        $data['ord_by'] = $values['ord_by'] ?? ""; //Condition super magique ... je sais pas où la doc se trouve mais ça marche !!

    	return view("dashboard.inscriptions.waiting", $data);
    }

    /**
     * Lister et traiter toes les inscriptions rejetées 
     */
    public function rejected(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::REJECTEDINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        }
        // if(!empty($request->post())){
        //     $ord_by = $request->order_by;
        //     $inscs = Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->orderBy($ord_by)->paginate(10);
        // }else {
        //     $inscs = Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        // }

        $data = [
            'title' => "Inscriptions rejetées - ELECAM",
            'inscriptions_r' => $inscs,
        ];
        $data['ord_by'] = (isset($ord_by)) ? $ord_by : "";

    	return view("dashboard.inscriptions.rejected", $data);
    }

    /**
     * Lister et (eventuellement) traiter toes les inscriptions valides
     */
    public function valide(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::VALIDEINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        }
        
        // if(!empty($request->post())){
        //     $ord_by = $request->order_by;
        //     $inscs = Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->orderBy($ord_by)->paginate(10);
        // }else {
        //     $inscs = Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->orderBy("date_inscription")->paginate(10);
        // }

        $data = [
            'title' => "Inscriptions validées - ELECAM",
            'inscriptions_v' => $inscs,
        ];

        $data['ord_by'] = $values['ord_by'] ?? ""; //Condition super magique ... je sais pas où la doc se trouve mais ça marche !!

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
            $person_to_update->update(['statut_process'=>Constants::REJECTEDINSCRIPTION])['values'];

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
    public function updateStatutElements(Request $request){
        $this->validate($request, [
            'name' => "required",
            'prenom' => "required",
            'dateNaiss' => "required",
            'lieuNaiss' => "required",
            'profession_occupation' => "required",
            'nomPere' => "required",
            'nomMere' => "required",
            'domicile_residence' => "required",
            'numCNI' => "required",
            'id_user' => "required|numeric",
        ]);

        $personne = Personne::find($request->id_user);

        if($personne->update(['statut_elements' => serialize($request->post())])){
            $data = [
                'success' => true,
                'status' => "success",
                'mesg' => "ok!",
            ];
        }else{
            $data = [
                'success' => false,
                'status' => "danger",
                'mesg' => "erreur",
            ];
        }

        echo json_encode($data);
    }


    /**
     * Comme je ne veux pas écrire le même code dans plusieurs fonctions, je crée cette fonction ci
     * @param [Request] $request : Bon bahhh pas facile à déviner norrr ...
     * @param [App\Constant] $statut_process : Bon baaaah ... statut du processus du dossier
     * @return [Array] $retour[ord_by,values]
     */
    public function loadInscriptions(Request $request, $statut_process){
        $retour = array(); // Je vais retourner un tableau

        if(isset($request->order_by)){
            // if($this->validate($request, ['order_by'=>'required'])){
            $ord_by = $request->order_by;
            $retour['ord_by'] = $ord_by;
            $inscs = Personne::where("statut_process",$statut_process)->orderBy($ord_by)->paginate(10);
        }elseif(isset($request->type_filter) && isset($request->value_filter)){
            $type = $request->type_filter;
            $value = $request->value_filter;
        $inscs = array(); // Initialisation d'un tableau allant contenir les inscriptions

        // On commence par bureau_de_vote
        if(strcmp($type, "bureau_de_vote") == 0){
            $inscs = Personne::where([
                "bureau_de_vote_id" => $value,
                    "statut_process" => $statut_process])->paginate(10); // Pour pouvoir effectuer la pagination tranquilos
            // $inscs = App\BureauDeVote::find($value)->personnes;
        }elseif(strcmp($type, "commune") == 0){
            $inscs = Personne::where([
                "commune_id"=>$value,
                    "statut_process" => $statut_process])->paginate(10); // Pour pouvoir effectuer la pagination tranquilos
            // $inscs = App\Commune::find($value)->personnes;
        }elseif(strcmp($type, "departement") == 0){
            /**
             * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
             * pour éviter les foreach etc ...
             * 
             */
            $communes_id = App\Departement::find($value)->pluck('id'); // Je balance les id des communes dans un tableau

            $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",$statut_process)
                                                                  ->paginate(10); // et baaam !
                                                              }elseif(strcmp($type, "region") == 0){
            /**
             * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
             * pour éviter les foreach etc ...
             * 
             */
            $communes_id = App\Region::find($value)->communes->pluck('id'); // Je balance les id des communes dans un tableau

            $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",$statut_process)
                                                                  ->paginate(10); // et baaam !
            // dd(count($inscs));
                                                              }
        }else{ // N'est pas supposé arriver donc ...
            $inscs = Personne::where("statut_process",$statut_process)->orderBy("date_inscription")->paginate(10);
        }
        

        $retour['values'] = $inscs;

        return $retour; //array
    }
}
