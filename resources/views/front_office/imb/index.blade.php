@extends('layouts.master')

@section('title', 'Master IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="{!! route('front_office::imb.create') !!}" ><i class="icon-plus icons"> IMB</i></a>
<a class="btn" href="{!! route('front_office::imb.restore') !!}" ><i class="icon-action-undo icons"> Data</i></a>
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
              <th class="text-center">Status</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbs as $key => $imb)
            <tr>
              <td class="text-center">{!! $key + 1 !!}</td>
              <td>{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($imb->imbPemohon->nama) !!}</td>
              <td>{!! \sigimbbkt\Libraries\TimeStamp::FormatDate2nd($imb->created_at) !!}</td>
              <td>{!! \sigimbbkt\Libraries\StringMod::getNomorAgenda($imb->id, $imb->created_at) !!}</td>
              <td class="text-center">{!! \sigimbbkt\Libraries\StringMod::setStatusImb($imb->status) !!}</td>
              <td class="text-center">
                @if ($imb->status)
                  <a class="btn btn-danger btn-sm btn-ladda ladda-button" data-color="blue" data-style="slide-left" href="{!! route('front_office::imb.selesai', [$imb->id, 0]) !!}" data-toggle="tooltip" data-placement="top" title="Batalkan Status"> <i class="icon-ban icons"></i></a>
                @else
                  <a class="btn btn-warning btn-sm btn-ladda ladda-button" data-color="blue" data-style="slide-left" href="{!! route('front_office::imb.selesai', [$imb->id, 1]) !!}" data-toggle="tooltip" data-placement="top" title="Ubah Status"> <i class="icon-check icons"></i></a>
                @endif
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imb.show', ['id' => $imb->id]) !!}" data-toggle="tooltip" data-placement="top" title="Detail {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($imb->imbPemohon->nama) !!}"> <i class="icon-list"></i></a>
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