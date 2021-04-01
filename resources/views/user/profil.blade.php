@extends('layouts.navbar')

@section('css')
<style>
    .profil-card {
        margin-top: 2px;
        justify-content: center;
        font-family: 'Open Sans Condensed', sans-serif;
        width: 35rem;
        margin-left: 19%;
    }

    .btn {
        width: 70px;
        justify-content: center;
        margin-bottom: 7px;
        margin-left: 87%;

    }

   
    h4 {
        margin-top: 3%;
        margin-left: 42%;
    }

    .status-pengaduan {
        margin-top: 3%;
        justify-content: center;
        font-family: 'Open Sans Condensed', sans-serif;
        width: 35rem;
        margin-left: 19%;
    }

    .gambar-lampiran {
        width: 16rem;
        height: 12rem;
        padding: 2px 2px;
    }

    .card-body p {
     margin-bottom: 2px;
    }

    .laporan{
        
    }

    .card-title {
        margin-bottom: 0px;
    }

    .tanggal-pengaduan {
        margin-bottom: 0px;
        margin-left: 25px;
        margin-top: 7px;
    }
    .lokasi {
        display: flex;
        margin-left: 25px;
        margin-top: 60px;
        margin-bottom: 0px;
        position: relative;
        z-index: 99;
    }
    .lokasi p {
       margin-bottom: 0px;
    }

    
   
    .des {
        margin-right: 6px;
        
    }
    .card-body{
        padding: 3px;
        margin-left: 25px;
    }
</style>
@endsection

@section('dropdown')
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{route ("home1")}}">Buat laporan</a>
    <a class="dropdown-item" href="#laporan">lihat Laporan</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route("Logout")}}">logout</a>
</div>
@endsection

@section('body')
<div class="background">
    <img src="{{asset("img/asset2.png")}}" class="img-fluid" alt="...">
</div>
<div class="container">
    <div class="profil-card">
        <div class="card">

            <h4>PROFIL</h4>

            @if (Auth::guard('user')->check())
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>NAMA</th>
                            <td>:</td>
                            <td>{{ auth('user')->user()->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>:</td>
                            <td>{{ auth('user')->user()->nik }}</td>
                        </tr>
                        <tr>
                            <th>USERNAME</th>
                            <td>:</td>
                            <td>{{ auth('user')->user()->username }}</td>
                        </tr>
                        <tr>
                            <th>NOMOR TELEPON</th>
                            <td>:</td>
                            <td>{{ auth('user')->user()->telp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <a href="{{ route('user.editprofil')}}" class="btn btn-primary">Edit</a>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="laporan" id="laporan">
            <div class="status-pengaduan">
            @foreach ($pengaduan as $k => $v)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if ($v->foto != null)
                        <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}"
                            class="img-fluid gambar-lampiran">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="tanggal-pengaduan">
                            <p class="card-text"><small class="text-muted">{{ $v->tgl_pengaduan->format('d M y, h:i') }}</small></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $v->judul_laporan }}</h5>
                            <div class="status">
                                @if ($v->status == '0')
                                <p class="badge badge-danger">Pending</p>
                                @elseif($v->status == 'proses')
                                <p class="badge badge-warning text-white">{{ ucwords($v->status) }}</p>
                                @else
                                <p class="badge badge-success">{{ ucwords($v->status) }}</p>
                                @endif
                            </div>
                            <p class="card-text">{{ $v->isi_laporan }}</p>
                            {{-- @if ($v->tanggapan != null) --}}
                                <p class="light">{{ $v->tanggapan->tanggapan ?? ''}}</p>
                            {{-- @endif --}}
                        </div>
                           
                            <div class="text-muted lokasi">
                                <p class="des">{{ $v->des->desa ?? '' }},</p>
                                <p class="kec">{{ $v->kec->kecamatan ?? '' }}</p>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="row mt-5 ">
            @foreach ($pengaduan as $k => $v)
            <div class="col-lg-8">
                <div class="laporan-top">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>{{ $v->user->nama }}</p>
        @if ($v->status == '0')
        <p class="text-danger">Pending</p>
        @elseif($v->status == 'proses')
        <p class="text-warning">{{ ucwords($v->status) }}</p>
        @else
        <p class="text-success">{{ ucwords($v->status) }}</p>
        @endif
    </div>
    <div>
        <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
    </div>
</div>
</div>
<div class="laporan-mid">
    <div class="judul-laporan">
        {{ $v->judul_laporan }}
    </div>
    <p>{{ $v->isi_laporan }}</p>
</div>
<div class="laporan-bottom">
    @if ($v->foto != null)
    <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="gambar-lampiran">
    @endif
    @if ($v->tanggapan != null)
    <p class="mt-3 mb-1">{{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
    <p class="light">{{ $v->tanggapan->tanggapan }}</p>
    @endif
</div>
<hr>
</div>
@endforeach
</div> --}}
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