@extends('layouts.master')

@section('title', 'Backup Database')

@section('breadcrumb')
<li class="breadcrumb-item">Pengaturan</li>
<li class="breadcrumb-item active">Backup Database</li>
@endsection

@section('breadcrumb-menu')
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-database"></i>
          <strong>Daftar</strong>
          <small>File Backup</small>
        </div>
        <div class="card-body">
          <table class="table table-condensed">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama File</th>
              <th>Ukuran File</th>
              <th>Tanggal Backup</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($backups as $key => $backup)
              <tr>
                <td>{!! $key + 1 !!}</td>
                <td>{!! $backup->getFilename() !!}</td>
                <td>{!! \sigimbbkt\Libraries\StringMod::formatSizeUnits($backup->getSize()) !!}</td>
                <td>{!! date('Y-m-d H:i:s', $backup->getMTime()) !!}</td>
                <td class="text-center">
                  <a href="{!! route('adm::backup.index', ['action' => 'restore', 'file_name' => $backup->getFilename()]) !!}"
                     id="restore_{!! str_replace('.gz', '', $backup->getFilename()) !!}"
                     class="btn btn-warning btn-xs"
                     title="Download"><i class="fa fa-rotate-left"></i></a>
                  <a href="{!! route('adm::backup.download', [$backup->getFilename()]) !!}"
                     id="download_{!! str_replace('.gz', '', $backup->getFilename()) !!}"
                     class="btn btn-info btn-xs"
                     title="Download File Backup"><i class="fa fa-download"></i></a>
                  <a href="{!! route('adm::backup.index', ['action' => 'delete', 'file_name' => $backup->getFilename()]) !!}"
                     id="del_{!! str_replace('.gz', '', $backup->getFilename()) !!}"
                     class="btn btn-danger btn-xs"
                     title="Hapus File Backup"><i class="fa fa-remove"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3">Tidak ada file backup yang tersedia...</td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
    <div class="col-lg-4">
      @include('admin.backups.forms')
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
@endsection
