<?php

namespace App\Http\Controllers;

use App;
use Session;

class HomeController extends Controller {
	public function __construct() {
	}

	public function index() {
		return view('welcome');
	}

	public function welcome() {
		$data = [
			'statusCode' => 200,
			'body' => "kala kala",
		];
		echo json_encode($data);
	}

	public function change_language($lang) {
		$l = App::getLocale();
		Session::put('locale', $lang);

		if ($l === $lang) {
			return redirect()->back();
		}
		App::setLocale($lang);

		return redirect()->back();
	}
}
