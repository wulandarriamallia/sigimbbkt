@extends('layouts.master')

@section('title', 'Tambah Data Spasial IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbSpasial.index') !!}">Spasial IMB</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endsection

@section('breadcrumb-menu')
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
          <div class="calculation-box">
            <p>Gambarlah polygon dengan menggunakan peta diatas!</p>
            <div id="calculated-area"></div>
          </div>

          {!! Form::open(['route' => 'front_office::imbSpasial.store', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'spatial-form', 'enctype' => 'multipart/form-data']) !!}
            <table>
              <tr>
                <td>No. PIMB: &nbsp;</td>
                <td>
                  <select name="imb_id" id="imb_id">
                    <option disabled selected>Pilih No. PIMB</option>
                    @foreach ($imbs as $imb)
                      <option value="{!! $imb->id !!}">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($imb->id) . '-' . $imb->imbPemohon->nama !!}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-check"> Simpan</i></button>
                </td>
              </tr>
            </table>
          {!! Form::close() !!}
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
    .calculation-box {
      height: 55px;
      width: 750px;
      position: absolute;
      bottom: 40px;
      left: 330px;
      padding: 15px;
      text-align: left;
    }
    p { margin: 0; font-size: 13px; }
  </style>
@endsection

@section('javascript')
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.js'></script>
  <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
  <script>
    var data = '';
    var area = '';

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

    // Add draw control
    var draw = new MapboxDraw({
      displayControlsDefault: false,
      controls: {
        polygon: true,
        trash: true
      }
    });
    map.addControl(draw);

    map.on('draw.create', updateArea);
    map.on('draw.delete', updateArea);
    map.on('draw.update', updateArea);

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

    function updateArea(e) {
      data = draw.getAll();
      var answer = document.getElementById('calculated-area');
      if (data.features.length > 0) {
        area = turf.area(data);
        // restrict to area to 2 decimal points
        var rounded_area = Math.round(area*100)/100;
        answer.innerHTML = '<p>Luas tanah: <strong>' + rounded_area + '</strong> meter persegi.</p>';

        // debug only
        // answer.innerHTML = '<p>Luas tanah: <strong>' + rounded_area + '</strong> meter persegi.</p><p>Kordinat: ' + data.features[0].geometry.coordinates[0] + '</p>';

        // for (var i = 0; i < data.features[0].geometry.coordinates[0].length; i++) {
        // console.log('(' + data.features[0].geometry.coordinates[0][i][0] + ',' + data.features[0].geometry.coordinates[0][i][1] + ')');
        // }
      } else {
        answer.innerHTML = '';
        if (e.type !== 'draw.delete') alert("Gambarlah polygon menggunakan peta diatas!");
      }
    }

    $('#spatial-form').submit(function(event)
    {
      event.preventDefault();
      var formAction = $(this).attr('action');
      var dPolygon = '';
      var polygon = '';

      for (var i = 0; i < data.features[0].geometry.coordinates[0].length; i++) {
        dPolygon += '(' + data.features[0].geometry.coordinates[0][i][0] + ',' + data.features[0].geometry.coordinates[0][i][1] + '),';
      }

      // debug only
      // console.log(dPolygon.substring(0, dPolygon.length - 1));
      polygon = (dPolygon.substring(0, dPolygon.length - 1));
      var rem = polygon.replace(/,/g, ' ');
      var geom = rem.replace(/\) \(/g, ',');

      // console.log(geom);

      var postData =
      {
        'imb_id': $('select[name=imb_id]').val(),
        'area': area,
        'polygon': polygon,
        'geom': geom
      };

      // console.log(postData);

      $.ajax(
      {
        type: 'POST',
        url: formAction,
        data: postData,
        dataType: 'json'
      })
      .done(function(response)
      {
        location.reload(true);
        toastr.info(response.responseJSON.error, "Informasi!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
      })
      .fail(function(response)
      {
        location.reload(true);
        toastr.info(response.responseJSON.error, "Informasi!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
      });
    });
  </script>
@endsection