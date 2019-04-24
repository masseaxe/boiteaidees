@extends('backoff.app')

@section('content')
    <div class="container">


    <h1 class="page-title d-inline-block mr-2">
        Titre : {{$idea->title}}
    </h1>

    <div class="float-right">
        <a href="{{action('IdeaController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        <div class="row">


                <label for="theme" class="col-md-3 control-label">Thème :</label>
            {{$themes[$idea->theme_id]->theme}}

        </div>

    <div class="row">

        <label for="description" class="col-md-3 control-label">Description :</label>  <div class="col-md-4" >{!! $idea->description !!}</div>

    </div>
    <div class="row" align-self-center></div>
    <div class="row">


                <label for="resultat" class="col-md-3  control-label">Résultat attendu :</label>
                 <div class="col-md-4">{!! $idea->result !!}</div>


    </div>
    <div>
        <h4>Noter l'idée</h4>
    </div>

    @include('idees.starrating', array('id'=>'idea'))








    @include('idees.showcomments')
    </div>

@endsection