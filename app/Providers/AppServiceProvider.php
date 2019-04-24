<?php

namespace App\Providers;

use App\Idea;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Rate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * $value : valeur de l'email saisi
     * $attribute : nom du paremètre passé ici email
     * $parameters : paramètre donné derrière voteunique
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_email',function($attribute, $value, $parameters){
            //dd($attribute);
            //dd(substr(strtolower($value),-22));
            return substr(strtolower($value),-22) == '@ca-normandie-seine.fr';
            //return substr($value, 0,3) == '+91';
        });

        Validator::extend('voteunique',function($attribute, $value, $parameters){
            $idea= Idea::where('uniqueId',$value)->first();
            return Rate::whereEmail($parameters[0])->whereIdea_id($idea->id)->count() == 0;
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
