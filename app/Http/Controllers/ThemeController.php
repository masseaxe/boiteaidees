<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;


use App\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $themes = Theme::orderBy('theme')->whereDeleted('0')->paginate(10);
        //$themes = Theme::all();
        //dump($ideas);
        //dump($themes);
        return view('idees.theme' , compact('themes') );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = null;
        return view('idees.editTheme' , compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = Theme::create( $request->only('theme') );
        return redirect(action('ThemeController@index'))->with('success' , "Le thème {$theme->theme} a bien été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::findOrFail($id);
        return view('idees.editTheme' , compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);
        $theme->update( $request->only('theme' ) );
        return redirect()->back()->with('success' , "Le thème vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->update( array('deleted' => '1'));
        return redirect(URL::previous())->with('success' , 'Le thème a bien été supprimé');
    }
}
