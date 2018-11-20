<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Footer-with-button-logo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchComponent.css') }}" rel="stylesheet">
    <link href="{{ asset('fullPageSlider/jquery.fullPage.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    <!-- Add this css File in head tag-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    <script src="{{asset('js/snap.svg-min.js')}}"></script>
    @yield('chrono')
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11&appId=1452040258183182';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<header>
    <nav class="navbar navbar-default navbar-haut">
        <div class="container">
            <div class="nav-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <span class="blue">E</span>as<span class="blue rotate">E</span>at
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recettes <span class="caret"></span></a>
                        <ul class="dropdown-menu row-fluid">
                            <li class="col-sm-4">
                                <h4 class="text-center menu-title" >Plats</h4>
                                <a href="{{e(url('recettes?active=5')) }}">Patisseries/Petit déjeuner</a>
                                <a href="{{e(url('recettes?active=1')) }}">Entrées/Apéritifs</a>
                                <a href="{{e(url('recettes?active=2')) }}">Plats</a>
                                <a href="{{e(url('recettes?active=3')) }}">Desserts</a>
                                <a href="{{e(url('recettes?active=4')) }}">Boissons</a>
                            </li>
                            <li class="col-sm-4">
                                <h4 class="text-center menu-title" >Type de plat</h4>
                                @foreach(\App\Models\TypePlat::take(5)->get() as $typePlat)
                                <a href="{{e(url('/recettes/'.$typePlat->id).'/'.$typePlat->name) }}">{{$typePlat->name}}</a>
                                @endforeach
                            </li>
                            <li class="col-sm-4">
                                <h4 class="text-center menu-title" >Thème</h4>
                                <a href="{{ e(url('country/all')) }}" class="" >Recettes du monde</a>
                                <a href="{{e(url('recettes?active=2')) }}">Les cuisiniers</a>
                                <a href="{{e(url('recettes?active=3')) }}">Top Recettes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Régimes<span class="caret"></span></a>
                        <ul class="dropdown-menu row-fluid">
                            <li class="col-sm-4">
                                 <h4 class="text-center menu-title" >Minceur</h4>
                            <a href="{{e(url('special/1')) }}">Basse Calories (1200)</a>
                            <a href="{{e(url('special/2')) }}">Basse Calories (1000)</a>
                            <a href="{{e(url('special/2')) }}">Trés Basse Calories (800)</a>
                            </li>
                            <li class="col-sm-4">
                                <h4 class="text-center menu-title" >Sportif</h4>
                            <a href="{{e(url('special/1')) }}">Régime Prise de Masse</a>
                            <a href="{{e(url('special/2')) }}">Régime Protéiné</a>
                            <a href="{{e(url('special/3')) }}">Régime Sèche</a>
                            </li>
                            <li class="col-sm-4">
                                 <h4 class="text-center menu-title" >Mieux Manger</h4>
                            <a href="{{e(url('special/1')) }}">Régime Végétarien</a>
                            <a href="{{e(url('special/2')) }}">Régime Sans Gluten</a>
                            <a href="{{e(url('special/3')) }}">Régime Diabet</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ e(url('ingredients')) }}" class="" >
                           Ingrédients
                        </a></li>
                    <li><a href="{{ e(url('favoris')) }}" class="" >
                            <i class="fa fa-btn fa-star-o"></i> Favoris
                        </a></li>
                    <?php
                    if( Auth::check()){
                    ?>
                    <li class="">
                        <a href="{{e(url('profile/'.Auth::user()->id.'/listes'))}}">Mes listes</a>
                    </li>
                    <?php
                    }
                    ?>
                    <?php
                    if( Auth::check() and Auth::user()->id == 1){
                    ?>
                    <li><a href="{{ e(url('admin')) }}" class="" >
                            Admin
                        </a></li>
                    <?php
                    }
                    ?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li >
                            <a href="{{url('profile/'.Auth::user()->id)}}" style="position: relative; padding-left: 50px;">
                                <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-circle" style="width: 32px; height: 32px;position: absolute; top: 10px; left: 10px;" alt="">
                            </a>
                        </li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="overlay "></div>

    <div id="app">

        @yield('slider')
        @yield('searchBar')
        <div class="height"></div>
        @yield('content')
        <div class="clearfix"></div>
    </div>

        @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/withinViewport.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.withinViewport.js') }}"></script>
    <script src="{{ asset('js/classie.js') }}"></script>
<script type="text/javascript" src="{{asset('fullPageSlider/jquery.fullPage.js')}}"></script>

    <script>
        jQuery(document).ready(function() {
            @yield('postJquery')
            @yield('homeSearchAutocomplete')
        });
    </script>
    <script>
        @yield('AutoWrite')
    </script>
</body>
</html>
