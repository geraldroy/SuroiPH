<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @if($__env->yieldContent('title') != "Home" && $__env->yieldContent('title') != "")
          @yield('title') -
      @endif

    {{ config('app.name', 'Suroi') }}</title>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('images/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/suroi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <div id="app" class="site-container">
       
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
  
    </div>

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" defer></script>
    <script src=" {{ asset('js/jquery-ui.js') }} " defer></script>
    <script src=" {{ asset('js/suroi.js') }} " defer></script>
</body>
</html>
