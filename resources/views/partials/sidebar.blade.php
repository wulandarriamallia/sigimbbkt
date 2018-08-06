<div class="sidebar">
  <nav class="sidebar-nav" style="overflow: hidden">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{!! url(\sigimbbkt\Libraries\IdConversion::getUserRole() . '/home') !!}"><i class="icon-speedometer icons"></i> Dasbor</a>
      </li>

      @if (Sentinel::inRole('front_office'))
      <li class="nav-title">
        Data Master
      </li>

      <!--IMB-->
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-sticky-note-o"></i> IMB</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{!! route('front_office::imbPemohon.index') !!}"><i class="fa fa-child"></i> Pemohon</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{!! route('front_office::imb.index') !!}"><i class="fa fa-exclamation"></i> Izin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{!! route('front_office::imbCheck.index') !!}"><i class="fa fa-check-circle"></i> Rencana Tata Letak Bangunan</a>
          </li>
          {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{!! route('front_office::imbEvaluasi.index') !!}"><i class="fa fa-calendar-check-o"></i> Evaluasi</a>--}}
          {{--</li>--}}
          <li class="nav-item">
            <a class="nav-link" href="{!! route('front_office::imbRetribusi.index') !!}"><i class="fa fa-calculator"></i> Retribusi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{!! route('front_office::imbSpasial.index') !!}"><i class="fa fa-map-marker"></i> Spasial</a>
          </li>
        </ul>
      </li>

      <li class="divider"></li>
      <li class="nav-title">
        Laporan
      </li>
      <!--Laporan IMB-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('front_office::report.imb') !!}"><i class="icon-doc icons"></i> IMB</a>
      </li>
      <!--Laporan Retribusi-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('front_office::report.retribusi') !!}"><i class="icon-doc icons"></i> Retribusi</a>
      </li>
      @endif

      @if (Sentinel::inRole('kepala_bidang'))
      <li class="divider"></li>
      <li class="nav-title">
        Laporan
      </li>

      <!--Laporan IMB-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('kepala_bidang::report.imb') !!}"><i class="icon-doc icons"></i> IMB</a>
      </li>
      <!--Laporan Retribusi-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('kepala_bidang::report.retribusi') !!}"><i class="icon-doc icons"></i> Retribusi</a>
      </li>
      @endif

      @if (Sentinel::inRole('admin'))
      <li class="nav-title">
        Data Master
      </li>

      <!--IMB-->
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{!! route('adm::imbPemohon.index') !!}"><i class="fa fa-child"></i> Pemohon</a>--}}
      {{--</li>--}}

      <!--Semua Data Pengguna Sistem-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('adm::user.index') !!}"><i class="fa fa-id-badge"></i> Pengguna</a>
      </li>
      @endif

      @if (Sentinel::inRole('pemohon'))
      <!--Semua Data IMB Pengguna-->
      <li class="nav-item">
        <a class="nav-link" href="{!! route('pemohon::imb.index') !!}"><i class="icon-doc icons"></i> IMB Saya</a>
      </li>
      @endif

    </ul>
  </nav>
</div>