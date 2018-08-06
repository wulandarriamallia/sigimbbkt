@extends('layouts.master')

@section('title', 'Ubah Data Pengguna')

@section('content')
  {!! Form::model($edit, ['method' => 'PUT', 'route' => ['adm::user.update', $edit->id], 'files' => 'true']) !!}
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2 class="pull-left">Borang Ubah Data {!! $u['borang'] !!}</h2>
      </div>
      <div class="pull-right" style="padding-top: 20px;">
        <button class="btn btn-rounded btn-stroke btn-danger waves-effect" type="reset">Ulang</button>
        <button class="btn btn-rounded btn-stroke btn-primary waves-effect" type="submit">Simpan</button>
        <a class="btn btn-rounded btn-stroke btn-warning waves-effect" href="{{ route('users.show', Auth::user()->id) }}">Batal</a>
      </div>
    </div>
  </div>
  @include('../partials/messages')
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>ID:</strong>
        {!! Form::text('username', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nama Prodi:</strong>
        {!! Form::text('prodi_id', $u['prodi_id'], ['class' => 'form-control', 'readonly' => 'true']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Program Studi:</strong>
        {!! Form::text('program_studi', $u['program_studi'], ['class' => 'form-control', 'readonly' => 'true']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Hak Akses:</strong>
        {!! Form::text('permissions', $edit->permissions, ['class' => 'form-control', 'readonly' => 'true']) !!}
      </div>
    </div>
    @if (Auth::user()->permissions == 'mahasiswa')
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nama Lengkap:</strong>
        {!! Form::text('nama_mahasiswa', $u['nama_mahasiswa'], ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Tempat Lahir:</strong>
        {!! Form::text('tempat_lahir', $u['tempat_lahir'], ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Tanggal Lahir:</strong>
        {!! Form::text('tanggal_lahir', $u['tanggal_lahir'], ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'tanggal_lahir']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Alamat:</strong>
        {!! Form::text('alamat', $u['alamat'], ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>IPK:</strong>
        {!! Form::text('ipk', $u['ipk'], ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'ipk']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>No. HP:</strong>
        {!! Form::text('no_hp', $u['no_hp'], ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'no_hp']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nama Wali:</strong>
        {!! Form::text('nama_wali', $u['nama_wali'], ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Alamat Wali:</strong>
        {!! Form::text('alamat_wali', $u['alamat_wali'], ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Scan Tanda Tangan:</strong>
        {{ Form::file('scan_ttd', ['enctype' => 'multipart/from-data']) }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Foto:</strong>
        {{ Form::file('foto', ['enctype' => 'multipart/from-data']) }}
      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection