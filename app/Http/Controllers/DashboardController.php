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
        ];
        return view('dashboard.index', $data);
    }

    /**
     * Afficher les logs qu'un gérant d'Elecam peut voir
     */
    public function logs(){
    	$data = [
    		'title' => "Logs du système - ELECAM",
    		'logs' => App\Log::where("level", '<>', Constants::ADMINLOGSLEVEL)->orderBy('action_time', 'desc')->get(),
    	];

    	return view("dashboard.logs", $data);
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
