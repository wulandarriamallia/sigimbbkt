@extends('layouts.auth')

@section('title', Config::get('app.mainName') . Config::get('app.subName'))

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
          <form class="form-horizontal" role="form" method="POST" id="register-form" action="{!! url('/register') !!}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <h5>@yield('title')</h5>
            <p class="text-muted">Formulir Pemohon IMB</p>
            <div class="input-group mb-3">
              <small class="text-danger">No. KTP akan menjadi password login Anda.</small>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-credit-card"></i></span>
              <input type="text" class="form-control" required autofocus autocomplete="off" placeholder="No. KTP" maxlength="16" id="username" name="username">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-user"></i></span>
              <input type="text" class="form-control" required autocomplete="off" placeholder="Nama Lengkap" id="first_name" name="first_name">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-directions"></i></span>
              <textarea class="form-control" required placeholder="Alamat" name="alamat" id="alamat" cols="30" rows="5"></textarea>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-phone"></i></span>
              <input type="tel" class="form-control" required autocomplete="off" placeholder="No. Handphone" id="telepon" name="telepon">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-camera "></i></span>
              <input type="file" class="form-control" autocomplete="off" placeholder="Foto Anda" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-block btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left">Daftar</button>
            <a class="btn btn-block btn-link" href="{!! route('auth.login') !!}">Masuk</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection