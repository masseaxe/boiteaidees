<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','IdeaController@index');

Route::resource('ideas','IdeaController');
Route::get('ideas_stats','IdeaController@stats')->middleware('auth');
Route::get('ideas_stats_byauthor','IdeaController@stats_byauthor');
Route::get('ideas_stats_countIdeas','IdeaController@stats_countIdeas');
Route::get('ideas_stats/detail/{nom}/{prenom}','IdeaController@detail');
Route::resource('comments','CommentController');
Route::resource('themes','ThemeController');
Route::resource('rates','RateController');
Route::get('accueil', function(){return view('idees.accueil');});
Route::get('test', function(){return view('idees.test ');});

Route::auth();

Route::get('/home', 'HomeController@index');
