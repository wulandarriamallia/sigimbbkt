@extends('layouts.master')

@section('title', 'Laporan Retribusi IMB ' . $namaPemohon)

@section('breadcrumb')
<li class="breadcrumb-item">Laporan</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::report.retribusi') !!}">Retribusi IMB</a></li>
<li class="breadcrumb-item active">{!! $namaPemohon !!}</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" onclick="window.print()"><i class="icon-pencil icons"> Cetak</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#pdfModal"><i class="icon-trash icons"> PDF</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="icon-doc icons"></i>
          <strong>Laporan </strong>
          <small>Retribusi IMB</small>
        </div>
        <div class="card-body text-dark">
          <div class="row mb-4">

            <div class="col-sm-4">
              <h6 class="mb-3">Biaya Retribusi IMB:</h6>
              <div>{!! $rImbRetribusi->imb->jenis_bangunan !!}</div>
            </div>
            <!--/.col-->

            <div class="col-sm-4">
              <h6 class="mb-3">Permohonan:</h6>
              <div>Nama: {!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbPemohonAll($rImbRetribusi->imb->imb_pemohon_id), 'nama') !!}</div>
              <div>Nomor: {!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbPemohonAll($rImbRetribusi->imb->imb_pemohon_id), 'id') !!}</div>
            </div>
            <!--/.col-->
            <div class="col-sm-4">
              <h6 class="mb-3">Alamat Pehohon:</h6>
              <div>
                <strong></strong>
              </div>
              <div>Diatas Tanah HM / HGB / Suku: {!! $rImbRetribusi->imb->status_tanah !!}</div>
              <div>Lokasi Bangunan: {!! $rImbRetribusi->imb->jalan . ' Kelurahan ' . $rImbRetribusi->imb->kelurahan !!}</div>
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
                <td class="left">a. Luas Bangunan: {!! $rImbRetribusi->luas_bangunan !!} m<sup>2</sup></td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">b. Tingkat Bangunan: {!! \sigimbbkt\Libraries\StringMod::setRomawi($rImbRetribusi->tingkat_bangunan) !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">c. Guna Bangunan: {!! $rImbRetribusi->guna_bangunan !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">d. Jenis Bangunan: {!! $rImbRetribusi->jenis_bangunan !!}</td>
                <td class="right">Koefisien: {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) !!}</td>
              </tr>
              <tr>
                <td class="left">e. Lokasi / Kawasan: {!! $rImbRetribusi->lokasi_kawasan !!}. Jalan {!! $rImbRetribusi->lokasi_jalan !!}. Kelurahan {!! $rImbRetribusi->lokasi_kelurahan !!}</td>
                <td class="right">(Tarif Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},- per-izin)</td>
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
                <td class="left">* Bangunan Baru: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) !!} x Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
                <td class="right">= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
              </tr>
              <tr>
                <td class="left">* Bangunan Renovasi / Perbaikan / Rehabilitasi = 30 % a Patokan Dasar</td>
              </tr>
              <tr>
                <td class="left">&nbsp;&nbsp;&nbsp;(30 % x Rp {!! $rImbRetribusi->patokan_dasar !!},-)</td>
                <td class="right">= Rp {!! $rImbRetribusi->patokan_dasar / 100 * 30 !!},-</td>
              </tr>
              <tr>
                <td class="left">* Plank Izin</td>
                <td class="right">= Rp {!! $rImbRetribusi->plank_izin !!},-</td>
              </tr>
              <tr>
                <td class="left">&nbsp;&nbsp;&nbsp;Jumlah</td>
                <td class="right">= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
              </tr>
              <tr>
                <td class="left">Terbilang: </td>
                {{--                <td class="right">{!! \sigimbbkt\Libraries\Calculation::terbilang(\sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan)) !!}</td>--}}
              </tr>
              <tr>
                {{--                <td class="left">{!! \sigimbbkt\Libraries\Calculation::terbilang(123) !!}</td>--}}
              </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Laporan Imb-->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Dialog Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Pilih jenis kertas&hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <a href="{!! route('front_office::report.pdf-retribusi', [$rImbRetribusi->id, 'a4']) !!}" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" target="_blank"><i class="fa fa-file-pdf-o" title="Kertas A4"> A4</i></a>
        <a href="{!! route('front_office::report.pdf-retribusi', [$rImbRetribusi->id, 'f4']) !!}" class="btn btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left" target="_blank"><i class="fa fa-file-pdf-o" title="Kertas F4"> F4</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection