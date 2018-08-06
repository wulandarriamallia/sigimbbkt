@extends('layouts.master')

@section('title', 'Profil ' . $u['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('adm::user.index') !!}">Pengguna</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
@if ($activation)
<a class="btn" href="#" data-toggle="modal" data-target="#nonactivationModal"><i class="icon-pencil icons"> Non-Aktifkan</i></a>
@else
<a class="btn" href="#" data-toggle="modal" data-target="#activationModal"><i class="icon-pencil icons"> Aktifkan</i></a>
@endif
<a class="btn" href="{!! route('adm::user.change-password', ['id' => $u['id']]) !!}"><i class="icon-key"> Ubah Password</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash"> Hapus</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-4">
      <div class="panel panel-card">
        <div class="card card-accent-primary text-center">
          <div class="card-header">
            <div style="background:url({!! \sigimbbkt\Libraries\Generator::genProfilePicture($u['role'], $u['photo']) !!}) center center; background-size:cover; width: 100%; height: 500px; max-height: 100%"></div>
          </div>
          <div class="card-body">
            <footer>Hak Akses
              <cite title="Source Title">{!! \sigimbbkt\Libraries\StringMod::setUserPermission($u['role']) !!}</cite>
            </footer>
            <footer>Status
              <cite title="Source Title">{!! \sigimbbkt\Libraries\StringMod::setUserStatus3rd(Activation::completed($show)) !!}</cite>
            </footer>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="card card-accent-primary">
        <div class="card-header">Identitas</div>
        <div class="card-body p-0">
          @if ($u['role'] == 'front_office')
          <div class="list-group-item">
            <div class="block font-bold">NIP</div>
            {!! $u['title'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Lengkap</div>
            {!! $u['subTitle'] !!}
          </div>
          @elseif ($u['role'] == 'kepala_bidang')
            <div class="list-group-item">
              <div class="block font-bold">NIP</div>
              {!! $u['title'] !!}
            </div>
            <div class="list-group-item">
              <div class="block font-bold">Nama Lengkap</div>
              {!! $u['subTitle'] !!}
            </div>
          @elseif ($u['role'] == 'admin')
            <div class="list-group-item">
              <div class="block font-bold">NIP</div>
              {!! $u['title'] !!}
            </div>
            <div class="list-group-item">
              <div class="block font-bold">Nama Lengkap</div>
              {!! $u['subTitle'] !!}
            </div>
          @elseif ($u['role'] == 'pemohon')
            <div class="list-group-item">
              <div class="block font-bold">KTP</div>
              {!! $u['title'] !!}
            </div>
            <div class="list-group-item">
              <div class="block font-bold">Nama Lengkap</div>
              {!! $u['subTitle'] !!}
            </div>
          @elseif ($u['role'] == 'pemohon')
            <div class="list-group-item">
              <div class="block font-bold">KTP</div>
              {!! $u['title'] !!}
            </div>
            <div class="list-group-item">
              <div class="block font-bold">Nama Lengkap</div>
              {!! $u['subTitle'] !!}
            </div>
          @elseif ($u['role'] == 'su')
          <div class="list-group-item">
            <div class="block font-bold">Username</div>
            {!! $u['title'] !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Administrator</div>
            {!! $u['subTitle'] !!}
          </div>
          @endif
        </div>
      </div>
      <div class="card card-accent-primary">
        <div class="card-header">Akun</div>
        <div class="card-body p-0">
          <div class="list-group-item">
            <div class="block font-bold">Tanggal Pendaftaran</div>
            {!! \sigimbbkt\Libraries\TimeStamp::FormatDateTime($u['created_at']) !!}
          </div>
          @if ($activation)
          <div class="list-group-item">
            <div class="block font-bold">Tanggal Aktivasi</div>
            {!! \sigimbbkt\Libraries\TimeStamp::FormatDateTime($activation->completed_at) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Tanggal Perbarui</div>
            {!! \sigimbbkt\Libraries\TimeStamp::FormatDateTime($activation->updated_at) !!}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Non-Aktifkan Pengguna-->
<div class="modal fade" id="nonactivationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Dialog Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda ingin menonaktifkan ({!! $u['title'] !!}) {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['subTitle']) !!}&hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <a class="btn btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left" href="{!! route('adm::user.activate', [$u['id'], 0]) !!}"><i class="icon-check icons"> Non-Aktifkan</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Aktifkan Pengguna-->
<div class="modal fade" id="activationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Dialog Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda ingin mengaktifkan ({!! $u['title'] !!}) {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['subTitle']) !!}&hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <a class="btn btn-success btn-ladda ladda-button" data-color="blue" data-style="slide-left" href="{!! route('adm::user.activate', [$u['id'], 1]) !!}"><i class="icon-check icons"> Aktifkan</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Hapus Pengguna-->
<div class="modal fade" id="remModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Dialog Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda ingin menghapus data ({!! $u['title'] !!}) {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($u['subTitle']) !!} &hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['adm::user.destroy', $u['id']], 'style' => 'display:inline']) !!}
        <button type="submit" class="btn btn-danger btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-trash icons" title="Hapus Pegawai"> Hapus</i></button>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection