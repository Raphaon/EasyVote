<?php

	/*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | AdminController
    |
    | Toutes les fonctions principales du côté admin seront retrouvées ici
    |
    */

namespace App\Http\Controllers;

use App;
use App\Constants;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $data = [
            'title' => "Dashboard | "
        ];
        return view('admin.index', $data);
    }

    /**
     * Afficher les logs qu'un gérant d'Elecam peut voir
     */
    public function logs(){
        $data = [
            'title' => "Logs du système - Admin",
            'logs' => App\Log::orderBy('action_time', 'desc')->get(),
        ];

        return view("admin.logs", $data);
    }

    /**
     * Gestion du profile d'un super-admin
     */
    public function profile(){
        $data = [
            'title' => "Mon profile | ",
        ];

        return view("admin.profile", $data);
    }

    public function update_profile(Request $request){
        $this->validate($request, [
            'name' => "required",
            'email' => 'required|email',
            'actual_password' => 'required|hashmatch:password',
        ]);

        // Si le mot de passe actuel n'est pas bon, on enreg le log et on le logout ... AH OUI !

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        // Puis on enregistre le log ..
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "MISE À JOUR DES INFORMATIONS de <strong>". ucwords($user->name) ."</strong>",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        // Vérification de l'authenticité des mots de passe
        if(!is_null($request->password) || !is_null($request->password_verification)){
            $this->validate($request, [
                'password' => 'required',
                'password_verification' => 'required|same:password',
            ]);

            $user->update([
                'password' => bcrypt($request->password),
            ]);

            // Puis on enregistre le log ..
            App\Log::create([
                'user_id' => Auth::user()->id,
                'action' => "MODIFICATION DU MOT DE PASSE de <strong>". ucwords($user->name) ."</strong>",
                'action_time' => time(),
                'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

            // Ici on le logout....
            auth()->logout();
        }

        return redirect()->route('admin.profile');
    }

    public function update_profile_thhumb(Request $request){
        $this->validate($request, [
            'thumb' => 'required|image',
        ]);

        $featured_thumb = $request->thumb;
        $featured_new_thumb = time() . $featured_thumb->getClientOriginalName();
        $featured_thumb->move('manager/images/', $featured_new_thumb);

        $user = auth()->user();

        $user->update([
            'profile_img' => $featured_new_thumb
        ]);

        // Puis on enregistre le log ..
        App\Log::create([
            'user_id' => Auth::user()->id,
            'action' => "MISE À JOUR DE LA PHOTO DE PROFILE de <strong>". ucwords($user->name) ."</strong>",
            'action_time' => time(),
            'level' => Constants::ADMINLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        return redirect()->route('admin.profile');
    }
}
