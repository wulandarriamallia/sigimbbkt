@extends('layouts.auth')

@section('title', 'Check Akun')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
          <form class="form-horizontal" role="form" method="POST" id="check-form" action="{!! url('/check-account') !!}">
            {!! csrf_field() !!}
            <h1>@yield('title')</h1>
            <div class="alert alert-info" role="alert" id="change-info">
              Masukan No. NIP/KTP Anda, Sistem akan melakukan verifikasi aktivasi akun Anda.
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
              <input type="text" class="form-control" required autofocus autocomplete="off" placeholder="Masukkan No. NIP/KTP" id="username" name="username">
            </div>
            <button type="submit" class="btn btn-block btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left">Check</button>
            <a class="btn btn-block btn-link" href="{!! action('Auth\LoginController@login') !!}">Masuk</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection