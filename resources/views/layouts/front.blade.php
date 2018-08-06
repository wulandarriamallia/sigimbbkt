<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#000000">
  <meta name="description" content="@yield('title') - {!! Config::get('app.mainName') . Config::get('app.subName') !!}">
  <meta name="author" content="{!! Config::get('app.author') !!}">
  <meta name="keyword" content="sistem,informasi,geografis,izin,mendirikan,bangunan,kota,bukittinggi">
  <link rel="shortcut icon" href="{!! asset('assets/img/favicon.png') !!}" type="image/png" />
  <title>@yield('title') - {!! Config::get('app.mainName') . Config::get('app.subName') !!}</title>


  <!-- End-External-Styles -->

  <link rel="stylesheet" href="{!! elixir('assets/css/master.min.css') !!}">
  <link rel="stylesheet" href="{!! elixir('assets/css/app.min.css') !!}">
  <!-- End-Include-Styles -->

  @yield('style')
  <!-- End-Inline-Style -->
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">&#9776;</button>
    <a class="navbar-brand" href="{!! url('/') !!}"></a>

    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-question-circle white"></i>&nbsp;&nbsp;Tentang {!! Config::get('app.alias') !!}</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="legend-btn"><i class="fa fa-map-signs white"></i>&nbsp;&nbsp;Legenda</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="persyaratan-btn"><i class="fa fa-ticket white"></i>&nbsp;&nbsp;Persyaratan Izin</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="alur-btn"><i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;Alur Izin</a>
      </li>
      @if (Sentinel::check())
      <li class="nav-item px-3">
        <a class="nav-link" href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="imb-btn"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Tambah IMB</a>
      </li>
      @endif
      @if (Sentinel::guest())
      <li class="nav-item px-3">
        <a class="nav-link" href="{!! action('Auth\RegisterController@register') !!}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Daftar Pemohon IMB</a>
      </li>
      @endif
      @if (Sentinel::check())
        <li class="nav-item px-3">
          <a class="nav-link" href="{!! url(\sigimbbkt\Libraries\IdConversion::getUserRole() . '/home') !!}"><i class="icon-speedometer icons"></i>&nbsp;&nbsp;Dasbor</a>
        </li>
      @endif
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#" onclick="toggleFullScreen()"><i class="icon-frame icons"></i></a>
      </li>
      @if (Sentinel::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('assets/img/user.jpg') }}" class="img-avatar" alt="{{ Sentinel::getUser()->username }}">
          <span class="d-md-down-none">{{ Sentinel::getUser()->username }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Panel {!! Sentinel::getUser()->username !!}</strong>
          </div>
          <a class="dropdown-item" href="{!! route('auth.profile') !!}"><i class="fa fa-user"></i> Profil</a>
          @if (Sentinel::inRole('su') && Sentinel::inRole('admin'))
          <a class="dropdown-item" href="{!! route('front_office::pengaturan.index') !!}"><i class="fa fa-wrench"></i> Pengaturan</a>
          @endif
          <div class="divider"></div>
          <form action="{{ route('auth.post-logout') }}" method="POST" id="logout-form" style="cursor: pointer">
            {!! csrf_field() !!}
            <a class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
              <i class="fa fa-lock"></i>
              <span>Keluar</span>
            </a>
          </form>
        </div>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="{{ secure_asset('assets/img/guest.png') }}" class="img-avatar" alt="guest">
          <span class="d-md-down-none">IMB Pemohon</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Panel</strong>
          </div>
          <a class="dropdown-item" href="{!! route('auth.login') !!}"><i class="fa fa-user"></i> Masuk Dasbor</a>
          <div class="divider"></div>
        </div>
      </li>
      @endif
    </ul>
  </header>

  <div class="app-body">

    {{--<div class="sidebar">--}}
      {{--<nav class="sidebar-nav">--}}
        {{--<form class="form-row align-items-center">--}}
          {{--<div class="col-sm-12">--}}
            {{--<input class="form-control mb-2 mb-sm-0" type="search" id="pencarian" autocomplete="off" placeholder="Pencarian IMB...">--}}
          {{--</div>--}}
        {{--</form>--}}

        {{--<table id="imbPemohons" style="margin: 0 10px">--}}
          {{--<tr class="header">--}}
            {{--<th>Daftar IMB</th>--}}
          {{--</tr>--}}
          {{--<!--Tampilkan Semua Data IMB-->--}}
          {{--@forelse ($detailPoligons as $detailPoligon)--}}
          {{--<tr>--}}
            {{--<td>--}}
              {{--<a class="btn" href="#" data-toggle="modal" data-target="#showImb{!! $detailPoligon->id !!}Modal">&nbsp;IMB{!! $detailPoligon->id !!}-{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($detailPoligon->nama) !!}</a>--}}
            {{--</td>--}}
          {{--</tr>--}}
          {{--@empty--}}
          {{--<tr>--}}
            {{--<td><i>Tidak ada data...</i></td>--}}
          {{--</tr>--}}
          {{--@endforelse--}}
        {{--</table>--}}

      {{--</nav>--}}
    {{--</div>--}}

    <!-- Main content -->
    <main class="main" style="margin-left: 0 !important">

      <div class="container-fluid" style="padding: 0 10px !important;">
        <div id="ui-view">@yield('content')</div>
      </div>
      <!-- /.conainer-fluid -->
    </main>

  </div>

  <!--Modal - Show Imb-pemohon-->
  {{--@foreach ($imbPemohons as $imbPemohon)--}}
  {{--<div class="modal fade" id="showImb{!! $imbPemohon->id !!}Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-lg modal-primary" role="document">--}}
      {{--<div class="modal-content">--}}
        {{--<div class="modal-header">--}}
          {{--<h4 class="modal-title">Informasi Bangunan</h4>--}}
          {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span>--}}
          {{--</button>--}}
        {{--</div>--}}
        {{--<div class="modal-body">--}}
          {{--<table class="table table-condensed table-striped table-bordered" id="imbPemohons">--}}
            {{--<thead></thead>--}}
            {{--<tbody>--}}
            {{--<tr>--}}
              {{--<td>Calon Pemilik</td><td>{!! $imbPemohon->nama !!}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Koordinat</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--@if (isset($imb->imbSpasial))--}}
                    {{--POLYGON {!! $imb->imbSpasial->polygon !!}--}}
                  {{--@endif--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Alamat</td><td>{!! $imbPemohon->alamat !!}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Luas Tanah</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--@if (isset($imb->imbSpasial))--}}
                    {{--{!! $imb->imbSpasial->area !!} M2--}}
                  {{--@endif--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Status Tanah</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--{!! $imb->status_tanah !!}--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Kecamatan</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--{!! $imb->kecamatan !!}--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Kelurahan</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--{!! $imb->kelurahan !!}--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
              {{--<td>Peruntukan</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--{!! $imb->peruntukkan !!}--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
          {{--</table>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<!-- /.modal-content -->--}}
    {{--</div>--}}
    {{--<!-- /.modal-dialog -->--}}
  {{--</div>--}}
  {{--<!-- /.modal -->--}}
  {{--@endforeach--}}

  <footer class="app-footer" style="margin-left: 0 !important">
    <a href="{!! url('/') !!}">{!! Config::get('app.alias') !!}</a> v{!! Config::get('app.version') !!} &copy; {!! Config::get('app.production') !!} -
    <a href="https://www.classicnite.com">{!! Config::get('app.author') !!}</a>.
    <span class="float-right">Dinas Penanaman Modal Pelayanan Terpadu dan Satu Pintu Perindustrian dan Tenaga Kerja <a href="">{!! Config::get('app.subName') !!}</a></span>
  </footer>

<!-- Start-Footer -->
@include('partials.footer')
