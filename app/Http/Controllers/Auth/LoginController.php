<?php

namespace App\Http\Controllers\Auth;

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

        // User priority
        $priority = Auth::user()->priority;

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
}
