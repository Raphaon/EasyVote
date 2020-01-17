<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
