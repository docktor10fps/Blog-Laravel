<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d0d0d0; /* Темніший фон */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Елементи ближче до навбару */
            padding-top: 20px; /* Відстань між навбаром і контентом */
        }
        .posts-container {
            display: flex;
            flex-direction: column; /* Розміщення постів стовпцем */
            align-items: center; /* Центрування постів */
        }
        .post {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 800px;
            padding: 20px;
            box-sizing: border-box;
            margin-bottom: 40px; /* Додаємо відстань між постами */
        }
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .avatar {
            width: 40px; 
            height: 40px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 10px;
        }
        .name {
            font-weight: bold;
        }
        .content {
            margin-bottom: 10px;
        }
        .main-content {
            display: flex;
            flex-direction: row;
        }
        .photo {
            width: 65%;
            margin-bottom: 10px;
            margin-right: 10px;
        }
        .comments-section {
            width: 35%;
            display: flex;
            flex-direction: column;
        }
        .comments-section input, .comments-section button {
            margin-top: 10px;
        }
        .comment {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .comment-avatar {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 10px;
        }
        .comment-text {
            max-width: calc(100% - 35px);
        }
        .btn-custom {
            background-color: white;
            border: 1px solid black;
            color: black;
            transition: background-color 0.3s, color 0.3s;
            height: 30px;
            padding: 0 10px;
        }
        .btn-custom:hover {
            background-color: black;
            color: white;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                @if (Auth::user()!==null)
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}">New Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile.index', Auth::user()) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            @if (session('error'))
                                 <div class=" text-danger">
                                {{ session('error') }}
                                 </div>
                         @endif
                                <form action="{{ route('search') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <input type="hidden" name="post_id" value="">
                            <input type="text" class="form-control mr-2" id="comment" name="search" placeholder="friend search ...">
                            <button type="submit" class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-arrow-right">></i>
                            </button>
                        </form>
                        </li>
                        <div>
                    </ul>
                @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
   
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#tags').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    
