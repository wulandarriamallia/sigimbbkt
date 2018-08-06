@extends('layouts.master')

@section('title', 'Laporan Izin Mendirikan Bangunan (IMB)')

@section('breadcrumb')
<li class="breadcrumb-item">Laporan</li>
<li class="breadcrumb-item"><a href="{!! route('kepala_bidang::report.imb') !!}">IMB</a></li>
<li class="breadcrumb-item active">Buat</li>
@endsection

@section('breadcrumb-menu')
@endsection

@section('content')
<div class="row row-sm">
  <div class="col-sm-12">
    <div class="card card-accent-primary">
      <div class="card-header">
        <i class="icon-doc icons"></i>
        <strong>Buat Laporan </strong>
        <small>Izin Mendirikan Bangunan (IMB)</small>
      </div>
      <div class="card-body text-dark p-0">
        {{ Form::open(['route' => 'kepala_bidang::report.post-imb', 'class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="card-body">
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="tahun">Pilih Tahun</label>
            <div class="col-md-2">
              {!! Form::selectYear('tahun', 2017, 2020, null, ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-paper-clip icons"> Buat</i></button>
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection
