@extends('layouts.master')

@section('title', 'Detail Rencana Tata Letak Bangunan' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbCheck.index') !!}">Rencana Tata Letak Bangunan</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> Rencana Tata Letak Bangunan</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Rencana Tata Letak Bangunan</i></a>
@endsection

@section('content')
  <div class="animated fadeIn">

    <div class="row row-sm">
      <div class="col-sm-12">
        <div class="card card-accent-primary">
          <div class="card-header">
            <i class="fa fa-list"></i>
            <strong>Data</strong>
            <small>Rencana Tata Letak Bangunan</small>
          </div>
          <div class="card-body text-dark">
            <div class="row mb-4">

              <div class="col-sm-4">
                <h6 class="mb-3">Permohonan Dari:</h6>
                <div>
                  <strong>{!! $d['imb_pemohon_nama'] !!}</strong>
                </div>
              </div>
              <!--/.col-->
              <div class="col-sm-4">
                <h6 class="mb-3">No. PIMB:</h6>
                <div>
                  <strong>IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</strong>
                </div>
              </div>
              <!--/.col-->
              <div class="col-sm-4">
                <h6 class="mb-3">Dijalan:</h6>
                <div>
                  <strong>{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['jalan']) !!}</strong>
                </div>
                <div>Kelurahan: {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kelurahan']) !!}</div>
                <div>Kecamatan: {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kecamatan']) !!}</div>
              </div>
              <!--/.col-->
            </div><hr />

            <div class="row">
              <table class="table table-clear">
                <tbody>
                <tr>
                  <td class="left">
                    <strong>Peruntukan Blok / Kapling</strong>
                  </td>
                  <td class="right">
                    <strong>Rencana</strong>
                  </td>
                  <td class="right">
                    <strong>Batasan</strong>
                  </td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Luas Lantai Dasar Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_luas_lantai_dasar_bangunan']) !!} m<sup>2</sup></td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_luas_lantai_dasar_bangunan']) !!} m<sup>2</sup></td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Luas Seluruh Lantai Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_luas_seluruh_lantai_bangunan']) !!} m<sup>2</sup></td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_luas_seluruh_lantai_bangunan']) !!} m<sup>2</sup></td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Koefisien Dasar Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_koefisien_dasar_bangunan']) !!} %</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_koefisien_dasar_bangunan']) !!} %</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Koefisien Lantai Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_koefisien_lantai_bangunan']) !!} %</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_koefisien_lantai_bangunan']) !!} %</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Tinggi Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_tinggi_bangunan']) !!} m</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_tinggi_bangunan']) !!} m</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Ketinggian Bangunan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_ketinggian_bangunan']) !!} Lt</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_ketinggian_bangunan']) !!} Lt</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Parkir</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_parkir']) !!}</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_parkir']) !!}</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Penghijauan</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_penghijauan']) !!}</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_penghijauan']) !!}</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Peresapan Air</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_peresapan_air']) !!} Bh</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_peresapan_air']) !!} Bh</td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Radius</strong>
                  </td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['r_radius']) !!}</td>
                  <td class="right">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['b_radius']) !!}</td>
                </tr>
                </tbody>
              </table>
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
          <h4 class="modal-title">Ubah Rencana Tata Letak Bangunan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::model($show, ['route' => ['front_office::imbCheck.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="modal-body">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="imb_id">IMB ID</label>
              <div class="col-md-2">
                <label class="form-control-label">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="imb_id">Nama Pemohon</label>
              <div class="col-md-2">
                <label class="form-control-label">{!! $d['imb_pemohon_nama'] !!}</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="jalan">Jalan</label>
              <div class="col-md-2">
                <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['jalan']) !!}</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="kelurahan">Kelurahan</label>
              <div class="col-md-2">
                <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kelurahan']) !!}</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="kecamatan">Kecamatan</label>
              <div class="col-md-3">
                <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kecamatan']) !!}</label>
              </div>
            </div><hr />
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="luas_lantai_dasar_bangunan">Luas Lantai Dasar Bangunan</label>
              <div class="col-md-2">
                {!! Form::number('r_luas_lantai_dasar_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_luas_lantai_dasar_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) !!}
              </div>
              <label class="col-md-1 form-control-label">m<sup>2</sup></label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="luas_seluruh_lantai_bangunan">Luas Seluruh Lantai Bangunan</label>
              <div class="col-md-2">
                {!! Form::number('r_luas_seluruh_lantai_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_luas_seluruh_lantai_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) !!}
              </div>
              <label class="col-md-1 form-control-label">m<sup>2</sup></label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="koefisien_dasar_bangunan">Koefisien Dasar Bangunan (KDB)</label>
              <div class="col-md-2">
                {!! Form::number('r_koefisien_dasar_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_koefisien_dasar_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label">%</label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="koefisien_lantai_bangunan">Koefisien Lantai Bangunan</label>
              <div class="col-md-2">
                {!! Form::number('r_koefisien_lantai_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_koefisien_lantai_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label">%</label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="tinggi_bangunan">Tinggi Bangunan</label>
              <div class="col-md-2">
                {!! Form::number('r_tinggi_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_tinggi_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label">m</label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="ketinggian_bangunan">Ketinggian Bangunan</label>
              <div class="col-md-2">
                {!! Form::number('r_ketinggian_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_ketinggian_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label">Lt</label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="parkir">Parkir</label>
              <div class="col-md-2">
                {!! Form::number('r_parkir', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_parkir', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label"></label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="penghijauan">Penghijauan</label>
              <div class="col-md-2">
                {!! Form::number('r_penghijauan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_penghijauan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label"></label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="peresapan_air">Peresapan Air</label>
              <div class="col-md-2">
                {!! Form::number('r_peresapan_air', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_peresapan_air', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label">Bh</label>
            </div>
            <div class="form-group row">
              <label class="col-md-4 form-control-label" for="radius">Radius</label>
              <div class="col-md-2">
                {!! Form::number('r_radius', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <div class="col-md-2">
                {!! Form::number('b_radius', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
              </div>
              <label class="col-md-1 form-control-label"></label>
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
          <p>Apakah Anda ingin menghapus data Rencana Tata Letak Bangunan IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) . '-' . $d['imb_pemohon_nama'] !!}&hellip;?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
          {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imbCheck.destroy', $d['id']], 'style' => 'display:inline']) !!}
          <button type="submit" class="btn btn-danger btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-trash icons" title="Hapus Check IMB"> Hapus</i></button>
          {!! Form::close() !!}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection