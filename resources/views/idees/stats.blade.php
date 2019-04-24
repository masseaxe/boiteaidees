@extends('backoff.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <h1>
                                            @if( $title == null )Boîte à idées :  {{ count($ideas)}} idées @else  {{ $title}} @endif
                                        </h1>








                                        <table id="dataStats" class="display">

                                            <thead>
                                            <tr>
                                                <th class="th-sm">Title</th>
                                                <th class="th-sm">Nb de commentaires</th>
                                                <th class="th-sm">Nb de vues</th>
                                                <th class="th-sm">Theme</th>
                                                <th class="th-sm">Note</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($ideas as $idea)
                                                <tr onclick="{{action("IdeaController@show" , $idea->uniqueId)}}">
                                                    <th><a href="{{action("IdeaController@show" , $idea->uniqueId)}}" title="Modifier">{{$idea->title}}</a></th>
                                                    <th> {{ count($idea-> comments)}}</th>
                                                    <th> {{ count($idea-> stats)}}</th>
                                                    <th> {{$idea->Theme->theme}}</th>
                                                    <th data-order={{$idea-> average}}> @include('idees.stars', array('avg' => $idea->average) )</th>

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
