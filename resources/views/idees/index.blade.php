@extends('backoff.app')

@section('content')


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
        <div class="ligne" id="titre-box">
            <div>
                <h3 class="page-title d-inline-block mr-2" id="grand-titre">Les idées de la boîte</h3>
                <p class="page-subtitle">Cliquez sur une idée pour en savoir + et donner votre avis</p>
            </div>
            <a href="{{action('IdeaController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-1" id="bouton-ajout" title="Ajouter">+ J'ajoute mon idée</button></a>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-hover ajax-action">
                                        <thead>
                                        <tr>
                                            <th>Thème</th>
                                            <th>Idée</th>
                                            <th>Résultat</th>
                                            <th>Avis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($ideas as $idea)
                                            <tr>
                                                <th class="themes-box"><a href="{{action("IdeaController@show" , $idea->uniqueId)}}" title="Modifier" class="themes">{{$idea->title}}</a></th>
                                                <th class="idees-box"> <p class="idees">{{$idea->description}}</p></th>
                                                <th>{{$idea->result}}</th>
                                                <th> @include('idees.stars', array('avg' => $idea->average) )&nbsp;&nbsp; <br>
                                                    <div class="ligne">
                                                        <div>
                                                            <img src="{{ asset('img/group.png') }}" alt="" class="group-img">
                                                            {{$idea->countNotes}}
                                                        </div>
                                                        <div>
                                                            <img src="{{ asset('img/conversation.png') }}" alt="" class="conv-img">
                                                            {{$idea->Comments->count()}}
                                                        </div>
                                                    </div>
                                                </th>
                                                @if (Auth::user() != "")
                                                <th>
                                                    <a href="{{action("IdeaController@edit" , $idea->uniqueId)}}" title="Modifier"><i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i></a>
                                                    <a href="{{action("IdeaController@destroy" , $idea->uniqueId)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><i class="fa fa fa-fw fa-trash"></i></a>
                                                </th>
                                                @endif
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="float-right">
                <ul id="tab" class="pagination">
                    {!! str_replace( '/?' , '?' , $ideas->appends(\Illuminate\Support\Facades\Input::except('page'))->render() ) !!}
                </ul>
            </nav>
        </div>
    </div>

@endsection