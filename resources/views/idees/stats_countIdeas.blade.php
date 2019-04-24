@extends('backoff.app')

@section('content')
    <div class="container">
        <div class="row" align="center">
            <h1 class="text-center">Stats </h1>
        </div>

        <div class="row" id="date">
            <span hidden>
                 @forelse($comptage as $elt)
                     <span class="contener-{{$elt->annee}}">
                          <span class="combien">{{$elt->combien}}</span>
                    </span>
                @empty
                @endforelse
            </span>
        </div>
        <div id="graphe" "col-md-12"></div>

    <div class="row" id="nbtheme">
            <span hidden>
                <?php $somme=0 ?>
                 @forelse($resultTheme as $elt)
                     <?php $somme = $somme + $elt->combien ?>
                    <span class="contener-theme">
                          <span class="combien1">{{$elt->combien}}</span>
                          <span class="sujet">{{$elt->theme}}</span>
                    </span>
                @empty
                @endforelse
                <span class="contener-somme">
                          <span class="total">{{$somme}}</span>
                    </span>
            </span>
    </div>

    <div class="row" id="nbviews">
            <span hidden>

                @forelse($resultVues as $elt)

                    <span class="contener-view">
                          <span class="nbvues">{{$elt->views}}</span>
                          <span class="titre">{{$elt->title}}</span>
                    </span>
                @empty
                @endforelse

            </span>
    </div>

    <div class="row">
        <div id="graphc" class="col-md-6"></div>
        <div id="graphb" class="col-md-6"></div>
   </div>
    <div class="row">
        <div id="grapha" class="col-md-12"></div>

    </div>

    </div>

@endsection