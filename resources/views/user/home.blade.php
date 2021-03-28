<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/home.css")}}">
    
    <title>LAWAS-laporan Warga Subang</title>
</head>

<body>
    <header>
        <nav>

            <div class="navbar">

                <img class="logo" src="{{asset("img/logo.png")}}">
                <ul class="main-nav">
                   
                    <li>
                        <a href="{{route('formLogin')}}">SIGN IN</a>
                    </li>
                    <li>
                        <a href="{{route('formdaftar')}}">SIGN UP</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
    </header>
    {{-- <img class="background" src="{{asset("img/home.jpg")}}" alt=""> --}}

    <div class="row">
        <div class="background">
            <h1 class="content-title">
                <a href="{{route('formLogin')}}">AYO SEGERA<br>MELAPOR</a>
                <a href="" class="btn btn-primary d-block" style="border-radius: 2rem;color:white;  ">LAPOR </a>
            </h1>
        </div>
    </div>

    
    <br>
    <br>
    
    <h2>Langkah-langkah</h2>
    <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
               
                <div class="col-sm-4">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
</body>

</html>