@extends('layouts.navbar')

@section('css')
    <style>
         
    .profil-card {
        margin-top: 85px;
        justify-content: center;
        font-family: 'Open Sans Condensed', sans-serif;
        width: 35rem;
        margin-left: 19%;
        margin-bottom: 5%;
    }

    .btn {
        width: 95px;
        justify-content: center;
        margin-bottom: 7px;
        margin-left: 80%;

    }
    h4{
        margin-top: 3%;
        margin-left: 42%;
    }
    </style>
@endsection

@section('dropdown')
<div class="dropdown-menu">
    <a class="dropdown-item" href="{{route ("home1")}}">Buat laporan</a>
    <a class="dropdown-item" href="#">lihat Laporan</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route("Logout")}}">logout</a>
</div>
@endsection

@section('body')
<div class="container">
<div class="profil-card">
<div class="card">
    
            <h4>PROFIL</h4>
    
            @if (Auth::guard('user')->check())
            <form action="{{route ('update.editprofil', auth('user')->user()->nik)}}" method="POST">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_petugas">Nama lengkap</label>
                    <input type="text" value="{{ auth('user')->user()->nama }}" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="{{ auth('user')->user()->username }}" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="number" value="{{ auth('user')->user()->telp }}" name="telp" id="telp" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif
</div>
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