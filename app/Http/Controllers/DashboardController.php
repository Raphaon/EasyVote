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
     * Gestion du profile du gérant d'élécam
     */
    public function profile(){
    	$data = [
    		'title' => "Mon profile - ELECAM",
    	];

    	return view("dashboard.profile", $data);
    }
}
