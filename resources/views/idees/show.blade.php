@extends('backoff.app')

@section('content')



    <div id="portes">
        <img src="{{ asset('img/porteG.png') }}" class="portes-img" id="porteG" alt="">
        <img src="{{ asset('img/portelogo.png') }}" class="portes-img" id="portelogo" alt="">
        <img src="{{ asset('img/porteD.png') }}" class="portes-img" id="porteD" alt="">
        <audio autoplay="true" controls class="bgsound">
            <source src="{{ asset('img/door-sound.mp3') }}" type="audio/mpeg">
        </audio> 
    </div>





    <aside>
        <img src="{{ asset('img/boiteaidees.png') }}" alt="">
        <div class="asidepadding">
            <h2 class="titre-aside">Boite à idées</h2>
            <p>Une idée vous trotte dans la tête depuis un moment, partagez-la ici !</p>
        </div>
        <a href="{{action('IdeaController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-1" id="bouton-ajout" title="Ajouter">+ J'ajoute mon idée</button></a>
        <div class="asidepadding">
            <p>Une question ? <br> Le service animation de l'innovation vous répond</p>
        </div>
    </aside>

    <div class="container">
        <h1 class="page-title d-inline-block mr-2">{{$idea->title}}</h1>
        <div class="float-right">
            <a href="{{action('IdeaController@index')}}" class="btn btn-info blanc"><i class="fa fa-angle-left"></i> Retour aux idées</a>
        </div>
        <div class="row soustitre">
            <p class="themes">{{$themes[$idea->theme_id]->theme}}</p>
            <div>
                @include('idees.stars', array('avg' => $idea->average) )&nbsp;&nbsp;
            </div>
            <div>
                <img src="{{ asset('img/group.png') }}" alt="" class="group-img">
                {{$idea->countNotes}} Notes
            </div>
        </div>
        <div class="row">
            <label for="description" class="control-label blancfondnoir">Description :</label>
        </div>
        <div class="description-contenu">{!! $idea->description !!}</div>
        <div class="row" align-self-center></div>
        <div class="row">
            <label for="resultat" class="control-label blancfondnoir">Résultat attendu :</label>
        </div>
        <div class="resultat-contenu">{!! $idea->result !!}</div>
        <div class="notez-box">
            <h4 class="notez">Et vous qu'en pensez-vous ?</h4>
            <br>
            <div class="note-star-box">
                @include('idees.starrating', array('id'=>'idea'))
            </div>
        </div>
        @include('idees.showcomments')
    </div>
@endsection