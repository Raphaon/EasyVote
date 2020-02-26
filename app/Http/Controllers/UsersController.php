<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Log;
use App\User;
use App\Constants;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	/**
	 * Ressortir tous les gérants d'ELECAM
	 */
	public function all_dashboard(){
		$data = [
			'title' => "Liste des gestionnaires | ",
			'gerants' => User::where('priority', Constants::MANAGERPRIORITY)->get(),
		];

		return view('dashboard.gerants.index', $data);
	}

	/**
	 * Créer un nouveau gestionnaire
	 */
	public function new_dashboard(){
		$data = [
			'title' => "Ajout d'un nouveau gestionnaire | ",
		];

		return view('dashboard.gerants.new', $data);
	}

	/**
	 * Sauvegarder les informations du nouveau gestionnaire
	 * @param [Request] $request : Bon bah tu sais !?!
	 */
	public function save_dashboard(Request $request){
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
		]);

		// On enregistre le user
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "AJOUT D'UN GÉRANT <strong>Email : $request->email </strong>",
            'action_time' => time(),
            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        return redirect()->route('dashboard.gestionnaires.all');
    }
}
