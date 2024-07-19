@section('sidebar')
@php
   $isProducts= Route::is('product.*');
   $isCategory= Route::is('category.*');
   $isProfile= Route::is('profile.*');
   $isDashboard= Route::is(Auth::user()->getRedirectRoute()) ;
   $defClass='list-group-item list-group-item-action';
@endphp
    <!-- Hover added -->
    <div class="list-group">
        <a @class([$defClass, 'active'=>$isDashboard]) href={{route(Auth::user()->getRedirectRoute())}}>Dashboard</a>
        <a @class([$defClass, 'active'=>$isProducts]) href={{route('product.index')}} class="list-group-item list-group-item-action">Products</a>
        <a @class([$defClass, 'active'=>$isCategory]) href={{route('category.index')}} class="list-group-item list-group-item-action ">Category</a>
        <a @class([$defClass, 'active'=>$isProfile]) href={{route('profile.index')}} class="list-group-item list-group-item-action ">Users</a>
        <a href='#' class="list-group-item list-group-item-action ">Orders</a>
        <a href='#' class="list-group-item list-group-item-action ">Raports</a>
            
        

    </div>
    
@endsection