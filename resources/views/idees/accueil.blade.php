@extends('backoff.app')

@section('content')
    <div class="container">
        <div class=row">
            <div class="col-md-12" align="center">
                <h1>Pilotage et statistiques</h1>

            </div>
        </div>
        <div class=row">
            <div class="col-md-12" align="center">
                <img src="{{asset('img/statistiques_bleu_bouton2.jpg')}}" class="img-thumbnail">

            </div>
        </div>
        <div class=row">
            <div class="col-md-12" align="center">
                <a href="http://localhost:8888/boiteidees/public/ideas" class="btn btn-primary btn-lg active" role=button" aria-pressed="true">Gérer les idées</a>&nbsp;&nbsp;                <a href="http://localhost:8888/boiteidees/public/themes" class="btn btn-primary btn-lg active" role=button" aria-pressed="true">Gérer les thèmes</a><br><br>
                <a href="http://localhost:8888/boiteidees/public/ideas_stats" class="btn btn-primary btn-lg active" role=button" aria-pressed="true">Stats générales</a><br><br>

                <a href="http://localhost:8888/boiteidees/public/ideas_stats_byauthor" class="btn btn-primary btn-lg active" role=button" aria-pressed="true">Stats : Par collaborateur</a>

                <a href="http://localhost:8888/boiteidees/public/ideas_stats_countIdeas" class="btn btn-primary btn-lg active" role=button" aria-pressed="true">QQ graphes</a><br><br>

            </div>
        </div>
    </div>

@endsection