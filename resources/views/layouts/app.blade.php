<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | The Devops List</title>

    <!-- Styles -->

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/chosen.css" rel="stylesheet">
    <link href="/css/sweetalert.css" rel="stylesheet">

    <style>
        body{
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
        }
        .list-group-item
        .panel > .list-group
        {
            margin-bottom: 0;
        }
        .panel > .list-group .list-group-item
        {
            border-width: 1px 0;
        }
        .panel > .list-group .list-group-item:first-child
        {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        .panel > .list-group .list-group-item:last-child
        {
            border-bottom: 0;
        }
        .panel-heading + .list-group .list-group-item:first-child
        {
            border-top-width: 0;
        }
        .panel-default .list-group-item.active
        {
            color: #000;
            background-color: #DDD;
            border-color: #DDD;
        }
        .panel-primary .list-group-item.active
        {
            color: #FFF;
            background-color: #428BCA;
            border-color: #428BCA;
        }
        .panel-success .list-group-item.active
        {
            color: #3C763D;
            background-color: #DFF0D8;
            border-color: #D6E9C6;
        }
        .panel-info .list-group-item.active
        {
            color: #31708F;
            background-color: #D9EDF7;
            border-color: #BCE8F1;
        }
        .panel-warning .list-group-item.active
        {
            color: #8A6D3B;
            background-color: #FCF8E3;
            border-color: #FAEBCC;
        }
        .panel-danger .list-group-item.active
        {
            color: #A94442;
            background-color: #F2DEDE;
            border-color: #EBCCD1;
        }
        .panel a.list-group-item.active:hover, a.list-group-item.active:focus
        {
            color: #000;
            background-color: #DDD;
            border-color: #DDD;
        }

    </style>

    <script src="https://use.fontawesome.com/16eefa3c87.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fa fa-envelope-o fa-1x"></i> The Devops List
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::check())
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="@if(request()->is('subscriptions*')) active @endif"><a href="{{ route('subscriptions.index') }}">Subscriptions</a></li>
                        <li class="@if(request()->is('lists*')) active @endif"><a href="{{ route('lists.index') }}">Lists</a></li>
                        <li class="@if(request()->is('campaigns*')) active @endif"><a href="{{ route('campaigns.index') }}">Campaigns</a></li>
                        <li class="@if(request()->is('templates*')) active @endif"><a href="{{ route('templates.index') }}">Templates</a></li>
                        <li class="@if(request()->is('settings*')) active @endif"><a href="{{ route('settings.application') }}">Settings</a></li>
                    </ul>
                @endif
                    <ul class="nav navbar-nav">
                        <li class="@if(request()->is('workshop*')) active @endif"><a href="{{ route('workshops') }}">Workshops & Training</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (auth()->guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            @if(env('APP_REGISTER') == true)
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ auth()->user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('errors.validation_errors')
            @include('parts.success')
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/chosen.jquery.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/custom.js"></script>

    @yield('javascript')
    @if (App::environment('production'))
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', "{{ env('APP_GA_ANALYTICS') }}", 'auto');
      ga('send', 'pageview');

    </script>
    <script async type="text/javascript" src="https://centi.in/javascripts/hwd.js" data-site="93d84134998c3a73" onload="Centi()"></script>
    @endif
</body>
</html>
