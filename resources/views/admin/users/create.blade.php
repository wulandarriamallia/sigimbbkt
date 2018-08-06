@extends('layouts.master')

@section('title', 'Tambah Data Operator')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="m-b-xs">Form Pengguna Baru</div>
        </div>
        <div class="panel-body">
          @include('partials.messages')
          {{ Form::open(['action' => 'UserController@store', 'class' => 'form-horizontal', 'role' => 'form']) }}
          <div class="form-group">
            {{ Form::label('roles', 'Hak Akses', ['class' => 'control-label col-md-2']) }}
            <div class="row">
              <div class="col-md-3">
                <select name="roles" id="roles" class="form-control" autocomplete="off">
                  <option value="-" selected>Pilih Hak Akses</option>
                  @foreach ($roles as $role)
                    @if ($role->id != 1)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div id="pejabat-form" style="display: none">

            <div class="form-group">
              {{ Form::label('nip', 'NIP', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nip', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('nama_pejabat', 'Nama Pejabat', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nama_pejabat', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('jabatan_id', 'Nama Jabatan', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('jabatan_id', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('scan_ttd', 'Scan Tanda Tangan', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('scan_ttd', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('foto', 'Foto Profil', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('foto', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

          </div>

          <div id="mahasiswa-form" style="display: none">

            <div class="form-group">
              {{ Form::label('nip', 'NIM', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nip', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('nama_mahasiswa', 'Nama Mahasiswa', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nama_mahasiswa', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('prodi_id', 'Program Studi', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('prodi_id', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('jenis_kelamin', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('agama', 'Agama', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('agama', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('tempat_lahir', 'Tempat Lahir', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('tanggal_lahir', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('tanggal_lahir', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('alamat', 'Alamat', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('alamat', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('no_hp', 'No. Handphone', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('no_hp', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('ipk', 'IPK', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('ipk', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('nama_wali', 'Nama Wali', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nama_wali', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('alamat_wali', 'Alamat Wali', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('alamat_wali', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('scan_ttd', 'Scan Tanda Tangan', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('scan_ttd', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('foto', 'Foto Profil', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('foto', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

          </div>

          <div id="staff-form" style="display: none">

            <div class="form-group">
              {{ Form::label('nip', 'NIP/NIK', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nip', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('nama_staff', 'Nama Staff', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('nama_staff', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('jabatan_id', 'Nama Jabatan', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('jabatan_id', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('scan_ttd', 'Scan Tanda Tangan', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('scan_ttd', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('foto', 'Foto Profil', ['class' => 'control-label col-md-2']) }}
              <div class="row">
                <div class="col-md-3">
                  {{ Form::text('foto', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <button class="btn btn-rounded btn-stroke btn-danger waves-effect" type="reset">Ulang</button>
              <button class="btn btn-rounded btn-stroke btn-primary waves-effect" type="submit">Simpan</button>
              <a class="btn btn-rounded btn-stroke btn-warning waves-effect" href="{{ route('adm::user.index') }}">Batal</a>
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
    {{--<div class="col-sm-12">--}}
      {{--<h5 class="no-margin m-b">Keterangan</h5>--}}
      {{--<ul class="list-group md-whiteframe-z0">--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Admin : Bisa Mengelola Semua Data--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator Umum : Hanya melakukan Ambil Nomor dan Melihat Arsip--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator A : Hanya Bisa mengelola Data Surat Aktif Kuliah dan Berkelakuan Baik--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator B : Hanya Bisa mengelola Data Surat Pembimbing dan Prariset--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator C : Hanya Bisa mengelola Data Surat Izin Riset dan Surat Dispensasi--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator D : Hanya Bisa mengelola Data Surat Magang--}}
        {{--</li>--}}
        {{--<li class="list-group-item text-ellipsis text-info">--}}
          {{--Operator E : Hanya Bisa mengelola Data Surat Bebas Pustaka--}}
        {{--</li>--}}
      {{--</ul>--}}
    {{--</div>--}}
  </div>
@endsection

@section('javascript')
  <script>
    $('#roles').change(function() {
      var val = $(this).val();

      switch(val) {
        case '2':
          $('#pejabat-form').show();
          $('#mahasiswa-form').hide();
          $('#staff-form').hide();
          break;
        case '3':
          $('#pejabat-form').hide();
          $('#mahasiswa-form').show();
          $('#staff-form').hide();
          break;
        case '4':
          $('#pejabat-form').hide();
          $('#mahasiswa-form').hide();
          $('#staff-form').show();
          break;
        default:
          $('#pejabat-form').hide();
          $('#mahasiswa-form').hide();
          $('#staff-form').hide();
      }

    });
  </script>
@endsection