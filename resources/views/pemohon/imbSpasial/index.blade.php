@extends('layouts.master')

@section('title', 'Master Spasial IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item active">Spasial IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="{!! route('front_office::imbSpasial.create') !!}"><i class="icon-plus icons"> Spasial IMB</i></a>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="icon-map icons"></i>
          <strong>Data Spasial</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <div id="map"></div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data Spasial</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="data-tables">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">No. PIMB-Pemohon</th>
              <th class="text-center">Luas Tanah</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbSpasials as $imbSpasial)
            <tr>
              <td class="text-center">{!! $imbSpasial->id !!}</td>
              <td>IMB{!! \sigimbbkt\Libraries\Generator::genImbId($imbSpasial->imb_id) . '-' .  $imbSpasial->imb->imbPemohon->nama !!}</td>
              <td>{!! $imbSpasial->area !!} M2</td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imbSpasial.show', $imbSpasial->id) !!}" data-toggle="tooltip" data-placement="top" title="Detail IMB{!! \sigimbbkt\Libraries\Generator::genImbId($imbSpasial->imb_id) . '-' .  $imbSpasial->imb->imbPemohon->nama !!}"> <i class="icon-list icon"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
@endsection

@section('javascript')
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.js'></script>
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiY2xhc3NpY25pdGUiLCJhIjoiY2o5MHg0aTNtMzNqejJybjU4dnhudmI0ZCJ9.J2R_x1-738dvZtlL9GdRiw';
    /* eslint-disable */
    var mapbox = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/classicnite/cj90xcblb2br92rmon6ffmxz6', // hosted style id
      center: [100.369, -0.305], // starting position
      zoom: 16.1, // starting zoom
      pitch: 40,
      bearing: 20
    });

    // Add zoom and rotation controls
    mapbox.addControl(new mapboxgl.NavigationControl());

    // Add map data
    mapbox.on('load', function () {

      // Add imb building polygon from DB
      mapbox.addLayer({
        'id': 'room-extrusion',
        'type': 'fill-extrusion',
        'source': {
          // Geojson Data source used in vector tiles, documented at
          // https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
          'type': 'geojson',
//          'data': 'https://www.mapbox.com/mapbox-gl-js/assets/data/indoor-3d-map.geojson'
          'data': {
            "type": "Feature",
            "properties": {
              "level": 1,
              "name": "IMB",
              "height": 60,
              "base_height": 0,
              "color": "grey"
            },
            "geometry": {
              "coordinates": {!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($buldingCoordinates) !!},
              "type": "Polygon"
            },
            "id": "06e8fa0b3f851e3ae0e1da5fc17e111e"
          }
        },
        'paint': {
          'fill-extrusion-color': {
            'property': 'color',
            'type': 'identity'
          },
          'fill-extrusion-height': {
            'property': 'height',
            'type': 'identity'
          },
          'fill-extrusion-base': {
            'property': 'base_height',
            'type': 'identity'
          },
          'fill-extrusion-opacity': 1
        }
      });

      // Add Layer Kecamatan
      mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($aurBirugoTigoBaleh) !!});
      mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($gugukPanjang) !!});
      mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($mandianginKotoSelatan) !!});

    });
  </script>
@endsection

@section('style')
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.css' rel='stylesheet' />
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
  <style>
    #map { position:relative; height: 450px; width:100%; }
    .calculation-box {
      height: 75px;
      width: 490px;
      position: absolute;
      bottom: 40px;
      left: 280px;
      padding: 15px;
      text-align: left;
    }
    p { margin: 0; font-size: 13px; }
  </style>
@endsection