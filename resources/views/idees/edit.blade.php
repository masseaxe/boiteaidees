@extends('backoff.app')

@section('content')



    <div class="container">

        <h4 class="page-title d-inline-block mr-2">
            @if( $idea == null ) Saisie @else Édition @endif d'une idée @if( $idea != null ) @endif
        </h4>

        <div class="float-right">
            <a href="{{action('IdeaController@index')}}" class="btn btn-info blanc"><i class="fa fa-angle-left"></i>Retour aux idées</a>
        </div>

        {!! Form::model(
            $idea,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('IdeaController@'.($idea == null ? 'store' : 'update') , ($idea != null ? $idea->uniqueId : null)),
                'method'    => $idea == null ? 'Post' : 'Put'
            )
        ) !!}


    <div class="row noflex">
        <div class="col-md-4">
            <div class="form-group">
                <h6>Titre</h6>
                {!! Form::text( 'title' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le titre de l idée" ) ) !!}
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Domaine</h6>
                    <select name="theme_id" id="theme_id" class="form-control">
                        @foreach($themes as $theme)
                            <option value="{{$theme->id}}">{{$theme->theme}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h6>Description</h6>
                {!! Form::textarea( 'description' , null ,['rows' => 3, 'cols' => 54 ], array( 'class' => 'form-control' , 'placeholder' => "Saisissez la description de l'idée" ) ) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <h6>Résultat attendu</h6>
                {!! Form::textarea( 'result' , null , ['rows' => 2, 'cols' => 54 ], array( 'class' => 'form-control' , 'placeholder' => "Saisissez le résultat attendu" ) ) !!}
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h6>Nom</h6>
                    {!! Form::text( 'nom' , ((Auth::user() AND $idea == null)? 'Verpy' : null) , array( 'class' => 'form-control'  ) ) !!}
                </div>
                <div class="form-group">
                    <h6>Prénom</h6>
                    {!! Form::text( 'prenom' , ((Auth::user() AND $idea == null)? 'Hélène' : null) , array( 'class' => 'form-control' ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h6>Email</h6>
                    {!! Form::text( 'email' , ((Auth::user() AND $idea == null)? 'helene.verpy@ca-normandie-seine.fr' : null) , array( 'class' => 'form-control' , 'placeholder' => "Entrer un email" ) ) !!}
                </div>
            </div>
        </div>



    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Enregister
                </button>
            </div>
        </div>
    </div>

    </div>

    {!! Form::close() !!}

    </div>
    @if( $idea != null )

       @include('idees.showcomments')
    @endif




@endsection