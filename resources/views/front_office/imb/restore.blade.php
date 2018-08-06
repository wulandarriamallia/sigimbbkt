@extends('layouts.master')

@section('title', 'Master IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imb.index') !!}">IMB</a></li>
<li class="breadcrumb-item active">Arsip Data IMB</li>
@endsection

@section('breadcrumb-menu')
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data </strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="data-tables">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Nama Pemohon</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">No. Agenda</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbs as $imb)
            <tr>
              <td class="text-center">{!! $imb->id !!}</td>
              <td>{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($imb->imbPemohon->nama) !!}</td>
              <td>{!! \sigimbbkt\Libraries\TimeStamp::FormatDate($imb->created_at) !!}</td>
              <td>{!! \sigimbbkt\Libraries\StringMod::getNomorAgenda($imb->id, $imb->created_at) !!}</td>
              <td class="text-center">
                {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imb.restoreImb', $imb->id], 'style' => 'display:inline']) !!}
                <button type="submit" class="btn btn-danger btn-sm btn-ladda ladda-button" data-color="blue" data-style="slide-left" data-toggle="tooltip" data-placement="top" title="Kembalikan Data {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($imb->imbPemohon->nama) !!}"><i class="icon-action-undo icons"> </i></button>
                {!! Form::close() !!}
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