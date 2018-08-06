@extends('layouts.master')

@section('title', 'Detail Spasial IMB' . $d['title'])

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbSpasial.index') !!}">Spasial IMB</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="{!! route('front_office::imbSpasial.edit', $show[0]->id) !!}"><i class="icon-pencil icons"> Spasial IMB</i></a>
<a class="btn" href="#" data-toggle="modal" data-target="#remModal"><i class="icon-trash icons"> Spasial IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row row-sm">
    <div class="col-sm-12">
      <div class="card card-accent-info">
        <div class="card-header">
          <i class="icon-map icons"></i>
          <strong>Identitas Spasial</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body text-dark p-0">
          <div class="list-group-item">
            <div class="block font-bold">No. PIMB</div>
            PIMB{!! \sigimbbkt\Libraries\Generator::genImbId($show[0]->imb_id) !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Nama Pemohon</div>
            {!! $show[0]->nama_pemohon !!}
          </div>
          <div class="list-group-item">
            <div class="block font-bold">Luas Daerah</div>
            {!! \sigimbbkt\Libraries\StringMod::getNumericFormat($show[0]->area) !!} M2
          </div>
          <div class="list-group-item">
            <div style="height:600px" id="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!--Modal - Ubah Imb-Spasial-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Spasial IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::model($show[0], ['route' => ['imbSpasial.update', $show[0]->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) }}
      <div class="modal-body">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="nama">No. PIMB-Pemohon</label>
            <div class="col-md-9">
              {{ Form::text('lat', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) }}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="alamat">Longitude</label>
            <div class="col-md-9">
              {{ Form::text('long', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'true']) }}
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-edit"> Ubah</i></button>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal - Hapus Imb-Spasial-->
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
        <p>Apakah Anda ingin menghapus data spasial IMB{!! $show[0]->imb_id . '-' . $show[0]->nama_pemohon !!}&hellip;?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
        {!! Form::open(['method' => 'DELETE', 'route' => ['front_office::imbSpasial.destroy', $show[0]->id], 'style' => 'display:inline']) !!}
        <button type="submit" class="btn btn-danger btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="icon-trash icons" title="Hapus Spasial"> Hapus</i></button>
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
    #map { position:relative; height: 450px; max-width: 100%; width: 100%}
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
        {!! $show[0]->geojson !!}
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