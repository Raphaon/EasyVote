<?php

namespace App\Http\Controllers;

use App;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('welcome');
    }

    public function change_language($lang){
        $l = App::getLocale();
        if($l === $lang){
            return redirect()->back();
        }
        App::setLocale($lang);

        return redirect()->back();
    }
}
