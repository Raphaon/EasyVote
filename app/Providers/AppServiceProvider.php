<?php

namespace App\Providers;


use App;
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

            $view->with($data);
        });

        // Définition des variables que je veux rendre accessible UNIQUEMENT côté admin
        View::composer('/admin', function ($view) {

            $data = [
                'admin' => Auth::user(),
            ];

            $view->with($data);
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
