@extends('layouts.master')

@section('title', 'Detail Retribusi IMB' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbRetribusi.index') !!}">Retribusi IMB</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> Retribusi IMB</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Retribusi IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">
  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list"></i>
          <strong>Retribusi</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark">
          <div class="row mb-4">

            <div class="col-sm-4">
              <h6 class="mb-3">Biaya Retribusi IMB:</h6>
              <div>{!! $show->imb->jenis_bangunan !!}</div>
            </div>
            <!--/.col-->

            <div class="col-sm-3">
              <h6 class="mb-3">Permohonan:</h6>
              <div>Nama: {!! $show->imb->imbPemohon->nama !!}</div>
              <div>Nomor: {!! $show->imb->imbPemohon->id !!}</div>
            </div>
            <!--/.col-->
            <div class="col-sm-5">
              <h6 class="mb-3">Alamat Pehohon:</h6>
              <div>
                <strong></strong>
              </div>
              <div>Diatas Tanah HM / HGB / Suku: {!! $show->imb->status_tanah !!}</div>
              <div>Lokasi Bangunan: {!! $show->imb->jalan . ' Kelurahan ' . $show->imb->kelurahan !!}</div>
            </div>
            <!--/.col-->
          </div><hr />

          <div class="row">
            <table class="table table-clear">
              <tbody>
              <tr>
                <td class="left">
                  <strong><u>URAIAN</u></strong>
                </td>
              </tr>
              <tr>
                <td class="left">a. Luas Bangunan: {!! $show->luas_bangunan !!} m<sup>2</sup></td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($show->luas_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">b. Tingkat Bangunan: {!! \sigimbbkt\Libraries\StringMod::setRomawi($show->tingkat_bangunan) !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($show->tingkat_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">c. Guna Bangunan: {!! $show->guna_bangunan !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($show->guna_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">d. Jenis Bangunan: {!! $show->jenis_bangunan !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($show->jenis_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">e. Lokasi / Kawasan: {!! $show->lokasi_kawasan !!}. Jalan {!! $show->lokasi_jalan !!}. Kelurahan {!! $show->lokasi_kelurahan !!}</td>
                <td class="right">(Tarif Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($show->lokasi_kawasan) !!},- per-izin)</td>
              </tr>
              <tr>
                <td class="left">
                  <strong><u>RETRIBUSI</u></strong>
                </td>
              </tr>
              <tr>
                <td class="left">Dihitung 1% dari anggaran fisik bangunan</td>
              </tr>
              <tr>
                <td class="left">* Bangunan Baru: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($show->luas_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($show->tingkat_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($show->guna_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($show->jenis_bangunan) !!} x Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($show->lokasi_kawasan) !!},-</td>
                <td class="right">= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($show->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($show->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($show->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($show->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($show->lokasi_kawasan) !!},-</td>
              </tr>
              <tr>
                <td class="left">* Bangunan Renovasi / Perbaikan / Rehabilitasi = 30 % a Patokan Dasar</td>
              </tr>
              <tr>
                <td class="left">&nbsp;&nbsp;&nbsp;(30 % x Rp {!! $show->patokan_dasar !!},-)</td>
                <td class="right">= Rp {!! $show->patokan_dasar / 100 * 30 !!},-</td>
              </tr>
              <tr>
                <td class="left">&nbsp;&nbsp;&nbsp;Jumlah</td>
                <td class="right">= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($show->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($show->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($show->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($show->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($show->lokasi_kawasan) !!},-</td>
              </tr>
              <tr>
                <td class="left">Terbilang: </td>
                <td class="right">{!! \sigimbbkt\Libraries\Calculation::terbilang(\sigimbbkt\Libraries\Calculation::luasBangunan($show->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($show->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($show->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($show->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($show->lokasi_kawasan)) !!}</td>
              </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Ubah Imb-Retribusi-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Retribusi IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::model($show, ['route' => ['front_office::imbRetribusi.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
      <div class="modal-body">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="imb_id">IMB ID</label>
            <div class="col-md-8">
              <label class="form-control-label">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="biaya_retribusi_bangunan">Biaya Retribusi IMB</label>
            <div class="col-md-8">
              <label class="form-control-label" for="nama_pemohon">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot2nd($d['jenis_bangunan']) !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="nama_pemohon">Permohonan</label>
            <div class="col-md-8">Nama
              <label class="form-control-label" for="nama_pemohon">{!! $d['imb_pemohon_nama'] !!}</label>
            </div>
            <label class="col-md-4 form-control-label"></label>
            <div class="col-md-8">Nomor
              <label class="form-control-label" for="nama_pemohon">{!! $d['imb_pemohon_id'] !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="alamat_pemohon">Alamat Pemohon</label>
            <div class="col-md-8">
              <label class="form-control-label" for="alamat_pemohon">{!! $d['imb_pemohon_alamat'] !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="diatas_tanah">Diatas Tanah HM / HGB / Suku</label>
            <div class="col-md-8">
              <label class="form-control-label" for="alamat_pemohon">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="lokasi_bangunan">Lokasi Bangunan</label>
            <div class="col-md-8">
              <label class="form-control-label" for="alamat_pemohon">-</label>
            </div>
          </div><hr />
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="luas_bangunan">Luas Bangunan</label>
            <div class="col-md-2">
              {!! Form::number('luas_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>m<sup>2</sup>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="tingkat_bangunan">Tingkat Bangunan</label>
            <div class="col-md-2">
              {!! Form::number('tingkat_bangunan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'min' => 1, 'max' => '5']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="guna_bangunan">Guna Bangunan</label>
            <div class="col-md-8">
              {!! Form::select('guna_bangunan', [
                'Bangunan Sosial' => 'Bangunan Sosial',
                'Bangunan Perumahan' => 'Bangunan Perumahan',
                'Bangunan Fasilitas Umum' => 'Bangunan Fasilitas Umum',
                'Bangunan Pendidikan' => 'Bangunan Pendidikan',
                'Bangunan Kelembagaan/Kantor' => 'Bangunan Kelembagaan/Kantor',
                'Bangunan Perdagangan & Jasa' => 'Bangunan Perdagangan & Jasa',
                'Bangunan Industri' => 'Bangunan Industri',
                'Bangunan Khusus' => 'Bangunan Khusus',
                'Bangunan Campuran' => 'Bangunan Campuran',
                'Bangunan Lain-Lain' => 'Bangunan Lain-Lain'
              ], null, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="jenis_bangunan">Jenis Bangunan</label>
            <div class="col-md-8">
              {!! Form::select('jenis_bangunan', [
                'Bangunan Mewah/Luks' => 'Bangunan Mewah/Luks',
                'Bangunan Permanen' => 'Bangunan Permanen',
                'Bangunan Semi Permanen' => 'Bangunan Semi Permanen',
                'Bangunan Darurat' => 'Bangunan Darurat'
              ], null, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="lokasi_kawasan">Lokasi / Kawasan</label>
            <div class="col-md-8">
              {!! Form::select('lokasi_kawasan', [
                'Kawasan pasar/pertokoan dan lingkungan komersial' => 'Kawasan pasar/pertokoan dan lingkungan komersial',
                'Lingkungan perumahan di pusat kota' => 'Lingkungan perumahan di pusat kota',
                'Lingkungan perumahan di pinggir kota' => 'Lingkungan perumahan di pinggir kota'
              ], null, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="lokasi_jalan">Jalan</label>
            <div class="col-md-8">
              {!! Form::textarea('lokasi_jalan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '3']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="lokasi_kelurahan">Kelurahan</label>
            <div class="col-md-8">
              {!! Form::textarea('lokasi_kelurahan', null, ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '3']) !!}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="patokan_dasar">Patokan Dasar</label>Rp
            <div class="col-md-3">
              {!! Form::number('patokan_dasar', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
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

<!--Modal - Hapus Imb-Retribusi-->
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
        <p>Apakah Anda ingin menghapus data Retribusi IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) . '-' . $d['imb_pemohon_nama'] !!} &hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imbRetribusi.destroy', $d['id']], 'style' => 'display:inline']) !!}
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