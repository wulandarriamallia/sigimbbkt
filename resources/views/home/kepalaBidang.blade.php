@extends('layouts.master')

@section('title', 'Dasbor Kepala Bidang')

@section('breadcrumb')
@endsection

@section('breadcrumb-menu')
@endsection

@section('content')
<div class="animated fadeIn">
  <div class="row">

    {{--<div class="col-sm-6 col-lg-3">--}}
      {{--<div class="card text-white bg-danger">--}}
        {{--<div class="card-body pb-0">--}}
          {{--<div class="btn-group float-right">--}}
            {{--<button type="button" class="btn btn-transparent p-0 float-right">--}}
              {{--<i class="fa fa-id-badge"></i>--}}
            {{--</button>--}}
          {{--</div>--}}
          {{--<h4 class="mb-0" id="users">0</h4>--}}
          {{--<p>Pengguna</p>--}}
        {{--</div>--}}
        {{--<div class="px-3" style="height:50px;">--}}
          {{--<a href="{!! route('kepala_bidang::user.index') !!}" class="btn btn-outline-dark pull-right"><i class="fa fa-sign-in"></i>&nbsp; Lihat</a>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
    <!--/.col-->

  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-5">
              <h3 class="card-title clearfix mb-0">Informasi Login</h3>
            </div>
          </div>
          <hr class="m-0">
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <ul class="horizontal-bars type-2">
                @php
                  use Jenssegers\Agent\Agent;

                  $agent = new Agent();

                  // Browser
                  $browser = $agent->browser();
                  $browser_version = $agent->version($browser);
                  // Platform
                  $platform = $agent->platform();
                  $platform_version = $agent->version($platform);
                @endphp
                <li>
                  <i class="icon-user"></i>
                  <span class="title">Login Terakhir</span>
                  <span class="value">{!! \sigimbbkt\Libraries\TimeStamp::differToHumanTimestamp(Sentinel::getUser()->last_login) !!}</span>
                </li>
                <li>
                  <i class="icon-user"></i>
                  <span class="title">IP Address</span>
                  <span class="value">{!! Request::ip() !!}</span>
                </li>
                <li>
                  <i class="icon-user"></i>
                  <span class="title">Hostname</span>
                  <span class="value">{!! gethostname() . ' ' . $agent->device() !!}</span>
                </li>
                <li>
                  <i class="icon-user"></i>
                  <span class="title">Operating System</span>
                  <span class="value">{!! $platform . ' ' . $platform_version !!}</span>
                </li>
                <li>
                  <i class="icon-user"></i>
                  <span class="title">Web Browser</span>
                  <span class="value">{!! $browser . ' ' . $browser_version !!}</span>
                </li>
              </ul>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <br>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

</div>
@endsection
