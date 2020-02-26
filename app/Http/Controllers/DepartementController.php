<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Region;
use App\Departement;
use App\Constants;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
	/**
	 * Lister tous les départements
	 */
	public function all(){
		$data = [
			'title' => "Gestion des départements | ",
			'departements' => Departement::orderBy('codeDep', 'asc')->get(),
		];

		return view("admin.departements.index", $data);
	}

	/**
	 * Editer une région
	 * @param [String] $codeDep : Code de la région à éditer
	 */
	public function edit($codeDep){
		$departement = Departement::where('codeDep',$codeDep)->first();
		if(is_null($departement)){
			return redirect()->route('admin.departements.all');
		}

		$data = [
			'title' => "Éditer un département | ",
			'departement' => $departement,
			'regions' => Region::all(),
		];

		return view("admin.departements.edit", $data);
	}

	/**
	 * MAJ d'une région
	 */
	public function update(Request $request){
		$this->validate($request, [
			'idDep' => 'required',
			'code_dep' => 'required',
			'nom_dep' => 'required',
			'region_id' => 'required',
		]);


		$departement = Departement::find($request->idDep);
		if(is_null($departement)){
			return redirect()->route('admin.departements.all');
		}
		$code_departement = $departement->codeDep;

		$departement->update([
			'codeDep' => $request->code_dep,
			'nomDep' => $request->nom_dep,
			'region_id' => $request->region_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "M.A.J des infos d'un département. Code Departement : $code_departement ==> $departement->codeDep",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.departements.all');
	}

	/**
	 * Supprimer une région
	 */
	public function delete($codeDep){
		$departement = Departement::where('codeDep',$codeDep)->first();

		if(is_null($departement)){
			return redirect()->route('admin.departements.all');
		}

		$code_departement = $departement->codeDep;

		$departement->delete();

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Suppression d'un département. Code Departement : $code_departement",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.departements.all');

	}

	/**
	 * Form d'ajout d'une nouvelle région
	 */
	public function new(){
		$data = [
			'title' => "Ajouter un département | ",
			'regions' => Region::all(),
		];

		return view("admin.departements.new", $data);
	}

	/**
	 * Sauvegarder les infos d'une région
	 * @param [Request] $request
	 */
	public function save(Request $request){
		$this->validate($request, [
			'code_dep' => 'required',
			'nom_dep' => 'required',
			'region_id' => 'required',
		]);


		Departement::create([
			'codeDep' => $request->code_dep,
			'nomDep' => $request->nom_dep,
			'region_id' => $request->region_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Ajout d'un nouveau département. Code Departement : $request->code_dep",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.departements.all');

	}
}
