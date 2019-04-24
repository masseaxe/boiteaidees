@extends('backoff.app')

@section('content')



        <div class="container">
            <a href="{{action('ThemeController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i>Retour</a>

            <h3 >

                @if( $theme == null ) Création @else Edition @endif d'un thème  : @if( $theme != null )<small class="text-capitalize">{{$theme->theme}} </small> @endif
            </h3>



        {!! Form::model(
            $theme,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('ThemeController@'.($theme == null ? 'store' : 'update') , $theme),
                'method'    => $theme == null ? 'Post' : 'Put'
            )
        ) !!}



            <div class="col-md-12">
                <div class="form-group">

                    <label for="theme">Nom du thème</label>
                    {!! Form::text( 'theme' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du thème" ) ) !!}
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-plus"></i>Enregister
                    </button>
                </div>
            </div>



        {!! Form::close() !!}

        </div>

@endsection