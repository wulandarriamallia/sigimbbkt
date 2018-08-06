@extends('layouts.master')

@section('title', 'Master Pemohon IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Pemohon IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#addModal"><i class="icon-user-follow icons"> Pemohon IMB</i></a>
@endsection

@section('content')
  <div class="animated fadeIn">

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i>
            <strong>Data Pemohon</strong>
            <small>Izin Mendirikan Bangunan (IMB)</small>
          </div>
          <div class="card-body">
            <table class="table table-hover" id="data-tables">
              <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Pemohon</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($imbPemohons as $imbPemohon)
                <tr>
                  <td class="text-center">{!! $imbPemohon->id !!}</td>
                  <td>{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($imbPemohon->nama) !!}</td>
                  <td>{!! $imbPemohon->alamat !!}</td>
                  <td>{!! $imbPemohon->telepon !!}</td>
                  <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="{!! route('adm::imbPemohon.show', $imbPemohon->id) !!}"> <i class="icon-list icon"></i></a>
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

  <!--Modal - Tambah Imb-pemohon-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pemohon IMB</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" method="POST" class="form-horizontal" action="{!! route('adm::imbPemohon.store') !!}">
          <div class="modal-body">
            {!! csrf_field() !!}
            <div class="form-group row">
              <label class="col-md-3 form-control-label" for="nama">Nama</label>
              <div class="col-md-9">
                <input id="nama" name="nama" class="form-control" type="text" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 form-control-label" for="alamat">Alamat</label>
              <div class="col-md-9">
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 form-control-label" for="telepon">Telepon</label>
              <div class="col-md-9">
                <input id="telepon" name="telepon" class="form-control" type="tel" autocomplete="off" required>
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