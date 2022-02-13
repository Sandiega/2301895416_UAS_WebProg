<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #afcae8">
            <div class="container">

                    <div class="logo" style="margin:auto">
                        @if(Auth::check())

                        <a class="navbar-brand" href="/home/{{App::getlocale()}}">
                            <h2 style="font-weight:bold">Amazing E-book</h2>
                        </a>

                        @else
                        <a class="navbar-brand" href="/">
                            <h2 style="font-weight:bold">Amazing E-book</h2>
                        </a>
                        @endif
                    </div>


                        <div class="navbar" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto ">
                                <!-- Authentication Links -->
                                @guest
                                        <div class="bgauth" style="background-color: orange">
                                            <li class="nav-item">
                                                <a class="nav-link" href="/register">
                                                    <span style="font-weight: bold">{{ __('Sign Up') }}</span>
                                                </a>
                                            </li>
                                        </div>


                                        <li class="nav-item">
                                            <div class="bgauth ml-2" style="background-color: orange">
                                                <a class="nav-link" href="/login">
                                                    <span style="font-weight: bold">{{ __('Log In') }}</span>
                                                </a>
                                            </div>

                                        </li>


                                @else
                                        {{-- {{Auth::user()->first_name}} --}}
                                            <a style="background-color: orange; text-decoration:none; color:black; padding:5px" href="/logout"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <span style="font-weight: bold">{{ __('Logout') }}</span>
                                            </a>

                                            <form id="logout-form" action="/logout" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>

                                @endguest
                            </ul>

                </div>
            </div>
        </nav>
        @if (Auth::check())

            @if(session()->has('submit') || session()->has('save'))


            @else
            <div class="navbar" style="background-color: orange;height:50px">

                <div class="d-flex justify-content-around" style="width: 100%">

                        <a href="/home/{{App::getlocale()}}"><span>Home</span></a>
                        <a href="/cart/{{App::getlocale()}}"><span>Cart</span></a>
                        <a href="/profile/{{App::getlocale()}}"><span>Profile</span></a>
                        @if (Auth::user()->role_id == 1)
                        <a href="/allAccount/{{App::getlocale()}}"><span>Account Maintenance</span></a>
                        @endif

                </div>

            </div>


            @endif

        @endif
        <main class="py-4" style="height:90vh">
            @yield('content')
        </main>
    </div>

    <div class="footer" style="height: 5vh;background-color: #afcae8">
        <p style="text-align: center"> &copy; Amazing E-Book 2022 </p>
    </div>
</body>
</html>
