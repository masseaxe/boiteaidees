@if (Auth::user() != "")
<a href="{{URL::to('/')}}/logout"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Logout">Logout</button></a>
@endif