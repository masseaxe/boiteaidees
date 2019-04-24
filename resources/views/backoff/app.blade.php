<!DOCTYPE html>
<html>

@include('backoff.head')

<body>
<div class="container-fluid">
 <div class="row">
     <div id="side" class="col-12 col-md-3 col-xl-2 px-0">
         @include('backoff.side')
     </div>
     <div id="content" class="col-12 col-md-9 col-xl-10 p-4">
         @include('flash.flash')
         @yield('content')
     </div>
 </div>

</div>
<!-- ./wrapper -->
@include('backoff.foot')

</body>
</html>


