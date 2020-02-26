<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Region;
use App\Commune;
use App\Constants;
use App\Departement;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
	/**
	 * Lister tous les départements
	 */
	public function all(){
		$data = [
			'title' => "Gestion des communes | ",
			'communes' => Commune::orderBy('codeCom', 'asc')->get(),
		];

		return view("admin.communes.index", $data);
	}

	/**
	 * Editer une région
	 * @param [String] $codeCom : Code de la région à éditer
	 */
	public function edit($codeCom){
		$commune = Commune::where('codeCom',$codeCom)->first();
		if(is_null($commune)){
			return redirect()->route('admin.communes.all');
		}

		$data = [
			'title' => "Éditer une commune | ",
			'commune' => $commune,
			'departements' => Departement::all(),
		];

		return view("admin.communes.edit", $data);
	}

	/**
	 * MAJ d'une région
	 */
	public function update(Request $request){
		$this->validate($request, [
			'idCom' => 'required',
			'code_com' => 'required',
			'nom_com' => 'required',
			'departement_id' => 'required',
		]);

		$commune = Commune::find($request->idCom);
		if(is_null($commune)){
			return redirect()->route('admin.communes.all');
		}
		$code_commune = $commune->codeCom;

		$commune->update([
			'codeCom' => $request->code_com,
			'nomCom' => $request->nom_com,
			'departement_id' => $request->departement_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "M.A.J des infos d'une commune. Code Commune : $code_commune ==> $commune->codeCom",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.communes.all');
	}

	/**
	 * Supprimer une région
	 */
	public function delete($codeCom){
		$commune = Commune::where('codeCom',$codeCom)->first();

		if(is_null($commune)){
			return redirect()->route('admin.communes.all');
		}

		$code_commune = $commune->codeCom;

		$commune->delete();

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Suppression d'un département. Code Commune : $code_commune",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.communes.all');

	}

	/**
	 * Form d'ajout d'une nouvelle région
	 */
	public function new(){
		$data = [
			'title' => "Ajouter un département | ",
			'departements' => Departement::all(),
		];

		return view("admin.communes.new", $data);
	}

	/**
	 * Sauvegarder les infos d'une région
	 * @param [Request] $request
	 */
	public function save(Request $request){
		$this->validate($request, [
			'code_com' => 'required',
			'nom_com' => 'required',
			'departement_id' => 'required',
		]);

		Commune::create([
			'codeCom' => $request->code_com,
			'nomCom' => $request->nom_com,
			'departement_id' => $request->departement_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Ajout d'une nouvelle commune. Code Commune : $request->code_com",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.communes.all');

	}
}
