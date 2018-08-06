@extends('layouts.master')

@section('title', 'Detail IMB' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('pemohon::imb.index') !!}">IMB Saya</a></li>
<li class="breadcrumb-item active">Detail IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="#" data-toggle="modal" data-target="#editModal"><i class="icon-pencil icons"> IMB</i></a>
@if (isset($show->imbSpasial))
{{--  <a class="btn" href="{!! route('pemohon::imbSpasial.edit', $show->imbSpasial->id) !!}" ><i class="icon-pencil icons"> Spasial</i></a>--}}
@endif
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

      @if (isset($show->imbSpasial))
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-map"></i>
          <strong>Data Bangunan</strong>
          <small>yang Akan Didirikan</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <div style="height:600px" id="map"></div>
          </div>
        </div>
      </div>
      @else
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-map"></i>
          <strong>Data Bangunan</strong>
          <small>yang Akan Didirikan</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <i>Tidak ada data spasial...</i>
          </div>
        </div>
      </div>
      @endif
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
      {!! Form::model($show, ['route' => ['pemohon::imb.update', $show->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
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

@section('style')
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.css' rel='stylesheet' />
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
  <style>
    #map { position:relative; height: 450px; max-width: 100%; width: 100% }
    p { margin: 0; font-size: 13px; }
  </style>
@endsection

@section('javascript')
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.js'></script>
  <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiY2xhc3NpY25pdGUiLCJhIjoiY2o5MHg0aTNtMzNqejJybjU4dnhudmI0ZCJ9.J2R_x1-738dvZtlL9GdRiw';
    /* eslint-disable */
    var map = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/classicnite/cj90xcblb2br92rmon6ffmxz6', // hosted style id
      center: [100.369, -0.305], // starting position
      zoom: 16.1, // starting zoom
      pitch: 40,
      bearing: 20
    });

    // Add zoom and rotation controls
    map.addControl(new mapboxgl.NavigationControl());

    // Add map data
    map.on('load', function () {
      // Add imb building polygon from DB
      map.addLayer(
        @if (empty($show->imbSpasial))
        @else
        {!! $d['polygon']->geojson !!}
        @endif
      );

      // Add Layer Kecamatan
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($aurBirugoTigoBaleh) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($gugukPanjang) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($mandianginKotoSelatan) !!});

      map.on('click', 'imb-layer', function (e) {
        // click to center
        map.flyTo({center: e.lngLat});
      });

      map.on('mousemove', 'imb-layer', function(e) {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = 'pointer';
      });

      // Change the cursor to a pointer when the mouse is over the states layer.
      map.on('mouseenter', 'imb-layer', function () {
        map.getCanvas().style.cursor = 'pointer';
      });

      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'imb-layer', function () {
        map.getCanvas().style.cursor = '';
      });

    });
  </script>
@endsection