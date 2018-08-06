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
      <div class="card card-accent-primary">
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
              <th class="text-center">Luas Daerah</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbSpasials as $key =>  $imbSpasial)
            <tr>
              <td class="text-center">{!! $key + 1 !!}</td>
              <td>PIMB{!! \sigimbbkt\Libraries\Generator::genImbId($imbSpasial->imb_id) . '-' .  $imbSpasial->imb->imbPemohon->nama !!}</td>
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

    // Create a popup, but don't add it to the map yet.
    var popup = new mapboxgl.Popup({
      closeButton: false
    });

    // Add map data
    map.on('load', function () {
      // Add imb building polygon from DB
      map.addLayer(
        {
          'id': 'imb-layer',
          'type': 'fill-extrusion',
          'source': {
            'type': 'geojson',
            'data': {
              "type": "FeatureCollection",
              "features": [
                @foreach ($imbPoligons as $imbPoligon)
                {!! $imbPoligon->geojson !!},
                @endforeach
              ]
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
        }
      );

      // Add Layer Kecamatan
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($aurBirugoTigoBaleh) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($gugukPanjang) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($mandianginKotoSelatan) !!});

      // When a click event occurs on a feature in the states layer, open a popup at the
      // location of the click, with description HTML from its properties.
      map.on('click', 'imb-layer', function (e) {
        // click to center
        map.flyTo({center: e.lngLat});
        new mapboxgl.Popup()
          .setLngLat(e.lngLat)
          .setHTML(e.features[0].properties.description)
          .addTo(map);
      });

      map.on('mousemove', 'imb-layer', function(e) {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = 'pointer';

        // Populate the popup and set its coordinates based on the feature.
        var feature = e.features[0];
        popup.setLngLat(e.lngLat)
          .setHTML(feature.properties.description)
          .addTo(map);
      });

      // Change the cursor to a pointer when the mouse is over the states layer.
      map.on('mouseenter', 'imb-layer', function () {
        map.getCanvas().style.cursor = 'pointer';
      });

      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'imb-layer', function () {
        map.getCanvas().style.cursor = '';
        popup.remove();
      });

    });
  </script>
@endsection