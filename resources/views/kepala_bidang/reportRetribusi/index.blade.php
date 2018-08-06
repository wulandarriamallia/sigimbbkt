@extends('layouts.master')

@section('title', 'Laporan Retribusi IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Laporan</li>
<li class="breadcrumb-item"><a href="{!! route('kepala_bidang::report.retribusi') !!}">Retribusi IMB</a></li>
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
        <small>Retribusi IMB</small>
      </div>
      <div class="card-body text-dark p-0">
        {!! Form::open(['route' => 'kepala_bidang::report.post-retribusi', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="card-body">
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="tahun">Data Retribusi</label>
            <div class="col-md-9">
              <select class="form-control select2" name="retribusi_id" id="retribusi_id">
                <option disabled selected>Pilih Data Retribusi</option>
                @foreach ($imbRetribusis as $imbRetribusi)
                  <option value="{!! $imbRetribusi->id !!}">{!! $imbRetribusi->imb->imbPemohon->nama . ' - ' . $imbRetribusi->guna_bangunan . '/' . $imbRetribusi->jenis_bangunan !!}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-paper-clip icons"> Buat</i></button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
