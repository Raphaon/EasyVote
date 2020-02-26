<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Region;
use App\Constants;
use Illuminate\Http\Request;

class RegionController extends Controller
{
	/**
	 * Lister toutes les régions
	 */
	public function all(){
		$data = [
			'title' => "Gestion des régions | ",
			'regions' => Region::orderBy('codeReg', 'asc')->get(),
		];

		return view("admin.regions.index", $data);
	}

	/**
	 * Editer une région
	 * @param [String] $codeReg : Code de la région à éditer
	 */
	public function edit($codeReg){
		$region = Region::where('codeReg',$codeReg)->first();
		if(is_null($region)){
			return redirect()->route('admin.regions.all');
		}

		$data = [
			'title' => "Éditer une région | ",
			'region' => $region,
		];

		return view("admin.regions.edit", $data);
	}

	/**
	 * MAJ d'une région
	 */
	public function update(Request $request){
		$this->validate($request, [
			'idReg' => 'required',
			'code_reg' => 'required',
			'nom_reg' => 'required',
		]);

		$region = Region::find($request->idReg);
		if(is_null($region)){
			return redirect()->route('admin.regions.all');
		}
		$code_region = $region->codeReg;

		$region->update([
			'codeReg' => $request->code_reg,
			'nomReg' => $request->nom_reg,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "M.A.J des infos d'une région. Code Region : $code_region ==> $region->codeReg",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.regions.all');
	}

	/**
	 * Supprimer une région
	 */
	public function delete($codeReg){
		$region = Region::where('codeReg',$codeReg)->first();

		if(is_null($region)){
			return redirect()->route('admin.regions.all');
		}

		$code_region = $region->codeReg;

		$region->delete();

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Suppression d'une région. Code Region : $code_region",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.regions.all');

	}

	/**
	 * Form d'ajout d'une nouvelle région
	 */
	public function new(){
		$data = [
			'title' => "Ajouter une région | ",
		];

		return view("admin.regions.new", $data);
	}

	/**
	 * Sauvegarder les infos d'une région
	 * @param [Request] $request
	 */
	public function save(Request $request){
		$this->validate($request, [
			'code_reg' => 'required',
			'nom_reg' => 'required',
		]);

		Region::create([
			'codeReg' => $request->code_reg,
			'nomReg' => $request->nom_reg,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Ajout d'une nouvelle région. Code Region : $request->code_reg",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.regions.all');

	}
}
