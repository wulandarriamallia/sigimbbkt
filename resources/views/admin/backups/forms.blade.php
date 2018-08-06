@if (Request::get('action') == 'delete' && Request::has('file_name'))
  <div class="card card-danger">
    <div class="card-header">
      <i class="fa fa-database"></i>
      <strong>Hapus</strong>
      <small>File Backup</small>
    </div>
    <div class="card-body">
      <p>Anda yakin untuk menghapus file ini?</p>
    </div>
    <div class="card-footer">
      <a href="{!! route('adm::backup.index') !!}" class="btn btn-default">Batalkan</a>
      <form action="{!! route('adm::backup.destroy', Request::get('file_name')) !!}" method="post" class="pull-right">
        {!! method_field('delete') !!}
        {!! csrf_field() !!}
        <input type="hidden" name="file_name" value="{!! Request::get('file_name') !!}">
        <input type="submit" class="btn btn-danger" value="Hapus file ini!">
      </form>
    </div>
  </div>
@endif

@if (Request::get('action') == 'restore' && Request::has('file_name'))
  <div class="card card-warning">
    <div class="card-header">
      <i class="fa fa-database"></i>
      <strong>Restore Database</strong>
      <small>Dari File</small>
    </div>
    <div class="card-body">
      <p>Apakah anda yakin mengembalikan database dengan file backup ini? <br><br>Pastikan database <strong>Anda telah di backup.</strong></p>
    </div>
    <div class="card-footer">
      <a href="{!! route('adm::backup.index') !!}" class="btn btn-default">Batal</a>
      <form action="{!! route('adm::backup.restore', Request::get('file_name')) !!}"
            method="post"
            class="pull-right"
            onsubmit="return confirm('Click OK to Restore.')">
        {!! csrf_field() !!}
        <input type="hidden" name="file_name" value="{!! Request::get('file_name') !!}">
        <input type="submit" class="btn btn-warning" value="Kembalikan Database!">
      </form>
    </div>
  </div>
@endif

<div class="card card-default">
  <div class="card-body">
    <form action="{!! route('adm::backup.store') !!}" method="post">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="file_name" class="control-label">Buat File Backup</label>
        <input type="text" name="file_name" class="form-control" placeholder="{!! date('Y-m-d_Hi') !!}">
        {!! $errors->first('file_name', '<div class="text-danger text-right">:message</div>') !!}
      </div>
      <div class="form-group">
        <input type="submit" value="Buat File Backup" class="btn btn-success">
      </div>
    </form>
    <hr>
    <form action="{!! route('adm::backup.upload') !!}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="backup_file" class="control-label">Upload File Backup</label>
        <input type="file" name="backup_file" class="form-control">
        {!! $errors->first('backup_file', '<div class="text-danger text-right">:message</div>') !!}
      </div>
      <div class="form-group">
        <input type="submit" value="Upload File Backup" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>