<?php

namespace App\Http\Controllers\Auth;

use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Modification de la variable de redirection par défaut (protected $redirectTo = '/admin';) pour gérer les #tes priorités (voir app\Constants)
     *
     * @var string
     */
    public function redirectTo(){

        // J'enregistre les logs avant de le déconnecter
        $user = Auth::user();
        App\Log::create([
            'user_id' => $user->id,
            'action' => 'login',
            'action_time' => time(),
        ]);
        
        // User priority
        $priority = $user->priority;


        // Check user priority
        switch ($priority) {
            case 2:
                return '/admin';
                break;
            case 1:
                return '/dashboard';
                break; 
            default:
                return '/'; 
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user){
        auth()->login($user);

        // return ;
        return redirect($this->redirectTo());
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // J'enregistre les logs avant de le déconnecter
        $user = Auth::user();        

        App\Log::create([
            'user_id' => $user->id,
            'action' => 'logout',
            'action_time' => time(),
        ]);

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
