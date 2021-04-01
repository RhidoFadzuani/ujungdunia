@extends('layouts.navbar')


@section('dropdown')
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{route ("user.profil",'me')}}">Profil</a>
    <a class="dropdown-item" href="#">lihat Laporan</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route("Logout")}}">logout</a>
</div>
@endsection

@section('body')


<div class="background">
    <img src="{{asset("img/asset0.png")}}" class="img-fluid" alt="...">
</div>


<div class="judul-form">
    <h1>LAYANAN PENGADUAN MASYARAKAT SUBANG</h1>
    <h2>SALURKAN ASPIRASI ANDA</h2>
</div>




<section class="">
    <div class="pengaduan-form">
        <div class="container position-relative">
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
                        <div id="combo-box" data-location="{{ route('location') }}"></div>
                        <div class="form-group">
                            <input type="file" name="foto" class="form-control" name="foto">
                        </div>
                </div>
                @if (Auth::guard('user')->check())
                <button type="submit" class="btn btn-primary p-2" style="">Kirim!</button>
                @else
                <button  type="button" class="btn btn-primary p-2"  data-toggle="modal" data-target="#Modallogin">Kirim!</button>
                @endif
            </div>

            </form>
        </div>
    </div>
    </div>

</section>



<section class="section-tutor">
    <div class="judul-section">
        <h2>LANGKAH-LANGKAH</h2>
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
                    <p class="card-text">Dalam 3-4 hari, laporan anda akan di verifikasi dan diteruskan ke instansi yang
                        bersangkutan</p>
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
        <h2>Jumlah laporan</h2>
        <h3>{{$laporan ?? ''}}</h3>
    </div>
</section>

<section class="section-tutor">
    
 <div class="container">
    <div class="judul-section">
        <h2>HASIL DARI LAPORAN</h2>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset("img/after1.png")}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset("img/after2.png")}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset("img/after3.png")}}" class="d-block w-100" alt="...">
          </div>
        </div>
        {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> --}}
      </div>
 </div>

</section>

{{-- modal --}}
<div class="modal fade" id="Modallogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">anda belum login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Login/Register terlebih dahulu sebelum melakukan pengaduan
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a type="button" href="{{route ('formLogin')}}" class="btn btn-primary">Login</a>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 AlyrhidoF</p>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset ('js/app.js')}}"></script>

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
@endsection