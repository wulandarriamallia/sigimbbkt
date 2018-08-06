@extends('layouts.master')

@section('title', 'Profil ' . $u['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Area Pengguna</li>
<li class="breadcrumb-item active">Profil</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#dataModal"><i class="fa fa-id-card"> Ubah Data</i></a>
<a class="btn" href="{!! route('auth.change-password') !!}"><i class="icon-key icons"> Ubah Password</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-4">
      <div class="panel panel-card">
        <div class="card card-accent-primary text-center">
          <div class="card-header">
            <div style="background:url({!! \sigimbbkt\Libraries\Generator::genProfilePicture($u['role'], $u['photo']) !!}) center center; background-size:cover; width: 100%; height: 500px; max-height: 100%"></div>
          </div>
          <div class="card-body">
            <footer>Hak Akses
              <cite title="Source Title">{!! \sigimbbkt\Libraries\StringMod::setUserPermission($u['role']) !!}</cite>
            </footer>
            <footer>Status
              <cite title="Source Title">{!! \sigimbbkt\Libraries\StringMod::setUserStatus3rd($activation) !!}</cite>
            </footer>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="card card-accent-primary">
        <div class="card-header">Identitas</div>
        <div class="card-body p-0">
          @if ($u['role'] == 'front_office')
          <div class="list-group-item">
            <div class="block font-bold">NIP</div>
            {!! $u['username'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['first_name']) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['last_name']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon</div>
            {!! $u['no_telepon'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! $u['alamat'] !!}
          </div>
          @elseif ($u['role'] == 'kepala_bidang')
          <div class="list-group-item">
            <div class="block font-bold">NIP</div>
            {!! $u['username'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['first_name']) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['last_name']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon</div>
            {!! $u['no_telepon'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! $u['alamat'] !!}
          </div>
          @elseif ($u['role'] == 'pemohon')
          <div class="list-group-item">
            <div class="block font-bold">NIK</div>
            {!! $u['username'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['first_name']) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['last_name']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon</div>
            {!! $u['no_telepon'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! $u['alamat'] !!}
          </div>
          @elseif ($u['role'] == 'admin')
          <div class="list-group-item">
            <div class="block font-bold">NIP</div>
            {!! $u['username'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['first_name']) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['last_name']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon</div>
            {!! $u['no_telepon'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! $u['alamat'] !!}
          </div>
          @elseif ($u['role'] == 'su')
          <div class="list-group-item">
            <div class="block font-bold">Username</div>
            {!! $u['username'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Administrator</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['first_name']) . ' ' . \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['last_name']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon</div>
            {!! $u['no_telepon'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! $u['alamat'] !!}
          </div>
          @endif
        </div>
      </div>
      <div class="card card-accent-primary">
        <div class="card-header">Akun</div>
        <div class="card-body p-0">
          <div class="list-group-item">
            <div class="block font-bold">Tanggal Aktivasi</div>
            {!! \sigimbbkt\Libraries\TimeStamp::FormatDateTime($activation->completed_at) !!}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Data Pengguna-->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::model($user, ['route' => ['auth.post-change-data'], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="first_name">Nama Lengkap</label>
            <div class="col-md-9">
              {!! Form::text('first_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="telepon">No. Telepon</label>
            <div class="col-md-9">
              {!! Form::tel('no_telepon', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="alamat">Alamat</label>
            <div class="col-md-9">
              {!! Form::textarea('alamat', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="photo">Foto</label>
            <div class="col-md-9">
              {!! Form::file('photo', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-edit"> Ubah</i></button>
      </div>
      {!! Form::close() !!}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection