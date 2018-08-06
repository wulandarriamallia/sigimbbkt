@extends('layouts.auth')

@section('title', Config::get('app.mainName') . Config::get('app.subName'))

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-group mb-0">
        <div class="card p-4">
          <div class="card-head">
            <img src="{!! secure_asset('assets/img/logo_bukittinggi.png') !!}" alt="logo_bukittinggi" style="float: left;margin: 0 20px;" width="75" height="75">
            <h5 style="float: left;margin: 10px 0;text-shadow: 0 2px 1px #3e3e3e;width: 70%">Dinas Penanaman Modal Pelayanan Terpadu dan Satu Pintu Perindustrian dan Tenaga Kerja Bukitinggi</h5>
          </div>
          <div class="card-body">
            <form class="form-horizontal" role="form" id="login-form">
              {!! csrf_field() !!}
              <h5>@yield('title')</h5>
              <p class="text-muted">Silahkan masuk dengan No. NIP/KTP dan Password Anda</p>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-credit-card"></i></span>
                <input type="text" class="form-control" placeholder="No. NIP/KTP" id="username" name="username" required autofocus autocomplete="off">
              </div>
              <div class="input-group mb-4"><span class="input-group-addon"><i class="icon-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="off">
              </div>
              <div class="row">
                <div class="col-3">
                  <button type="submit" class="btn btn-primary px-4 btn-ladda ladda-button" data-color="blue" data-style="slide-left">Masuk</button>
                </div>
                <div class="col-9 text-right">
                  <button type="button" class="btn btn-link px-4" onclick="location.href='{!! action('Auth\ActivationController@getCheckAccount') !!}'">Check Akun</button>
                  <button type="button" class="btn btn-link px-4" onclick="location.href='{!! action('Auth\ForgotPasswordController@forgotPassword') !!}'">Reset Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
