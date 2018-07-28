<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digital School') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/language.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/sass/app.scss" type="text/scss" />

    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .buttonStyle {
            background: #00b0f0;
            border: none;
            color: white;
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .buttonStyle:hover {
            background: #2079b0;
            text-decoration: none;
        }

        .card-header {

            font-weight: bold;
        }
    </style>

</head>

<body>
    <div id="app">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <nav class="navbar navbar-expand-md navbar-light" style="background: #00b0f0">
            <div class="container">
                <a class="navbar-brand" style="color:white;">
                    <img src="/img/quiz-icon2.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                    <span class="fab fa-accusoft"></span>
                    <b>DigiQuiz</b>
                </a>
                @if (session('locale') == 'en')
                <a class="nav-link" href="#" onclick="changeLanguage('de')" id="german">
                    <img src="/img/DE.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @elseif (session('locale') == 'de')
                <a class="nav-link" href="#" onclick="changeLanguage('en')" id="english">
                    <img src="/img/GB.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @else
                <a class="nav-link" href="#" onclick="changeLanguage('de')" id="english">
                    <img src="/img/DE.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('login') }}">
                                <b>{{ trans('app.StudentLoginLabel') }}</b>
                            </a>
                        </li>
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('admin.login') }}">
                                <b>{{ trans('app.TeacherLoginLabel') }}</b>
                            </a>
                        </li>
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('register') }}">
                                <b>{{ trans('app.StudentRegisterLabel') }}</b>
                            </a>
                        </li>

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color:white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ trans('app.LogoutLabel') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>