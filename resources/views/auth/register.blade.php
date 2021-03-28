@extends('layouts.layoutlogin')

@section('judul','DAFTAR')

@section('css')
<style>
    h3 {
        text-align: center;
        margin-bottom: 10%
    }
</style>
@endsection

@section('isian')
<form action="{{route('Register')}}" method="POST">
    @csrf
    <div class="form-label-group">
        <input type="text" id="inputNik" class="form-control" name="nik" placeholder="NIK" required autofocus>
        <label for="inputNik">NIK</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputNama" class="form-control" name="nama" placeholder="username">
        <label for="inputNama">Nama lengkap</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputUsername" class="form-control" name="username" placeholder="username" required>
        <label for="inputUsername">Username</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputTelp" class="form-control" name="telp" placeholder="Telp" required>
        <label for="inputTelp">Telp</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>


    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign
        Up</button>
    <div class="text-center">
        <p>sudah punya akun? <a class="small" href={{route ('formLogin')}}>login</a>
        </p>
    </div>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    @endif


    @endsection