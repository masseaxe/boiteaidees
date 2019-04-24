

<!-- Load JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Load Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- Chargement des JS -->
<script src="{{ url('/js/laravel.js?') }}"></script>

<script src="{{ url('/js/backoff-app.js?v='.time() ) }}"></script>
<script src="{{ url('/js/app.js?v='.time()) }}"></script>

@if ((\Illuminate\Support\Facades\Route::getCurrentRoute()->getPath()) == 'ideas_stats_countIdeas')
    <!-- Chargement de highcharts-->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://code.highcharts.com/modules/series-label.js"></script>

    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="{{ url('/js/graphe.js?v='.time()) }}"></script>

@endif

