<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**
	 * Charger les régions|Departements|Communes|BureauDeVote en Ajax
	 */
	public function loadValues(Request $request){
		$this->validate($request, [
			'filter_type' => "required",
		]);

		if($request->filter_type === "region"){
			foreach (App\Region::all() as $region) {
				$values[] = [
					'id' => $region->id,
					'nom' => $region->nomReg,
				];
			}
			$data = [
				'statut' => true,
				'values' => $values,
			];
		}elseif($request->filter_type === "departement"){
			foreach (App\Departement::all() as $departement) {
				$values[] = [
					'id' => $departement->id,
					'nom' => $departement->nomDep,
				];
			}
			$data = [
				'statut' => true,
				'values' => $values,
			];
		}elseif($request->filter_type === "commune"){
			foreach (App\Commune::all() as $commune) {
				$values[] = [
					'id' => $commune->id,
					'nom' => $commune->nomCom,
				];
			}
			$data = [
				'statut' => true,
				'values' => $values,
			];
		}elseif($request->filter_type === "bureau_de_vote"){
			foreach (App\BureauDeVote::all() as $bdv) {
				$values[] = [
					'id' => $bdv->id,
					'nom' => $bdv->nomBureau,
				];
			}
			$data = [
				'statut' => true,
				'values' => $values,
			];
		}else{
			$data = [
				'statut' => false,
				'values' => null,
			];
		}

		echo json_encode($data); // Et on balance la soupe ..
	}
}
