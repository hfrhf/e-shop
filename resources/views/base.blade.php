<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">   
            <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('style.css')}}" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{config('app.name')}} | @yield('title')</title>
</head>
<body>
    <div id="app">
        <style>
            ul {
      list-style: none;
    }
        </style>
    
        <div class="content">
            @include('partials.nav')
            @php
                $landing=!Route::is('store')
            @endphp
            
            <div @class(['container mt-4' => $landing])>
                

                    @hasSection ('sidebar')
                    <div class="row">
                    <div class="col-2">@yield('sidebar')</div>
                    <div class="col-10">@yield('content')</div>
                     </div>
                    @else
                    <div class="">@yield('content')</div>
                    @endif
   
                   
          
                
            </div>
            <div class="mt-5">
                @hasSection ('sidebar')
                
                
            
                @else
                @include('partials.Footer')
                @endif
            </div>
    
        </div>
    
    
    
    
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </div>
</body>
</html>
