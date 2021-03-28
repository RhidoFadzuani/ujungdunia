@extends('layouts.layoutlogin')

@section('judul','Selamat Datang')

@section('css')
    <style>
      .gagal{
        color: red;
        text-align: center;
      }

      h3{
        text-align: center;
        margin-bottom: 10%
      }


    </style>
@endsection

@section('isian')
<form action="{{route('loginPetugas')}}" method="POST">
    @csrf
    <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="username" required
            autofocus>
        <label for="inputEmail">Username</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign
        in</button>
    <div class="text-center">
        

</form>
<div class="gagal">
@if(Session::has('pesan'))
{{Session::get('pesan')}}
@endif
</div>
@endsection
@section('js')

@endsection