@extends('backoff.app')

@section('content')

    <h1 class="page-title d-inline-block mr-2">Les idées de la boîte</h1>
        <h4>Cliquez sur une idée pour en savoir + et donner votre avis</h4>

    <div class="row mt-5">
        <div class="col-12 grid-margin">
            <div class="table-responsive">
                <table class="table ajax-action table-striped text-center">
                    <thead>
                    <tr>
                        <th>Thème</th>
                        <th>Idée</th>
                        <th>Avis</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($ideas as $idea)
                        <tr>
                            <th><a href="{{action("IdeaController@show" , $idea->uniqueId)}}" title="Modifier">{{$idea->title}}</a></th>
                            <th>{{$idea->description}}</th>
                            <th> @include('idees.stars', array('avg' => $idea->average) )&nbsp;&nbsp; {{$idea->countNotes}}</th>
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