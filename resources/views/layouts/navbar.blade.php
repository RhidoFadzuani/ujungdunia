<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAWAS-laporan Warga Subang</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/pengaduan.css")}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @yield('css')
</head>
<body>
    <div class="nav-pengaduan">
        <nav class="navbar navbar-light fixed-top">
            <div class="container">
                <div class="navbrand">
                    <a class="nav-link" href="{{route ('home1')}}">
                        <img src="{{asset ("img/logokab.png")}}" class="d-inline-block align-top" alt="">
                     LAWAS
                    </a>
            </div>
            @if (Auth::guard('user')->check())
                       <li class=" nav-item dropdown">

                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"> {{ auth('user')->user()->nama }} </a>

                        @yield('dropdown')


                        </li>

                        @else

                        <ul class="navbar-nav mr-4 pr-1">
                            <li class="nav-item">
                                <div class="btnlogin">
                                    <a href="{{route('formLogin')}}" class="btn btn-link">SIGN IN</a>
                                    <a href="{{route('formdaftar')}}" class="btn btn-outline-primary">SIGN UP</a>
                                </div>
                            </li>
                        </ul>
                </div>

                @endif

        </nav>
    </div>
    @yield('body')
    @yield('js')
</body>
</html>