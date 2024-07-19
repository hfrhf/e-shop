@section('sidebar')
@php
   $isDashboard= Route::is(Auth::user()->getRedirectRoute()) ;
   $defClass='list-group-item list-group-item-action';
@endphp
    <!-- Hover added -->
    <div class="list-group">
        <a @class([$defClass, 'active'=>$isDashboard]) href={{route(Auth::user()->getRedirectRoute())}}>Dashboard</a>
        <a href='#' class="list-group-item list-group-item-action ">Orders</a>

            
        

    </div>
    
@endsection