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
	 * Lister et traiter toutes les inscriptions non encore traitées
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
	 */
    public function waiting(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::SUBMITTEDINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->orderBy("date_inscription")->get();
        }

    	$data = [
    		'title' => "Inscriptions non traitées - ELECAM",
    		'inscriptions_w' => $inscs,
    	];

        $data['ord_by'] = $values['ord_by'] ?? ""; //Condition super magique ... je sais pas où la doc se trouve mais ça marche !!

    	return view("dashboard.inscriptions.waiting", $data);
    }

    /**
     * Lister et traiter toes les inscriptions rejetées
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
     */
    public function rejected(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::REJECTEDINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->orderBy("date_inscription")->get();
        }

        $data = [
            'title' => "Inscriptions rejetées - ELECAM",
            'inscriptions_r' => $inscs,
        ];
        $data['ord_by'] = (isset($ord_by)) ? $ord_by : "";

    	return view("dashboard.inscriptions.rejected", $data);
    }

    /**
     * Lister et (eventuellement) traiter toes les inscriptions valides
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
     */
    public function valide(Request $request){
        if(!empty($request->post())){
            $values = $this->loadInscriptions($request, Constants::VALIDEINSCRIPTION); // Appel de la fonction magique
            $inscs = $values['values'];
        }else {
            $inscs = Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->orderBy("date_inscription")->get();
        }

        $data = [
            'title' => "Inscriptions validées - ELECAM",
            'inscriptions_v' => $inscs,
        ];

        $data['ord_by'] = $values['ord_by'] ?? ""; //Condition super magique ... je sais pas où la doc se trouve mais ça marche !!

    	return view("dashboard.inscriptions.valide", $data);
    }

    /**
     * Afficher les détails concernant tous les électeurs (NB: inscrit # electeur)
     */
    public function show_ava_cdv(){
        $inscs = App\Electeur::all();
        // $inscs = Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->orderBy("date_inscription")->get();

        $data = [
            'title' => "Cartes d'Electeurs disponibles - ELECAM",
            'electeurs' => $inscs,
        ];

        return view("dashboard.inscriptions.cdv", $data);
    }

    /**
     * Page qui va montrer plus en détail les infos d'inscription pour le traitement
     * @param [int] $id : id de la personne en question
     */
    public function traitement_insc($id){
        $inscription = App\Personne::find($id);

        // Si la personne n'existe pas on le chasse de cette page ... 
        if(is_null($inscription)){
            return redirect()->back();
        }

        $data = [
            'title' => "Traitement d'inscription - ELECAM",
            'inscription' => $inscription,
            'route_back' => redirect()->back()->getTargetUrl(),
        ];

        return view("dashboard.inscriptions.traitement", $data);
    }

    /**
     * Gestion des infos des electeurs
     */
    public function traitement_el($id){
        $inscription = App\Personne::find($id);

        // Si l'électeur n'existe pas on le chasse de cette page ... 
        if(is_null($inscription->electeur)){
            return redirect()->back();
        }

        $data = [
            'title' => "Traitement d'inscription - ELECAM",
            'inscription' => $inscription,
            'route_back' => redirect()->back()->getTargetUrl(),
        ];

        return view("dashboard.inscriptions.traitement_el", $data);
    }

    /**
     * Ajouter le matricule d'un électeur et éventuellement créer sa carte de vote
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
     */
    public function add_carte_electeur(Request $request){
        $this->validate($request, [
            'personne_id' => 'required',
            'matricule' => "required",
            'date_deliv' => "required",
            // 'statut_cdv' => "required",
        ]);

        // On aura besoin de certaines informations de cette personne
        $personne = App\Personne::find($request->personne_id);
        // Enregistrer le matricule (App\Electeur). Donc on fait un update sur lui

        $electeur = App\Electeur::where('personne_id', $request->personne_id)->first(); // On est pas supposé en avoir 2 de toute façon ..
        $electeur->update([
            'matricule' => $request->matricule,
        ]);

        // Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "AJOUT MATRICULE_ELECTEUR of <strong>". ucwords($personne->nom) ." " . ucwords($personne->prenom) ."(CNI : ".$personne->numCNI.")</strong>",
            'action_time' => time(),
            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        // Créer la carte_de_vote si elle n'existe pas encore
        $carte_de_vote = App\CarteDeVote::where('electeur_id', $electeur->id)->first();

        if(is_null($carte_de_vote)){
            $carte_de_vote = App\CarteDeVote::create([
                'electeur_id' => $electeur->id,
                'dateDeliv' => strtotime($request->date_deliv),
                'statut' => '0', // euhhhh T'ES QUI TOI ???????
                'statutCarte' => Constants::CARDNOTAVAILABLE, // valeur modifiable au niveau de cartes-de-vote-disponibles
            ]);

            $action = "CREATION CARTE_ELECTEUR";
        }else{ // Si la carte existe déjà on fait juste un update ..
            $carte_de_vote->update([
                'electeur_id' => $electeur->id,
                'dateDeliv' => strtotime($request->date_deliv),
                'statut' => '0', // euhhhh T'ES QUI TOI ???????
                'statutCarte' => Constants::CARDNOTAVAILABLE, // valeur modifiable au niveau de cartes-de-vote-disponibles
            ]);

            $action = "MODIFICATION CARTE_ELECTEUR";
        }

        // On récupère les img recto&verso de la carte de vote si elles sont POSTées et on fait le update de la cdv
        $dossier = 'uploads/cdv/';
        // j'upload l'image si elle a été soumise
        if(!is_null($request->cdv_recto)){
            $featured_recto = $request->cdv_recto;
            $featured_new_recto = time() . $featured_recto->getClientOriginalName();
            $featured_recto->move($dossier, $featured_new_recto);
            $carte_de_vote->update([
                'imgRecto' => $featured_new_recto,
            ]);
        }
        if(!is_null($request->cdv_verso)){
            $featured_verso = $request->cdv_verso;
            $featured_new_verso = time() . $featured_verso->getClientOriginalName();
            $featured_verso->move($dossier, $featured_new_verso);
            $carte_de_vote->update([
                'imgVerso' => $featured_new_verso,
            ]);
        }

        // Puis on enregistre le log ..
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "$action de <strong>". ucwords($personne->nom) ." " . ucwords($personne->prenom) ."(CNI : ".$personne->numCNI.")</strong>",
            'action_time' => time(),
            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        $data = [
            'status' => "success",
            'mesg' => "Informations ajoutées avec succès."
        ];

        echo json_encode($data); exit();
    }

    /**
     * Mettre à jour le statut du dossier d'un inscrit
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
     */
    public function updateStatutProcess(Request $request){

        $this->validate($request, [
            'id' => 'required|numeric',
            'statut' => 'required'
        ]);
        extract($_POST); // Pour faciliter l'utilisation des variables

        $person_to_update = Personne::find($id);
        $statut_elements = unserialize($person_to_update->statut_elements);

        if($statut == 1){
            /**
             * !!! D'abord vérifier qu'il y'a au moins un champ rejeté ... !!!
             */
            if($statut_elements){
                $cpt=0;
                // Si on trouve UNE SEULE info rejetée ça nous va ... sinon pourquoi rejeter le dossier ? Conclusion on refuse
                foreach ($statut_elements as $el) {
                    if(strstr($el, '_refuse')){
                        $cpt++; // Pour la suite

                        // On effectue le update
                        $person_to_update->update(['statut_process'=>Constants::REJECTEDINSCRIPTION]);


                        // Puis on enregistre le log
                        App\Log::create([
                            'user_id' => Auth::user()->id,
                            'action' => "REJECT INSCRIPTION de <strong>". ucwords($person_to_update->nom) ." " . ucwords($person_to_update->prenom) ."(CNI : ".$person_to_update->numCNI.")</strong>",
                            'action_time' => time(),
                            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
                        ]);

                        $data = [
                            'status'=>"danger",
                            'mesg' => "Dossier rejeté avec succès !",
                        ];

                        echo json_encode($data);
                        exit(); // Vu qu'il y'a d'autres blocs de code après cette ligne
                    }

                }
                if($cpt==0){ //ie on a aucune info rejetée ... On ne rejette donc pas aussi le dossier .
                    $data = [
                        'mesg' => "Bien vouloir rejeter au moins une information.",
                    ];

                    echo json_encode($data);
                    exit(); // Vu qu'il y'a d'autres blocs de code après cette ligne
                }
            }else{
                $data = [
                    'mesg' => "Bien vouloir sélectionner les informations à rejeter.",
                ];

                echo json_encode($data);
                exit(); // Vu qu'il y'a d'autres blocs de code après cette ligne
            }
        }elseif($statut == 2){
            /**
             * !!! TOUT D'ABORD S'ASSURER QUE TOUS LES CHAMPS ONT BIEN ÉTÉ VALIDÉS !!!
             */
            if($statut_elements){
                foreach ($statut_elements as $el) {
                    // SI AU MOINS un champ n'est pas accepté, on fait riaaaan !
                    if(strstr($el, '_refuse')){ // chaîne de caractère qui montre qu'un uchamp a été rejété ..
                        $data = [
                            'mesg' => "Valider premièrement toutes les informations d'inscription",
                        ];

                        echo json_encode($data);
                        exit(); // Vu qu'il y'a d'autres blocs de code après cette ligne
                    }
                }
            }
            // if(!$statut_elements){ // si il n'a même pas encore check on le chasse .. pian !
            else{ // si il n'a même pas encore check on le chasse .. pian !
                $data = [
                    'mesg' => "Valider premièrement toutes les informations d'inscription",
                ];

                echo json_encode($data);
                exit(); // Vu qu'il y'a d'autres blocs de code après cette ligne
            }

            // A ce stade, il faut valider et instancier la personne ==> electeur

            // On fait le update ssi le dossier n'est pas actuellement déjà validé
            // Pas trop nécesaire de s'attarder ici mais bon ...
            if($person_to_update->statut_process != Constants::VALIDEINSCRIPTION){
                $person_to_update->update(['statut_process'=>Constants::VALIDEINSCRIPTION]);
            }

            // Puis on crée l'electeur si ce n'était pas déjà le cas
            if(count(App\Electeur::where('personne_id',$person_to_update->id)->get()) === 0){
                App\Electeur::create([
                    'personne_id' => $person_to_update->id,
                ]);
            }

            // Puis on enregistre le log
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "VALIDATION INSCRIPTION de <strong>". ucwords($person_to_update->nom) ." " . ucwords($person_to_update->prenom) ."(CNI : ".$person_to_update->numCNI.")</strong>",
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
     * @param [Request] $request : Paramètre soumis en POST lors de la soummission du form
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

        // Puis on enregistre le log
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "ETUDE DOSSIER D'INSCRIPTION de <strong>". ucwords($personne->nom) ." " . ucwords($personne->prenom) ."(CNI : ".$personne->numCNI.")</strong>",
                'action_time' => time(),
                'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

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
            $inscs = Personne::where("statut_process",$statut_process)->orderBy($ord_by)->get();
        }elseif(isset($request->type_filter) && isset($request->value_filter)){
            $type = $request->type_filter;
            $value = $request->value_filter;
        $inscs = array(); // Initialisation d'un tableau allant contenir les inscriptions

        // On commence par bureau_de_vote
        if(strcmp($type, "bureau_de_vote") == 0){
            $inscs = Personne::where([
                "bureau_de_vote_id" => $value,
                    "statut_process" => $statut_process])->get(); // Pour pouvoir effectuer la pagination tranquilos
            // $inscs = App\BureauDeVote::find($value)->personnes;
        }elseif(strcmp($type, "commune") == 0){
            $inscs = Personne::where([
                "commune_id"=>$value,
                    "statut_process" => $statut_process])->get(); // Pour pouvoir effectuer la pagination tranquilos
            // $inscs = App\Commune::find($value)->personnes;
        }elseif(strcmp($type, "departement") == 0){
            /**
             * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
             * pour éviter les foreach etc ...
             * 
             */
            $communes_id = App\Departement::find($value)->communes->pluck('id'); // Je balance les id des communes dans un tableau

            $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",$statut_process)
                                                                  ->get(); // et baaam !
        }elseif(strcmp($type, "region") == 0){
            /**
             * Bon j'utilise les méthodes(hasManyTrough) définies dans les models(Region,Departement,etc...)
             * pour éviter les foreach etc ...
             * 
             */
            $communes_id = App\Region::find($value)->communes->pluck('id'); // Je balance les id des communes dans un tableau

            $inscs = Personne::whereIn('commune_id', $communes_id)->where("statut_process",$statut_process)
                                                                  ->get(); // et baaam !
                                                              }
        }else{ // N'est pas supposé arriver donc ...
            $inscs = Personne::where("statut_process",$statut_process)->orderBy("date_inscription")->get();
        }
        

        $retour['values'] = $inscs;

        return $retour; //array
    }

    public function update_statutCarte(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'statutCarte' => 'required',
        ]);

        $personne = Personne::find($request->id);
        $cdv = App\CarteDeVote::find($personne->electeur->carteDeVote->id);


        if(is_null($cdv)){
            $data = [
                'success' => false,
                'status' => "danger",
                'mesg' => "La Carte d'électeur de cet utilisateur est introuvable.",
            ];

            echo json_encode($data);
            exit();
        }

        // On doit now trouver l'électeur pour faire le update

        if($cdv->update(['statutCarte' => $request->statutCarte])){
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

        // Puis on enregistre le log
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "MISE À JOUR DU STATUT DE LA CARTE D'ELECTEUR de <strong>". ucwords($personne->nom) ." " . ucwords($personne->prenom) ."(CNI : ".$personne->numCNI.")</strong>",
                'action_time' => time(),
                'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

        echo json_encode($data);

    }
}
