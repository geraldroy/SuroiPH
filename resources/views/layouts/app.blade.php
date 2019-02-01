<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Suroi') }}</title>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('images/favicon.ico') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" defer></script>
    <script src=" {{ asset('js/jquery-ui.js') }} " defer></script>
    <script src=" {{ asset('js/suroi.js') }} " defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/suroi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>
<body>
    <div id="app" class="site-container">
        <nav class="navbar navbar-expand-lg navbar-dark suroi-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/suroi-brand-white.png') }}" class="img-fluid suroi-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            @yield('content')

        <div class="bg-suroi-green suroi-footer text-center mt-auto">
           <div class="container px-auto py-auto">
              <div class="row">
               <div class="col-lg-8 text-md-left">
                  <div class="row">
                   <div class="col-md-4 col-lg">
                     <h6>Suroi</h6>
                         <ul class="list-unstyled text-small">
                           <li><a class="text-white" href="#">About us</a></li>
                           <li><a class="text-white" href="#">Careers</a></li>
                           <li><a class="text-white" href="#">FAQ</a></li>
                           <li><a class="text-white" href="#">Policies</a></li>
                           <li><a class="text-white" href="#">Help</a></li>
                         </ul>
                   </div>
                   <div class="col-md-4 col-lg">
                     <h6>Discover</h6>
                         <ul class="list-unstyled text-small">
                           <li><a class="text-white" href="#">Trust & Safety</a></li>
                           <li><a class="text-white" href="#">Giftcards</a></li>
                           <li><a class="text-white" href="#">The Frequent Suroist</a></li>
                           <li><a class="text-white" href="#">Business Travel</a></li>
                           <li><a class="text-white" href="#">SuroiMag</a></li>
                         </ul>
                   </div>
                   <div class="col-md-4 col-lg">
                     <h6>Information</h6>
                         <ul class="list-unstyled text-small">
                           <li><a class="text-white" href="#">Contact Us</a></li>
                           <li><a class="text-white" href="#">Work With Us</a></li>
                           <li><a class="text-white" href="#">Privacy Policy</a></li>
                           <li><a class="text-white" href="#">Terms and Conditions</a></li>
                           <li><a class="text-white" href="#">Press Enquiries</a></li>
                         </ul>
                   </div>
                   <div class="col-lg">
                     <select class="form-control">
                     <option>English</option>
                     <option>Filipino</option>
                   </select>
                   <select class="form-control">
                     <option>Philippine Peso</option>
                     <option>US Dollar</option>
                   </select>
                   </div>
               </div>
               </div>
               <div class="col-lg-4 text-lg-right">
                 <img src="{{ asset('images/suroi-brand-white.png') }}" class="img-fluid suroi-logo mt-4">
               </div>
             </div>
           </div>
        </div>
    </div>

</body>
</html>
