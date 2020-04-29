<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('vendor/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>@yield('title')</title>
    <style>
        .ulang {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Riyan Burg</a>
            <button class="navbar-toggler" data-target="#navbar" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="dropdown" data-toggle="dropdown">profile</a>
                        <div class="dropdown-menu dropdown-list" aria-labelledby="dropdown">
                            <a href="" class="dropdown-item">Profile</a>
                            <a href="" class="dropdown-item">settings</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <header class="header fixed-bottom">
        <div class="container-satu">
            <div class="beranda @yield('beranda')">
                <a href="{{url('/beranda')}}"><i class="fa fa-home"></i></a>
            </div>
            <div class="group @yield('group')">
                <a href="{{url('/forum')}}"><i class="fa fa-users"></i></a>
            </div>
            <div class="profile @yield('profile')">
                <a href="{{url('/profile')}}"><i class="fa fa-user-circle"></i></a>
            </div>
            <div class="tugas @yield('tugas')">
                <a href="{{url('/tugas')}}"><i class="fa fa-code"></i></a>
            </div>
        </div>
    </header>

    @yield('content')
    <script src="{{url('js/jquery-min.js')}}"></script>
    <link rel="stylesheet" href="{{url('vendor/fontawesome/js/all.css')}}">
    <script src="{{url('js/app.js')}}"></script>
    @yield('footer')
</body>

</html>