@if (Auth::user() != "")
    <a href="{{URL::to('/')}}/logout"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Logout">Logout</button></a>
@endif

<div class="logo p-2">
    <img src="{{ url('/img/logo.jpg') }}">
</div>
<img src="{{ url('/img/hr.png') }}">
<h4 class="p-3">Une idée vous trotte dans la tête depuis un petit moment, partagez-la ici !</h4>
<a href="{{action('IdeaController@create')}}">
    <button type="button" class="btn btn-primary w-100 py-3" title="J’ajoute mon idée">
        + J’ajoute mon idée
    </button>
</a>
