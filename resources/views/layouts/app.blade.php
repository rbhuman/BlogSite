<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title> 
    

    <!-- Scripts -->
   
    <!-- Fonts -->
    <!-- Latest compiled and minified CSS -->
@include('style.boot')
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
   
  
</head>
<body>
    <div id="app">
            @include('inc.navbar')
           
            <div class="container">
                    <div style="font-family:Arial, sans-serif;";>
               @include('inc.message')
                
            @yield('content')
        
            </div>
        </div>
    </div>
               <script src="{{ asset('js/app.js') }}" defer></script>
               <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace( 'article-ckeditor' );
                </script>

</body>
</html>
