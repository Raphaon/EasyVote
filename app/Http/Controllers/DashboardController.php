<?php

namespace App\Http\Controllers;

use App;
// use Auth;
use App\Constants;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => "Dashboard ELECAM | ",
            'nbr_insc_total' => count(App\Personne::all()),
            'nbr_insc_waiting' => count(App\Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->get()),
            'nbr_insc_rejected' => count(App\Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->get()),
            'nbr_insc_valide' => count(App\Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->get()),
            'nbr_gerants' => count(App\User::where("priority",Constants::MANAGERPRIORITY)->get()),
        ];
        return view('dashboard.index', $data);
    }

    /**
     * Gestion du profile du gérant d'élécam
     */
    public function profile(){
    	$data = [
    		'title' => "Mon profile - ELECAM",
    	];

    	return view("dashboard.profile", $data);
    }
}
