<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Region;
use App\Commune;
use App\BureauDeVote;
use App\Constants;
use App\Departement;
use Illuminate\Http\Request;

class BureauDeVoteController extends Controller
{
	/**
	 * Lister tous les départements
	 */
	public function all(){
		$data = [
			'title' => "Gestion des Bureaux de Vote | ",
			'bureaux_de_vote' => BureauDeVote::orderBy('id', 'asc')->get(),
		];

		return view("admin.bureau_de_vote.index", $data);
	}

	/**
	 * Editer une région
	 * @param [String] $id : Code de la région à éditer
	 */
	public function edit($id){
		$b_d_v = BureauDeVote::find($id);
		if(is_null($b_d_v)){
			return redirect()->route('admin.bureau_de_vote.all');
		}

		$data = [
			'title' => "Éditer une commune | ",
			'b_d_v' => $b_d_v,
			'communes' => Commune::all(),
		];

		return view("admin.bureau_de_vote.edit", $data);
	}

	/**
	 * MAJ d'une région
	 */
	public function update(Request $request){
		$this->validate($request, [
			'id' => 'required',
			'nomBureau' => 'required',
			'commune_id' => 'required',
		]);

		$b_d_v = BureauDeVote::find($request->id);
		if(is_null($b_d_v)){
			return redirect()->route('admin.bureau_de_vote.all');
		}

		$nom_bdv = $b_d_v->nomBureau;

		$b_d_v->update([
			'nomBureau' => $request->nomBureau,
			'commune_id' => $request->commune_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "M.A.J des infos d'un bureau de vote. Nom bureau de vote : $$nom_bdv ==> $b_d_v->nomBureau",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.bureau_de_vote.all');
	}

	/**
	 * Supprimer une région
	 */
	public function delete($id){
		$b_d_v = BureauDeVote::find($id);

		if(is_null($b_d_v)){
			return redirect()->route('admin.bureau_de_vote.all');
		}

		$nom_bdv = $b_d_v->nomBureau;

		$b_d_v->delete();

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Suppression d'un bureau de vote. Code Bureau de Vote : $nom_bdv",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.bureau_de_vote.all');

	}

	/**
	 * Form d'ajout d'une nouvelle région
	 */
	public function new(){
		$data = [
			'title' => "Ajouter un département | ",
			'communes' => Commune::all(),
		];

		return view("admin.bureau_de_vote.new", $data);
	}

	/**
	 * Sauvegarder les infos d'une région
	 * @param [Request] $request
	 */
	public function save(Request $request){
		$this->validate($request, [
			'nomBureau' => 'required',
			'commune_id' => 'required',
		]);

		BureauDeVote::create([
			'nomBureau' => $request->nomBureau,
			'commune_id' => $request->commune_id,
		]);

		// Puis on enregistre le log
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "Ajout d'un nouveau bureau de vote. Nom bureau de vote : $request->nomBureau",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un admin qui a éffectué l'action
        ]);

        return redirect()->route('admin.bureau_de_vote.all');

	}
}
