<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(Request::is('gallery')) active @endif">
                        <a href="{{ action('GalleryController@index') }}" class="nav-link"> {{ __('Gallery') }}</a>
                    </li>
                    <li class="nav-item @if(Request::is('contact')) active @endif">
                        <a href="{{ action('ContactUsController@index') }}" class="nav-link">{{__('Contact Us')}}</a>
                    </li>
                    @if(Auth::check() && Auth::user()->isAdmin())
                        <li class="nav-item @if(Request::is('contact/all')) active @endif">
                            <a href="{{ action('ContactUsController@viewMessages')  }}" class="nav-link">{{__('View Messages')}}</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a href="#" id="menu"
                           data-toggle="dropdown" class="nav-link dropdown-toggle"
                           data-display="static">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item dropdown-submenu">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Submenu-1</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a href="#">Item-1</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Item-2</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Item-3</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-item dropdown-submenu">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Submenu-2</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a href="#">Item-1</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Item-2</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Item-3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if(isset($success))
            @dump($success);
        @endif
        @if(isset($error))
            @dump($error);
        @endif
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
@yield('scripts')
<script>

	$('.dropdown-submenu > a').on("click", function (e) {
		var submenu = $(this);
		$('.dropdown-submenu .dropdown-menu').removeClass('show');
		submenu.next('.dropdown-menu').addClass('show');
		e.stopPropagation();
	});

	$('.dropdown').on("hidden.bs.dropdown", function () {
		// hide any open menus when parent closes
		$('.dropdown-menu.show').removeClass('show');
	});
</script>
</html>
