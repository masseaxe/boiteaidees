<?php

namespace App\Http\Controllers;

use App\Stat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Idea;
use App\Theme;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class IdeaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ideas = Idea::orderBy('title')->whereDeleted('0')->paginate(5);
        $ideas->load('Comments');
        $themes = Theme::all();
        return view('idees.index' , compact('ideas', 'themes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idea = null;
        $themes = Theme::all();
        return view('idees.edit' , compact('idea', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\IdeaRequest  $request)
    {

        $data = $request -> all();
       //dd($data);
        $data = array_merge(($request->all()),array("uniqueId"=>uniqid()));
        $idea = Idea::create($data);
        return redirect()->action('IdeaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uniqueId)
    {
        // firts -> pd la 1ere entité de la collection que retourne get.
        $idea= Idea::where('uniqueId',$uniqueId)->first();


        //$idea = Idea::findOrFail($id);
        //$idea->load('Comments');

        $themes = Theme::all();
        $stat = Stat::create(array('idea_id' => $idea->id));

        return view('idees.show', compact('idea', 'themes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uniqueId)
    {

        $idea= Idea::where('uniqueId',$uniqueId)->first();

        //$idea = Idea::findOrFail($id);
        //$idea->load(['Comments' => function ($query) {
        //    $query->whereDeleted('0');
        //}]);
        //dd($idea->id);
        $comments = Comment::where('idea_id',$idea->id)->whereDeleted('0')->get();
        //dd($comments);
        $themes = Theme::all();
        //dd($idea);
        //die();

        return view('idees.edit', compact('idea', 'themes', 'comments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        //$idea = Idea::findOrFail($id);
        $idea= Idea::where('uniqueId',$uniqueId)->first();
        //dd(\Request::all());
        //dd('update');
        $datas = $request->all();

        $idea->update($datas);
        return redirect()->back()->with('success' , "L'idée vient d'être mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uniqueId)
    {
        $idea= Idea::where('uniqueId',$uniqueId)->first();
        //$date = now();
        $idea->update( array('deleted' => '1', 'deleted_at' => Carbon::now() ));
        return redirect(URL::previous())->with('success' , 'L idée a bien été supprimée');
    }


    public function stats()
    {
        $ideas = Idea::orderBy('title')->whereDeleted('0')->get();
        $ideas->load('Theme');
        $title="";
        //dd($ideas);
        return view('idees.stats', compact('ideas', 'title'));

    }


    public function stats_byauthor()
    {
        //$ideas = Idea::orderBy('nom')->whereDeleted('0')->get();
        //$ideas = DB::table('ideas')->select(DB::raw('count(*) as combien'), DB::raw('month(created_at)'), DB::raw('year(created_at)'))->whereDeleted('0')->groupBy(DB::raw('month(created_at)'),DB::raw('year(created_at)'))->OrderBy(DB::raw('month(created_at)'), 'asc')->get();

        $ideas = Idea::select(DB::raw('count(*) as combien'), 'nom', 'prenom', 'uniqueId','title')->whereDeleted('0')->groupBy('nom','prenom')->get();
        //var_dump($ideas);
        return view('idees.stats_byauthor', compact('ideas'));

    }

    public function detail($nom, $prenom)
    {

        //$collaborateur = explode("*", $nom);
        //dd($collaborateur[1]);
        $ideas = Idea::orderBy('title')->whereDeleted('0')->whereNom($nom)->wherePrenom($prenom)->get();
        $title = "Idées de ".$nom." ".$prenom;
        //var_dump($ideas);
        //die("hello");
        return view('idees.stats', compact('ideas','title'));

    }

    public function stats_bytheme()
    {
        //$ideas = Idea::orderBy('nom')->whereDeleted('0')->get();
        //$ideas = DB::table('ideas')->select(DB::raw('count(*) as combien'), DB::raw('month(created_at)'), DB::raw('year(created_at)'))->whereDeleted('0')->groupBy(DB::raw('month(created_at)'),DB::raw('year(created_at)'))->OrderBy(DB::raw('month(created_at)'), 'asc')->get();

        $ideas = Idea::select(DB::raw('count(*) as combien'), 'theme_id')->whereDeleted('0')->groupBy('theme_id')->orderBy('theme_id')->get();
        var_dump($ideas);
        return view('idees.stats_bytheme', compact('ideas'));

    }



    public function stats_countIdeas()
    {
        //$ideas = Idea::orderBy('stats')->whereDeleted('0')->get();
        $resultVues = DB::table('ideas')->join('stats', 'ideas.id', '=', 'stats.idea_id')->select(DB::raw('count(*) as views'), 'title')->where('ideas.deleted','0')->groupBy('idea_id')->orderBy('views', 'DESC')->get();
        //dd($resultVues);
        $resultTheme = DB::table('ideas')->join('themes', 'theme_id', '=', 'themes.id')->select(DB::raw('count(*) as combien'), 'theme_id','themes.theme')->where('themes.deleted','0')->groupBy('theme_id')->orderBy('theme_id')->get();
        //dd($resultTheme);

        $comptage = Idea::getNbIdeasMois();
        $comptage[3] = (object) array(
            'combien' => 7,
            'mois' => 3,
            'annee' => 2019
        );
        $comptage[4] = (object) array(
            'combien' => 5,
            'mois' => 4,
            'annee' => 2019
        );
        $comptage[5] = (object) array(
            'combien' => 0,
            'mois' => 5,
            'annee' => 2019
        );
        $comptage[6] = (object) array(
        'combien' => 3,
        'mois' => 6,
        'annee' => 2019
        );

        return view('idees.stats_countIdeas', compact('comptage','resultTheme', 'resultVues'));

    }




}
