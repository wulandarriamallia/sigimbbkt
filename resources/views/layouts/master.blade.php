@include('partials.header')
<!-- End-Header -->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  <!-- navigation-menu -->
  @include('partials.navigation')
  <!-- / navigation-menu -->

  <div class="app-body">

    <!-- aside -->
    @include('partials.sidebar')
    <!-- / aside -->

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! url(\sigimbbkt\Libraries\IdConversion::getUserRole() . '/home') !!}">Dasbor {!! \sigimbbkt\Libraries\IdConversion::getUserRole2nd() !!}</a></li>
        @yield('breadcrumb')

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group">
            @yield('breadcrumb-menu')
          </div>
        </li>
      </ol>

      <div class="container-fluid">
        <div id="ui-view">@yield('content')</div>
      </div>
      <!-- /.conainer-fluid -->
    </main>

  </div>

  <footer class="app-footer">
    <a href="{!! url(\sigimbbkt\Libraries\IdConversion::getUserRole() . '/home') !!}">{!! Config::get('app.alias') !!}</a> v{!! Config::get('app.version') !!} &copy; {!! Config::get('app.production') !!} - <a href="https://www.classicnite.com">{!! Config::get('app.author') !!}</a>.
    <span class="float-right">Dinas Penanaman Modal Pelayanan Terpadu dan Satu Pintu Perindustrian dan Tenaga Kerja <a href="">{!! Config::get('app.subName') !!}</a></span>
  </footer>

<!-- Start-Footer -->
@include('partials.footer')