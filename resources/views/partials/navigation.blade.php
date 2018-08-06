<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">&#9776;</button>
  <a class="navbar-brand" href="{!! url(\sigimbbkt\Libraries\IdConversion::getUserRole() . '/home') !!}"></a>
  <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">&#9776;</button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="{!! url('/') !!}"><i class="fa fa-map-signs white"></i>&nbsp;&nbsp;Lokasi IMB</a>
    </li>
    @if (Sentinel::inRole('front_office'))
    <li class="nav-item px-3">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-plus white"></i>&nbsp;&nbsp;Tambah
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{!! route('front_office::imb.create') !!}">Izin</a>
          <a class="dropdown-item" href="{!! route('front_office::imbRetribusi.create') !!}">Retribusi</a>
          <a class="dropdown-item" href="{!! route('front_office::imbSpasial.create') !!}">Spasial</a>
        </div>
      </div>
    </li>
    @endif
  </ul>
  <ul class="nav navbar-nav ml-auto">

    <li class="nav-item dropdown d-md-down-none" onclick="markNotificationAsRead('{!! count(Sentinel::getUser()->unreadNotifications) !!}')">
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="icon-bell"></i><span class="badge badge-pill badge-danger">{!! count(Sentinel::getUser()->unreadNotifications) !!}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg" style="min-width: 380px">
        <div class="dropdown-header text-center">
          <strong>Anda memiliki {!! count(Sentinel::getUser()->unreadNotifications) !!} notifikasi</strong>
        </div>

        @forelse ( Sentinel::getUser()->unreadNotifications as $notification)
          @include('partials.notification.' . snake_case(class_basename($notification->type)))
        @empty
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation text-info"></i>
            Tidak ada notifikasi yang belum dibaca.
          </a>
        @endforelse
      </div>
    </li>

    <li class="nav-item d-md-down-none">
      <a class="nav-link" href="#" onclick="toggleFullScreen()"><i class="icon-frame icons"></i></a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="{!! \sigimbbkt\Libraries\Generator::genProfilePicture(Sentinel::getUser()->roles()->first()->slug, Sentinel::getUser()->photo) !!}" class="img-avatar" alt="{!! Sentinel::getUser()->username !!}">
        <span class="d-md-down-none">{!! Sentinel::getUser()->username !!}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Panel {!! Sentinel::getUser()->username !!}</strong>
        </div>
        <a class="dropdown-item" href="{!! route('auth.profile') !!}"><i class="fa fa-user"></i> Profil</a>
        @if (Sentinel::inRole('su') || Sentinel::inRole('admin'))
        <a class="dropdown-item" href="{!! route('adm::pengaturan.index') !!}"><i class="fa fa-wrench"></i> Pengaturan</a>
        <a class="dropdown-item" href="{!! route('adm::backup.index') !!}"><i class="fa fa-database"></i> Backup Database</a>
        @endif
        <div class="divider"></div>
        <form action="{!! route('auth.post-logout') !!}" method="POST" id="logout-form" style="cursor: pointer">
          {!! csrf_field() !!}
          <a class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
            <i class="fa fa-lock"></i>
            <span>Keluar</span>
          </a>
        </form>
      </div>
    </li>
  </ul>
</header>