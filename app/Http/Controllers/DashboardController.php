<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Constants;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => "Dashboard ELECAM | ",
            'nbr_insc_total' => count(App\Personne::all()),
            'nbr_insc_waiting' => count(App\Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->get()),
            'nbr_insc_rejected' => count(App\Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->get()),
            'nbr_insc_valide' => count(App\Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->get()),
            'nbr_gerants' => count(App\User::where("priority",Constants::MANAGERPRIORITY)->get()),
        ];
        return view('dashboard.index', $data);
    }

    /**
     * Gestion du profile du gérant d'élécam
     */
    public function profile(){
    	$data = [
    		'title' => "Mon profile | ",
    	];

    	return view("dashboard.profile", $data);
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
            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
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
                'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
            ]);

            // Ici on le logout....
            auth()->logout();
        }

        return redirect()->route('dashboard.profile');
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
            'level' => Constants::MANAGERLOGSLEVEL, // c-a-d c'est un gérant d'Elecam qui a éffectué l'action
        ]);

        return redirect()->route('dashboard.profile');
    }
}
