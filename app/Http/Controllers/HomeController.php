<?php

namespace App\Http\Controllers;

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

    public function change_language(CookieJar $cookieJar,$lang)
    {
        $minutes = 86400;
        $cookieJar->queue(cookie('locale', $lang, 86400));
        Session::put('locale', $lang);
        $l = App::getLocale();
        if($l === $lang){
            return redirect()->back();
        }
        App::setLocale($lang);

        return redirect()->back();
    }
}
