<?php

namespace App;


//use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Idea extends Model
{
    //use Scopable;

    public $table = 'ideas';
    public $fillable = array('title', 'description', 'deleted', 'published', 'result', 'prenom','nom','email', 'published_at', 'deleted_at','uniqueId','theme_id');

    public function comments(){
        return $this->hasMany('App\Comment')->where('deleted',0);
    }

    public function rates(){
        return $this->hasMany('App\Rate');
    }

    public function stats(){
        return $this->hasMany('App\Stat');
    }
    
    public function theme(){
        return $this->belongsTo('App\Theme');
    }

    public function getAverageAttribute(){
        return round(Rate::where('idea_id' , $this->id)->avg('score'));
    }

    public function getCountNotesAttribute(){
        return Rate::where('idea_id' , $this->id)->count();
    }

    public static function getNbIdeasMois(){
        $Comptage = DB::table('ideas')->select(DB::raw('count(*) as combien'), DB::raw('month(created_at) as mois'), DB::raw('year(created_at) as annee'))->whereDeleted('0')->groupBy(DB::raw('month(created_at)'),DB::raw('year(created_at)'))->OrderBy(DB::raw('year(created_at)'), 'asc')->OrderBy(DB::raw('month(created_at)'), 'asc')->get();
        return $Comptage;
    }



}
