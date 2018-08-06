@extends('layouts.auth')

@section('title', 'Ubah Password')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
          {!! Form::model($u, ['route' => ['adm::user.post-change-password', $u['id']], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'user-change-form']) !!}
            {!! csrf_field() !!}
            <h1>@yield('title')</h1>
            <div class="alert alert-warning" role="alert" id="change-info">
              Masukan Password lama dan Password baru Anda. Pastikan tidak sama dengan password lama.
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-lock icons"></i></span>
              <input type="password" class="form-control" required autofocus autocomplete="off" placeholder="Password Lama" id="old_password" name="old_password">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-lock icons"></i></span>
              <input type="password" class="form-control" required autocomplete="off" placeholder="Password Baru" id="password" name="password">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-lock icons"></i></span>
              <input type="password" class="form-control" required autocomplete="off" placeholder="Konfirmasi Password" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-block btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left">Ubah</button>
            <div class="text-center">Kembali ke halaman <a href="{!! route('adm::user.show', ['id' => $u->id]) !!}">Profil</a></div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection