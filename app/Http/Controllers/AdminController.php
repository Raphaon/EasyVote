<?php

	/*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | AdminController
    |
    | Toutes les fonctions principales du côté admin seront retrouvées ici
    |
    */

namespace App\Http\Controllers;

use App;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $data = [
            'title' => "Dashboard | "
        ];
        return view('admin.index', $data);
    }

    /**
     * Afficher les logs qu'un gérant d'Elecam peut voir
     */
    public function logs(){
        $data = [
            'title' => "Logs du système - Admin",
            'logs' => App\Log::orderBy('action_time', 'desc')->get(),
        ];

        return view("admin.logs", $data);
    }
}
