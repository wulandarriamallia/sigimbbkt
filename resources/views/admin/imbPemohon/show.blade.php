@extends('layouts.master')

@section('title', 'Detail ' . $d['title'])

@section('breadcrumb')
  <li class="breadcrumb-item">Data Master</li>
  <li class="breadcrumb-item"><a href="{!! route('adm::imbPemohon.index') !!}">Pemohon IMB</a></li>
  <li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> Ubah</i></a>
{{--@if ($u['role'] != 'pemohon')--}}
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Hapus</i></a>
{{--@endif--}}
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list"></i>
          <strong>Identitas Pemohon</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($d['nama']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['alamat']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Telepon</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['telepon']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Ubah Imb-Pemohon-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Pemohon IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::model($show, ['route' => ['adm::imbPemohon.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) }}
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="nama">Nama</label>
          <div class="col-md-9">
            {{ Form::text('nama', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) }}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="alamat">Alamat</label>
          <div class="col-md-9">
            {{ Form::textarea('alamat', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="telepon">Telepon</label>
          <div class="col-md-9">
            {{ Form::tel('telepon', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-edit"> Ubah</i></button>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Hapus Imb-Pemohon-->
<div class="modal fade" id="remModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Penghapusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda ingin menghapus data Pemohon {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($d['nama']) !!} &hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['adm::imbPemohon.destroy', $d['id']], 'style' => 'display:inline']) !!}
        <button type="submit" class="btn btn-danger btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-trash icons" title="Hapus Pengguna"> Hapus</i></button>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection