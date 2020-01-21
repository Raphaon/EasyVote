<?php

namespace App\Providers;


use App;
use Auth;
use App\Constants;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Définition des variables que je veux rendre accessible dans des groupes de route
        View::composer('*', function ($view) {
            $lang = App::getLocale('locale');
            if($lang=="en"){
                $r_lang = "fr";
            }else{
                $r_lang == "en";
            }

            $data = [
                'lang' => $lang,
                'r_lang' => $r_lang,
            ];

            View::share($data);
        });

        // Définition des variables que je veux rendre accessible UNIQUEMENT côté admin
        View::composer('admin.*', function ($view) {

            $data = [
                'admin' => Auth::user(),
            ];

            View::share($data);
        });

        // Définition des variables que je veux rendre accessible UNIQUEMENT côté dashboard (gérant elecam)
        View::composer('dashboard.*', function ($view) {

            
            $data = [
                'admin' => Auth::user(),
                'nbr_insc_waiting' => count(App\Personne::where("statut_process",Constants::SUBMITTEDINSCRIPTION)->get()),
                'nbr_insc_rejected' => count(App\Personne::where("statut_process",Constants::REJECTEDINSCRIPTION)->get()),
                // 'nbr_insc_valide' => count(App\Personne::where("statut_process",Constants::VALIDEINSCRIPTION)->get()),
            ];

            View::share($data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
