@extends('backoff.app')

@section('content')
    <div class =container">

        <h4 class="page-title d-inline-block mr-2">Thèmes - Boite à idées</h4>

        <a href="{{action('ThemeController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Ajouter">+ Ajouter</button></a>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="table-responsive">
                                    <table class="table table-hover ajax-action">
                                        <thead>
                                        <tr>
                                            <th>Thème</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($themes as $theme)
                                            <tr>
                                                <th>{{$theme->theme}}</th>

                                                @if (Auth::user() != "")
                                                    <th>
                                                        <a href="{{action("ThemeController@show" , $theme->id)}}" title="Modifier"><i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i></a>
                                                        <a href="{{action("ThemeController@destroy" , $theme->id)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><i class="fa fa fa-fw fa-trash"></i></a>
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
                    {!! str_replace( '/?' , '?' , $themes->appends(\Illuminate\Support\Facades\Input::except('page'))->render() ) !!}
                </ul>
            </nav>
        </div>
    </div>



@endsection