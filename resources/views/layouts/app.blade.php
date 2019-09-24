<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
        }

        img {
            max-width: 15vw;
        }

        .navbar-custom a#navbarDropdown {
            color: white;
        }

        .container-fluid {
            padding: 0;
        }
    </style>
</head>
<body>
<div id="app" class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-custom navbar-laravel text-center">
        <div class="container-fluid text-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <h1 class="toolkit"><a href="/" class="root">Toolkit</a></h1>
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">
                                    Profile
                                </a>
                                @can('create', 'App\User')
                                    <a class="dropdown-item" href="{{ route('users.show') }}">
                                        Manage users <span class="caret"></span>
                                    </a>
                                @endcan
                                @can('create', 'App\Folder')
                                    <a class="dropdown-item" href="{{ route('manage.uploads') }}">
                                        Uploads <span class="caret"></span>
                                    </a>
                                @endcan
                                @can('create', 'App\Folder')
                                    <a class="dropdown-item" href="{{ route('manage.folders.permissions') }}">
                                        Folders permissions <span class="caret"></span>
                                    </a>
                                @endcan
                                @can('create', 'App\Folder')
                                    <a class="dropdown-item" href="{{ route('manage.extensions') }}">
                                        Manage extensions <span class="caret"></span>
                                    </a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
                <img src="/logo.jpg" alt="HRCOACH">
            </div>
        </div>
    </nav>

    <div class="py-0">
        @yield('content')
    </div>
</div>
</body>
</html>
