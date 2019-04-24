
@for ($i = 1; $i <= 5; $i++)
    <i class="fas fa-star @if($i<=$avg) yellow  @endif"></i>
@endfor
