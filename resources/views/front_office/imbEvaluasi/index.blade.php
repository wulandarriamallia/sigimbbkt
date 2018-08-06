@extends('layouts.master')

@section('title', 'Master Evaluasi IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Evaluasi IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#addModal"><i class="icon-plus icons"> Evaluasi IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data Evaluasi</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="data-tables">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Nama Pemilik</th>
              <th class="text-center">Lokasi</th>
              <th class="text-center">Nama Jalan</th>
              <th class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbEvaluasis as $imbEvaluasi)
            <tr>
              <td class="text-center">{!! $imbEvaluasi->id !!}</td>
              <td>{!! $imbEvaluasi->imb->imbPemohon->nama !!}</td>
              <td>{!! $imbEvaluasi->lokasi !!}</td>
              <td>{!! $imbEvaluasi->nama_jalan !!}</td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imbEvaluasi.show', $imbEvaluasi->id) !!}" data-toggle="tooltip" data-placement="top" title="Detail {!! $imbEvaluasi->imb->imbPemohon->nama !!}"> <i class="icon-list icon"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>

<!--Modal - Tambah Imb-Evaluasi-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Evaluasi IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" class="form-horizontal" action="{!! route('front_office::imbEvaluasi.store') !!}">
        <div class="modal-body">
          {!! csrf_field() !!}
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="imb_id">No. PIMB</label>
            <div class="col-md-9">
              <select class="form-control" name="imb_id" id="imb_id">
                <option disabled selected>Pilih No. PIMB</option>
                @foreach ($imbs as $imb)
                  <option value="{!! $imb->id !!}">IMB{!! $imb->id . '-' . $imbEvaluasi->imb->imbPemohon->nama !!}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="pemohon_telepon">No. Telepon</label>
            <div class="col-md-9">
              <label class="form-control-label" for="pemohon_telepon" id="pemohon_telepon">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="pemohon_alamat">Alamat Pemohon</label>
            <div class="col-md-9">
              <label class="form-control-label" for="pemohon_alamat" id="pemohon_alamat">-</label>
            </div>
          </div><hr />
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="lokasi">Lokasi</label>
            <div class="col-md-9">
              <input type="text" class="form-control" required autocomplete="off" name="lokasi" id="evaluasi_lokasi">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="nama_jalan">Nama Jalan</label>
            <div class="col-md-9">
              <textarea class="form-control" name="nama_jalan" id="jalan" cols="30" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="no_sertifikat_tanah">No. Sertifikat Tanah</label>
            <div class="col-md-9">
              <input type="text" class="form-control" autocomplete="off" name="no_sertifikat_tanah" id="no_sertifikat_tanah">
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