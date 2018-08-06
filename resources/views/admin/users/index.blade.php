@extends('layouts.master')

@section('title', 'Manajemen Pengguna')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Pengguna</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#addModal"><i class="icon-user-follow icons"> Pegawai Baru</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    @foreach ($users as $user)
      @if ($user->roles()->first()->slug != 'su')
      <div class="col-sm-6 col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="h2 text-muted text-right mb-4">
              <i class="icon-user icons"> {!! $user->username !!}</i>
            </div>
            <div class="h4 mb-0">{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($user->first_name) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($user->last_name) !!}</div>
            <small class="text-muted text-uppercase font-weight-bold">{!! \sigimbbkt\Libraries\StringMod::setUserPermission($user->roles()->first()->slug) . ' ' . \sigimbbkt\Libraries\StringMod::setUserStatus3rd(Activation::completed($user)) !!}</small>
          </div>
          <div class="card-footer px-3 py-2">
            <a class="font-weight-bold font-xs btn-block text-muted" href="{!! action('UserController@show', ['id' => $user->id]) !!}">Detail... <i class="fa fa-angle-right float-right font-lg"></i></a>
          </div>
        </div>
      </div>
      <!--/.col-->
      @endif
    @endforeach
  </div>
  <!--/.row-->
  <div class="row justify-content-center">
    {!! $users->links('vendor.pagination.bootstrap-4') !!}
  </div>
</div>

<!--Modal - Tambah Pengguna-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" class="form-horizontal" action="{!! route('adm::user.store') !!}">
        <div class="modal-body">
          {!! csrf_field() !!}
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="username">NIP</label>
            <div class="col-md-9">
              <input id="username" name="username" class="form-control" placeholder="Nomor Induk Pegawai..." type="text" autocomplete="off" required>
              <span class="help-block">NIP akan menjadi username dan password default.</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="nama_mahasiswa">Nama Depan</label>
            <div class="col-md-9">
              <input id="first_name" name="first_name" class="form-control" placeholder="Nama Depan..." type="text" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="nama_mahasiswa">Nama Belakang</label>
            <div class="col-md-9">
              <input id="last_name" name="last_name" class="form-control" placeholder="Nama Belakang..." type="text" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="role">Hak Akses</label>
            <div class="col-md-9">
              <select class="form-control" name="role" id="role">
                <option disabled selected>Pilih Hak Akses</option>
                @foreach ($roles as $role)
                  @if ($role->id !=1 && $role->id != 5)
                  <option value="{!! $role->slug !!}">{!! $role->name  !!}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
          <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-check"> Simpan</i></button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection