@extends('layouts.master')

@section('title', 'Ubah Data Spasial IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('pemohon::imb.index') !!}">IMB Saya</a></li>
<li class="breadcrumb-item active">Ubah Data Spasial</li>
@endsection

@section('breadcrumb-menu')
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
        {!! Form::model($edit, ['method' => 'PUT', 'route' => ['imbSpasial.update', $edit->id], 'id' => 'spatial-form']) !!}
          <div class="card-body">
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="imb_id">No. PIMB</label>
            <div class="col-md-5">
              <label class="form-control-label">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($d['id']) !!}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="imb_id">Nama Pemohon</label>
            <div class="col-md-5">
              <label class="form-control-label">{!! $d['imb_pemohon_nama'] !!}</label>
            </div>
          </div>

          <div id="map"></div>
          <div class="calculation-box">
            <p>Gambarlah polygon dengan menggunakan peta diatas!</p>
            <div id="calculated-area"></div>
          </div>

          <table>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>
                <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-edit"> Ubah</i></button>
              </td>
            </tr>
          </table>
        </div>
        {!! Form::close() !!}
      </div>

    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
@endsection

@section('javascript')
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.js'></script>
<script src='https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>

<script>
  var data = '';
  var area = '';

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

  // Add draw control
  var draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
      polygon: true,
      trash: true
    }
  });
  mapbox.addControl(draw);

  mapbox.on('draw.create', updateArea);
  mapbox.on('draw.delete', updateArea);
  mapbox.on('draw.update', updateArea);

  // Add map data
  mapbox.on('load', function () {

    // Add imb building polygon from DB
    mapbox.addLayer({
      'id': 'room-extrusion',
      'type': 'fill-extrusion',
      'source': {
        'type': 'geojson',
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
        'fill-extrusion-opacity': 0.8
      }
    });

    // Add Layer Kecamatan
    mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($aurBirugoTigoBaleh) !!});
    mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($gugukPanjang) !!});
    mapbox.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($mandianginKotoSelatan) !!});

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

    var id = '{!! $d['id'] !!}';
    var formAction = $(this).attr('action');
    var dPolygon = '';
    var polygon = '';

    for (var i = 0; i < data.features[0].geometry.coordinates[0].length; i++) {
      dPolygon += '(' + data.features[0].geometry.coordinates[0][i][0] + ',' + data.features[0].geometry.coordinates[0][i][1] + '),';
    }

    // debug only
    // console.log(dPolygon.substring(0, dPolygon.length - 1));
    polygon = (dPolygon.substring(0, dPolygon.length - 1));

    var postData =
    {
      'polygon': polygon,
      'area': area
    };

    $.ajax(
      {
        type: 'PUT',
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

@section('style')
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.41.0/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<style>
  #map { position:relative; height: 450px; width:100%; }
  .calculation-box {
    height: 30px;
    width: 900px;
    position: absolute;
    bottom: 40px;
    left: 280px;
    padding: 15px;
    text-align: left;
  }
  p { margin: 0; font-size: 13px; }
</style>
@endsection