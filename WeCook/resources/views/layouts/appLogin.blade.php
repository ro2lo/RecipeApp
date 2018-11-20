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
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    {{--<script>--}}
        {{--function adjust_iframe_height(){--}}
            {{--var actual_height = document.getElementById('ifrm').scrollHeight;--}}
            {{--parent.postMessage(actual_height,"*");--}}
            {{--//* aucune restriction de domaine sur les pages-hôtesses--}}
        {{--}--}}
    {{--</script>--}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css">

        .ui-autocomplete { position: absolute; cursor: default; }
        .ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }


        .ui-autocomplete { width:1px; }


        .ui-menu {
            list-style:none;
            padding: 10px;
            margin: 0;
            display:block;
            background-color: white;
        }

        .ui-menu .ui-menu {
            margin-top: -3px;
        }
        .ui-menu .ui-menu-item {
            margin:0;
            padding: 0;
        }
        .ui-menu .ui-menu-item:hover {
            margin:0;
            padding: 0;
            background-color: lightgray;
        }
        .ui-menu .ui-menu-item a {
            text-decoration:none;
            display:block;
            padding:.2em .4em;
            line-height:1.5;
            zoom:1;
        }
        .ui-menu .ui-menu-item a.ui-state-hover,
        .ui-menu .ui-menu-item a.ui-state-active {
            margin: -1px;
        }
        .footer-distributed {
            background-color: #292c2f;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
            box-sizing: border-box;
            width: 100%;
            margin-top: 0 !important;
            font: bold 16px sans-serif;
            text-align: left;
            padding: 50px 60px 40px;
            /* margin-top: 80px; */
            overflow: hidden;
        }
        .log{
            padding: 100px;
        }
    </style>

    <!-- Add this css File in head tag-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    @yield('chrono')
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;<li><a href="{{ e(url('favoris')) }}" class="" >
                            Favoris
                        </a></li>
                        <?php
                        if( Auth::check() and Auth::user()->id == 1){
                            ?>
                        <li><a href="{{ e(url('admin')) }}" class="" >
                            Admin
                        </a></li>
                        <?php
                            }
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recettes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Brekfeast</a></li>
                                <li><a href="{{e(url('recettes?active=1')) }}">Entrées</a></li>
                                <li><a href="{{e(url('recettes?active=2')) }}">Plats</a></li>
                                <li><a href="{{e(url('recettes?active=3')) }}">Desserts</a></li>
                                <li><a href="{{e(url('recettes?active=4')) }}">Boissons</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Régimes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{e(url('special/1')) }}">Végétarien</a></li>
                                <li><a href="{{e(url('special/2')) }}">Sportifs</a></li>
                                <li><a href="{{e(url('special/3')) }}">Summer</a></li>
                                <li><a href="{{e(url('special/4')) }}">Low Calories</a></li>
                                <li><a href="{{e(url('special/5')) }}">Boissons</a></li>
                                <li><a href="{{e(url('special/6')) }}">Boissons</a></li>
                                <li><a href="{{e(url('special/7')) }}">Boissons</a></li>
                            </ul>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="{{ e(url('profile/'.Auth::user()->id)) }}" class="" data-toggle="" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <footer>
        <footer class="footer-distributed">

            <div class="footer-left">

                <h3>Company<span>logo</span></h3>

                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a href="#">Blog</a>
                    ·
                    <a href="#">Pricing</a>
                    ·
                    <a href="#">About</a>
                    ·
                    <a href="#">Faq</a>
                    ·
                    <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">Company Name &copy; <?php echo date('Y')?></p>

                <div class="footer-icons">

                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>

                </div>

            </div>

            <div class="footer-right">

                <p>Contact Us</p>

                <form action="#" method="post">

                    <input type="text" name="email" placeholder="Email" />
                    <textarea name="message" placeholder="Message"></textarea>
                    <button>Send</button>

                </form>

            </div>

        </footer>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
</body>
</html>
