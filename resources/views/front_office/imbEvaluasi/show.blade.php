@extends('layouts.master')

@section('title', 'Detail ' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbEvaluasi.index') !!}">Evaluasi IMB</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> Evaluasi IMB</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Evaluasi IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list"></i>
          <strong>Evaluasi</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <div class="block font-bold">No. PIMB</div>
            {!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Pemohon</div>
            {!! $d['imb_pemohon_nama'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Lokasi</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['lokasi']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Jalan</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['nama_jalan']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Sertifikat Tanah</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['no_sertifikat_tanah']) !!}
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
        <h4 class="modal-title">Ubah Data Evaluasi IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::model($show, ['route' => ['front_office::imbEvaluasi.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
      <div class="modal-body">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="imb_id">IMB ID</label>
            <div class="col-md-9">
              <label class="form-control-label">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="imb_id">Nama Pemohon</label>
            <div class="col-md-9">
              <label class="form-control-label">{!! $d['imb_pemohon_nama'] !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="telepon">No. Telepon</label>
            <div class="col-md-9">
              <label class="form-control-label" for="telepon">{!! $d['imb_pemohon_telepon'] !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="alamat">Alamat Pemohon</label>
            <div class="col-md-9">
              <label class="form-control-label" for="alamat">{!! $d['imb_pemohon_alamat'] !!}</label>
            </div>
          </div><hr />
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="lokasi">Lokasi</label>
            <div class="col-md-9">
              {!! Form::text('lokasi', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="nama_jalan">Nama Jalan</label>
            <div class="col-md-9">
              {!! Form::textarea('nama_jalan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="no_sertifikat_tanah">No. Sertifikat Tanah</label>
            <div class="col-md-9">
              {!! Form::text('no_sertifikat_tanah', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
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
        <p>Apakah Anda ingin menghapus data Evaluasi IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) . '-' . $d['imb_pemohon_nama'] !!} &hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imbEvaluasi.destroy', $d['id']], 'style' => 'display:inline']) !!}
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