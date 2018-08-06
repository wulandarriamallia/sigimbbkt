@extends('layouts.master')

@section('title', 'Laporan Izin Mendirikan Bangunan (IMB) ' . $tahun)

@section('breadcrumb')
<li class="breadcrumb-item">Laporan</li>
<li class="breadcrumb-item"><a href="{!! route('kepala_bidang::report.imb') !!}">IMB</a></li>
<li class="breadcrumb-item active">{!! $tahun !!}</li>
@endsection

@section('breadcrumb-menu')
{{--<a class="btn" href="#" onclick="window.print()"><i class="icon-printer icons"> Cetak</i></a>--}}
<a class="btn" href="#" data-toggle="modal" data-target="#pdfModal"><i class="fa fa-file-pdf-o"> PDF</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="icon-doc icons"></i>
          <strong>Laporan </strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark">
          <table class="table table-sm" style="font-size: .8em" id="data-tables-report">
            <thead>
              <tr>
                <th class="text-center">NO. URUT</th>
                <th class="text-center" width="13%">NO IZIN</th>
                <th class="text-center">TGL IZIN</th>
                <th class="text-center">NAMA PEMOHON</th>
                <th class="text-center">GUNA BANGUNAN / JENIS BANGUNAN</th>
                <th class="text-center" colspan="2">LUAS BANGUNAN</th>
                <th class="text-center" colspan="2">TINGKAT BANGUNAN</th>
                <th class="text-center">LOKASI BANGUNAN</th>
                <th class="text-center">KECAMATAN</th>
                <th class="text-center">KELURAHAN</th>
              </tr>
            </thead>
            <tbody>
            @if ($rImbs->isEmpty())
              <tr>
                <td class="text-center" colspan="12"><i>Tidak ada data...</i></td>
              </tr>
            @else
              @foreach ($rImbs as $rImb)
              <tr>
                <td class="text-center">{!! $rImb->id !!}</td>
                <td>648 {!! $rImb->id !!} /BP2TPM-PP/{!! $tahun !!}</td>
                <td>{!! \sigimbbkt\Libraries\TimeStamp::FormatDate3rd($rImb->created_at) !!}</td>
                <td>{!! $rImb->imbPemohon->nama !!}</td>
                <td>{!! $rImb->jenis_bangunan . '/' . \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'jenis_bangunan') !!}</td>
                <td class="text-center">{!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'luas_bangunan') !!}</td>
                <td class="text-center">M<sup>2</sup></td>
                <td class="text-center">{!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'tingkat_bangunan') !!}</td>
                <td class="text-center">Lantai</td>
                <td>{!! $rImb->jalan !!}</td>
                <td>{!! $rImb->kecamatan !!}</td>
                <td>{!! $rImb->kelurahan !!}</td>
              </tr>
              @endforeach
            @endif
            </tbody>
          </table>
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
        <a href="{!! url('/', null, false) !!}/kepala_bidang/report/imb/{!! $tahun !!}/a4" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" target="_blank"><i class="fa fa-file-pdf-o" title="Kertas A4"> A4</i></a>
        <a href="{!! url('/', null, false) !!}/kepala_bidang/report/imb/{!! $tahun !!}/f4" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" target="_blank"><i class="fa fa-file-pdf-o" title="Kertas F4"> F4</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection