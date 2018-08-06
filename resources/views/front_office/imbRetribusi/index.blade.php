@extends('layouts.master')

@section('title', 'Master Retribusi IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Retribusi IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="{!! route('front_office::imbRetribusi.create') !!}"><i class="icon-plus icons"> Retribusi IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data Retribusi</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="data-tables">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Tanggal Izin</th>
              <th class="text-center">Nama Pemohon</th>
              <th class="text-center">Guna Bangunan / Jenis Bangunan</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbRetribusis as $imbRetribusi)
            <tr>
              <td class="text-center">{!! $imbRetribusi->id !!}</td>
              <td>{!! \sigimbbkt\Libraries\TimeStamp::FormatDate3rd($imbRetribusi->created_at) !!}</td>
              <td>{!! $imbRetribusi->imb->imbPemohon->nama !!}</td>
              <td>{!! $imbRetribusi->guna_bangunan . '/' . $imbRetribusi->jenis_bangunan !!}</td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imbRetribusi.show', $imbRetribusi->id) !!}" data-toggle="tooltip" data-placement="top" title="Detail {!! $imbRetribusi->imb->imbPemohon->nama !!}"> <i class="icon-list icon"></i></a>
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
@endsection