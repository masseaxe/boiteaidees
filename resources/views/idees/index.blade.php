@extends('backoff.app')

@section('content')

    <div class="text-center">
        <h1 class="page-title">Les idées de la boîte</h1>
        <h4 class="d-inline-block">Cliquez sur une idée pour en savoir + et donner votre avis</h4>
    </div>


    <div class="row mt-4">
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
                            <!--<a href="{{action("IdeaController@show" , $idea->uniqueId)}}" title="Modifier"></a>-->
                                <td><span class="badge badge-pink">{{$idea->title}}</span></td>
                                <td><span class="badge badge-dark">{{$idea->description}}</span></td>
                                <td class="text-muted">
                                    @include('idees.stars', array('avg' => $idea->average) )<br>
                                    <i class="fas fa-users pr-1"></i>{{$idea->countNotes}}
                                    <i class="fas fa-comments ml-4 pr-1"></i>{{$idea->countNotes}}

                                </td>
                            @if (Auth::user() != "")
                            <td>
                                <a href="{{action("IdeaController@edit" , $idea->uniqueId)}}" title="Modifier"><i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i></a>
                                <a href="{{action("IdeaController@destroy" , $idea->uniqueId)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><i class="fa fa fa-fw fa-trash"></i></a>
                           </td>
                            @endif
                        </tr></a>
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