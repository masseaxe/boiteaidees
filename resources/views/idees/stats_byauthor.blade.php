@extends('backoff.app')

@section('content')
    <div class="container">
        <div class="row" align="center">
            <h1 class="text-center">Stats :  {{ count($ideas)}} idées</h1>
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
                                                <th colspan="2" >Stats :  {{ count($ideas)}} collaborateurs</th>



                                            </tr>
                                            </thead>
                                            <thead>
                                            <tr>
                                                <th>Nom Collaborateur</th>
                                                <th>Nombre d'idées postées</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($ideas as $idea)
                                                <tr >
                                                    <th><a href="{{action("IdeaController@detail" , array('nom'=>$idea->nom, 'prenom'=>$idea->prenom))}}" title="Modifier">{{$idea->nom}} {{$idea->prenom}}</a></th>
                                                    <th> {{ $idea-> combien}}</th>

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

@endsection