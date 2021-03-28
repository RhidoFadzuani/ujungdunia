<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAWAS-laporan Warga Subang</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/pengaduan.css")}}">
</head>

<body>



    <div class="background">
        <div class="judul-form">
            <h1>Layanan Pengaduan Masyarakat Subang</h1>
            <h2>Salurkan Aspirasi Warga Subang</h2>
        </div>
        <img src="{{asset("img/asset2.png")}}" class="img-fluid" alt="...">
    </div>
    <br>



    <div class="nav-pengaduan">
        <nav class="navbar navbar-light fixed-top">
            <div class="container">
                <div class="navbrand">
                    <a class="nav-link ml-5" href="#" ">
                     LAWAS
                    </a>
            </div>
            @if (Auth::guard('user')->check())
                       <li class=" nav-item dropdown">

                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"> {{ auth('user')->user()->nama }} </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profil</a>
                            <a class="dropdown-item" href="#">lihat Laporan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("Logout")}}">logout</a>
                        </div>


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

    <section class="">
        <div class="pengaduan-form">
            <div class="container position-relative">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 35rem;">
                        <div class="textform">
                            <h2 class="text-center my-4">Tuliskan Aspirasi anda disini</h2>
                        </div>
                        <div class="card-body position-absolut">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                            @endif

                            @if (Session::has('pengaduan'))
                            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                            @endif
                            <form method="POST" action="{{route('lapor')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Judul Laporan</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="judul_laporan"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                        name="isi_laporan"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_kejadian">tanggal kejadian</label>
                                    <input placeholder="tanggal kejadian" type="date" class="form-control datepicker"
                                        name="tgl_kejadian">
                                </div>

                                <div class="form-group">
                                    <label for="">kecamatan</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="kecamatan">
                                        <option selected>kecamatan</option>
                                        @foreach ($kecamatan as $k => $v)
                                        <option value="{{$v->kode}}">{{ $v->kecamatan}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Desa/Kelurahan</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="desa">
                                        <option selected>desa/kelurahan</option>
                                        <option value="1">subang</option>
                                        <option value="2">dawuan</option>
                                        <option value="3">kalijati</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="foto" class="form-control" name="foto">
                                </div>
                        </div>
                        @if (Auth::guard('user')->check())
                        <button type="submit" class="btn btn-primary p-2" style="">Kirim!</button>
                        @else
                        <a href="{{route('formdaftar')}}" class="btn btn-primary p-2">Kirim!</a>
                        @endif
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

 

    <section class="section-tutor">
        <div class="judul-section">
        <h2 >Langkah-Langkah</h2>
       </div>
        <div class="container">
            <div class="card-deck">
                
                <div class="card">
                    <img src="{{asset("img/tutor1.png")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">1.Pendaftaran</h5>
                        <p class="card-text">lakukan pendaftaran menggunakan data yang ada di kartu tanda penduduk anda</p>
                    </div>
                </div>

                <div class="card">
                    <img src="{{asset("img/tutor2.png")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">2.Tulis Pengaduan</h5>
                        <p class="card-text">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                    </div>
                </div>
                    
                <div class="card">
                        <img src="{{asset("img/tutor3.png")}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">3.Proses Verifikasi</h5>
                            <p class="card-text">Dalam 3-4 hari, laporan anda akan di verifikasi dan diteruskan ke instansi yang bersangkutan</p>
                        </div>
                </div>

                <div class="card">
                    <img src="{{asset("img/tutor4.png")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">4.Selesai</h5>
                        <p class="card-text">Laporan anda akan di tindaklanjuti, hingga terselesaikan</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="count-laporan">
            <h2>Jumlah laporan sekarang</h2>
            <h3>{{$laporan ?? ''}}</h3>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script>
        var navbar = document.querySelector('nav');




        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');


            } else {
                navbar.classList.remove('scrolled');

            }
        }
    </script>
</body>

</html>