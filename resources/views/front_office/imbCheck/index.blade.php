@extends('layouts.master')

@section('title', 'Master Rencana Tata Letak Bangunan')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Rencana Tata Letak Bangunan</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#addModal"><i class="icon-plus icons"> Rencana Tata Letak Bangunan</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data</strong>
          <small>Rencana Tata Letak Bangunan</small>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="data-tables">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Nama Pemilik</th>
              <th class="text-center">Jalan</th>
              <th class="text-center" colspan="2">Tinggi Bangunan Perencanaan</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbChecks as $imbCheck)
            <tr>
              <td class="text-center">{!! $imbCheck->id !!}</td>
              <td>{!! $imbCheck->imb->imbPemohon->nama !!}</td>
              <td>{!! $imbCheck->imb->jalan !!}</td>
              <td>Rencana: {!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($imbCheck->r_tinggi_bangunan) !!} m<sup>2</sup></td>
              <td>Batasan: {!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($imbCheck->b_tinggi_bangunan) !!} m<sup>2</sup></td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imbCheck.show', $imbCheck->id) !!}" data-toggle="tooltip" data-placement="top" title="Detail {!! $imbCheck->imb->imbPemohon->nama !!}"> <i class="icon-list icon"></i></a>
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

<!--Modal - Tambah Imb-Check Izin-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Rencana Tata Letak Bangunan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" class="form-horizontal" action="{!! route('front_office::imbCheck.store') !!}">
        <div class="modal-body">
          {!! csrf_field() !!}
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="imb_id">No. PIMB</label>
            <div class="col-md-5">
              <select class="form-control" name="imb_id" id="imb_id">
                <option disabled selected>Pilih No. PIMB</option>
                @foreach ($imbs as $imb)
                  <option value="{!! $imb->id !!}">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($imb->id) . '-' . $imb->imbPemohon->nama !!}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="jalan">Jalan</label>
            <div class="col-md-8">
              <label class="form-control-label" for="jalan" id="jalan">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="kelurahan">Kelurahan</label>
            <div class="col-md-8">
              <label class="form-control-label" for="kelurahan" id="kelurahan">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="kecamatan">Kecamatan</label>
            <div class="col-md-8">
              <label class="form-control-label" for="kecamatan" id="kecamatan">-</label>
            </div>
          </div><hr />
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="luas_daerah_perencanaan"><b>Peruntukkan Blok / Kapling</b></label>
            <label class="col-md-2 form-control-label" for="luas_daerah_perencanaan"><b>Rencana</b></label>
            <label class="col-md-2 form-control-label" for="luas_daerah_perencanaan"><b>Batasan</b></label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="luas_lantai_dasar_bangunan">Luas Lantai Dasar Bangunan</label>
            <div class="col-md-2">
              <input id="r_luas_lantai_dasar_bangunan" name="r_luas_lantai_dasar_bangunan" class="form-control" type="number" autocomplete="off" required value="0">
            </div>
            <div class="col-md-2">
              <input id="b_luas_lantai_dasar_bangunan" name="b_luas_lantai_dasar_bangunan" class="form-control" type="number" autocomplete="off" required value="0">
            </div>
            <label class="col-md-1 form-control-label">m<sup>2</sup></label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="luas_seluruh_lantai_bangunan">Luas Seluruh Lantai Bangunan</label>
            <div class="col-md-2">
              <input id="r_luas_seluruh_lantai_bangunan" name="r_luas_seluruh_lantai_bangunan" class="form-control" type="number" required autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_luas_seluruh_lantai_bangunan" name="b_luas_seluruh_lantai_bangunan" class="form-control" type="number" required autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">m<sup>2</sup></label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="koefisien_dasar_bangunan">Koefisien Dasar Bangunan (KDB)</label>
            <div class="col-md-2">
              <input id="r_koefisien_dasar_bangunan" name="r_koefisien_dasar_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_koefisien_dasar_bangunan" name="b_koefisien_dasar_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">%</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="koefisien_lantai_bangunan">Koefisien Lantai Bangunan</label>
            <div class="col-md-2">
              <input id="r_koefisien_lantai_bangunan" name="r_koefisien_lantai_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_koefisien_lantai_bangunan" name="b_koefisien_lantai_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">%</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="tinggi_bangunan">Tinggi Bangunan</label>
            <div class="col-md-2">
              <input id="r_tinggi_bangunan" name="r_tinggi_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_tinggi_bangunan" name="b_tinggi_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">m</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="ketinggian_bangunan">Ketinggian Bangunan</label>
            <div class="col-md-2">
              <input id="r_ketinggian_bangunan" name="r_ketinggian_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_ketinggian_bangunan" name="b_ketinggian_bangunan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">Lt</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="parkir">Parkir</label>
            <div class="col-md-2">
              <input id="r_parkir" name="r_parkir" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_parkir" name="b_parkir" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label"></label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="penghijauan">Penghijauan</label>
            <div class="col-md-2">
              <input id="r_penghijauan" name="r_penghijauan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_penghijauan" name="b_penghijauan" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label"></label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="peresapan_air">Peresapan Air</label>
            <div class="col-md-2">
              <input id="r_peresapan_air" name="r_peresapan_air" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_peresapan_air" name="b_peresapan_air" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label">Bh</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="radius">Radius</label>
            <div class="col-md-2">
              <input id="r_radius" name="r_radius" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <div class="col-md-2">
              <input id="b_radius" name="b_radius" class="form-control" type="number" autocomplete="off" value="0">
            </div>
            <label class="col-md-1 form-control-label"></label>
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