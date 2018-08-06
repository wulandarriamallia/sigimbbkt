@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
          {{--TODO: Reset messages goes here--}}
          @include('partials.messages')
          <form class="form-horizontal" role="form" method="POST" action="{!! url('/forgot-password') !!}">
            {!! csrf_field() !!}
            <h1>@yield('title')</h1>
            <p class="text-muted">Masukan NIM Anda, Admin akan melakukan reset password Anda.</p>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
              <input type="text" class="form-control" required autofocus autocomplete="off" placeholder="Masukkan NIM" id="nim" name="nim" value="{{ old('nim') }}">
            </div>
            <button type="submit" class="btn btn-block btn-success">Kirim</button>
            <a class="btn btn-block btn-link" href="{!! action('Auth\LoginController@login') !!}">Masuk</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection