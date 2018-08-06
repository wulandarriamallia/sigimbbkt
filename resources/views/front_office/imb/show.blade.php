@extends('layouts.master')

@section('title', 'Detail IMB' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imb.index') !!}">IMB</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> IMB</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Hapus</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">

      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list"></i>
          <strong>Detail</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <div class="block font-bold">No. PIMB</div>
            {!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Agenda</div>
            {!! \sigimbbkt\Libraries\StringMod::getNomorAgenda($d['id'], $d['created_at']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Pemohon</div>
            {!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($d['nama_pemohon']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">No. Telepon Pemohon</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['no_telepon_pemohon']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Alamat Pemohon</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['alamat_pemohon']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Jalan / RT-RW</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['jalan']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Kelurahan</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kelurahan']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Kecamatan</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['kecamatan']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Status Tanah</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['status_tanah']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">KRK / Advis Planning</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['advis_planning']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Peruntukkan</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['peruntukkan']) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Jenis Bangunan</div>
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['jenis_bangunan']) !!}<br />
            {!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['jenis_lain_lain']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Ubah Imb-Pemohon-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::model($show, ['route' => ['front_office::imb.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
      <div class="modal-body">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="nama_pemohon">No. PIMB</label>
          <div class="col-md-9">
            <label class="form-control-label">{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="nama_pemohon">No. Agenda</label>
          <div class="col-md-9">
            <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::getNomorAgenda($show->id, $show->created_at) !!}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="nama_pemohon">Nama Pemohon</label>
          <div class="col-md-9">
            <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::upperCaseFirstChar($d['nama_pemohon']) !!}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="no_telepon_pemohon">No. Telepon Pemohon</label>
          <div class="col-md-9">
            <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['no_telepon_pemohon']) !!}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="alamat_pemohon">Alamat Pemohon</label>
          <div class="col-md-9">
            <label class="form-control-label">{!! \sigimbbkt\Libraries\StringMod::setNullOrNot($d['alamat_pemohon']) !!}</label>
          </div>
        </div><hr />
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="jalan">Jalan / RT-RW</label>
          <div class="col-md-9">
            {!! Form::textarea('jalan', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="kelurahan">Kelurahan</label>
          <div class="col-md-9">
            {!! Form::select('kelurahan', [
              'Aur Kuning' => 'Aur Kuning',
              'Parit Antang' => 'Parit Antang',
              'Kubu Tanjuang' => 'Kubu Tanjuang',
              'Pakan Labuah' => 'Pakan Labuah',
              'Ladang Cakiah' => 'Ladang Cakiah',
              'Belakang Balok' => 'Belakang Balok',
              'Sapiran' => 'Sapiran',
              'Birugo' => 'Birugo',
              'Aur Tajungkang Tangah Sawah' => 'Aur Tajungkang Tangah Sawah',
              'Pakan Kurai' => 'Pakan Kurai',
              'Benteng Pasar Atas' => 'Benteng Pasar Atas',
              'Bukit Apit Puhun' => 'Bukit Apit Puhun',
              'Kayu Kubu' => 'Kayu Kubu',
              'Bukit Cangang Kayu Ramang' => 'Bukit Cangang Kayu Ramang',
              'Tarok Dipo' => 'Tarok Dipo',
              'Campago Ipuh' => 'Campago Ipuh',
              'Kubuh Gulai Rancang' => 'Kubuh Gulai Rancang',
              'Puhun Pintu Kabun' => 'Puhun Pintu Kabun',
              'Puhun Tembok' => 'Puhun Tembok',
              'Pulai Anak Air' => 'Pulai Anak Air',
              'Garegeh' => 'Garegeh',
              'Campago Guguak Bulek' => 'Campago Guguak Bulek',
              'Manggis Ganting' => 'Manggis Ganting',
              ], null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="kecamatan">Kecamatan</label>
          <div class="col-md-9">
            {!! Form::select('kecamatan', [
              'Aul Birugo Tigo Baleh' => 'Aul Birugo Tigo Baleh',
              'Guguk Panjang' => 'Guguk Panjang',
              'Mandiangin Koto Selayan' => 'Mandiangin Koto Selayan'
              ], null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="status_tanah">Status Tanah</label>
          <div class="col-md-9">
            {!! Form::select('status_tanah', [
              'Tanah Sawah' => 'Tanah Sawah',
              'Tanah Pekarangan' => 'Tanah Pekarangan',
              'Tidak bersertifikat (tanah negara, hak garap)' => 'Tidak bersertifikat (tanah negara, hak garap)',
              'Sertifikat Hak Milik (SHM)' => 'Sertifikat Hak Milik (SHM)',
              'Sertifikat Hak Guna Bangunan (SHGB)' => 'Sertifikat Hak Guna Bangunan (SHGB)'
              ], null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="advis_planning">KRK / Advis Planning</label>
          <div class="col-md-9">
            {!! Form::text('advis_planning', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="peruntukkan">Peruntukkan</label>
          <div class="col-md-9">
            {!! Form::select('peruntukkan', [
              'Tempat Tinggal' => 'Tempat Tinggal',
              'Tempat Usaha Karya' => 'Tempat Usaha Karya',
              'Tempat Usaha Sosial' => 'Tempat Usaha Sosial'
              ], null, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 form-control-label" for="jenis_bangunan">Jenis Bangunan</label>
          <div class="col-md-9">
            {!! Form::select('jenis_bangunan', [
              'Wisma Kecil' => 'Wisma Kecil',
              'Wisma Sedang' => 'Wisma Sedang',
              'Wisma Besar' => 'Wisma Besar',
              'Pertokoan' => 'Pertokoan',
              'Ruko' => 'Ruko',
              'Industri' => 'Industri',
              'Kantor Pemerintahan/Swasta' => 'Kantor Pemerintahan/Swasta',
              'Rumah Sakit' => 'Rumah Sakit',
              'Sekolah' => 'Sekolah',
              'Mesjid' => 'Mesjid',
              'Tempat Ibadah Lain' => 'Tempat Ibadah Lain',
              'Rumah Tempat Tinggal' => 'Rumah Tempat Tinggal'
              ], null, ['class' => 'form-control']) !!}
            <br />
            {!! Form::text('jenis_lain_lain', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-edit"> Ubah</i></button>
      </div>
      {!! Form::close() !!}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Hapus Imb-Pemohon-->
<div class="modal fade" id="remModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Penghapusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda ingin menghapus data IMB{!! $d['id'] !!} &hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imb.destroy', $d['id']], 'style' => 'display:inline']) !!}
        <button type="submit" class="btn btn-danger btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-trash icons" title="Hapus Pengguna"> Hapus</i></button>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection