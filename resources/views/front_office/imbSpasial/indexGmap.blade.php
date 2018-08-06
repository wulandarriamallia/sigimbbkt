@extends('layouts.master')

@section('title', 'Master Spasial IMB')

@section('breadcrumb')
  <li class="breadcrumb-item">Data Master</li>
  <li class="breadcrumb-item active">Spasial IMB</li>
@endsection

@section('breadcrumb-menu')
<a class="btn" href="{!! route('front_office::imbSpasial.create') !!}"><i class="icon-user-follow icons"> Tambah Spasial IMB</i></a>
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
          <div id="map" width="100%" style="height: 450px"></div>
          <form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data" id="spatial-form">
            <table>
              <tr>
                <td>No. PIMB: &nbsp;</td>
                <td>
                  <select name="imb_id" id="imb_id">
                    <option disabled selected>Pilih No. PIMB</option>
                    @foreach ($imbs as $imb)
                      <option value="{!! $imb->id !!}">IMB{!! $imb->id . '-' . \sigimbbkt\Libraries\IdConversion::getImbPemohonAll($imb->imb_pemohon_id)->nama !!}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td>Warna:</td>
                <td><div id="color-palette"></div></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <button type="button" class="btn btn-sm btn-secondary" id="delete-button"><i class="fa fa-trash"> Hapus</i></button>
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"> Simpan</i></button>
                  {{--<input type='submit' value='Simpan'/>--}}
                </td>
              </tr>
            </table>
          </form>
          {{--<div id="message">Location saved</div>--}}

          {{--<div id="panel">--}}
            {{--<div id="color-palette"></div>--}}
            {{--<div>--}}
              {{--<button id="delete-button">Hapus Objek</button>--}}
            {{--</div>--}}
          {{--</div>--}}
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <strong>Data Spasial</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="col-5 text-center">No. PIMB-Pemohon</th>
              <th class="col-5 text-center">Data Spasial</th>
              <th class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($imbSpasials as $imbSpasial)
            <tr>
              <td class="text-center">{!! $imbSpasial->id !!}</td>
              <td>IMB{!! $imbSpasial->imb_id . '-' .  \sigimbbkt\Libraries\IdConversion::getImbPemohonAll($imbSpasial->imb->imb_pemohon_id)->nama !!}</td>
              <td>{!! $imbSpasial->polygon !!}</td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{!! route('front_office::imbSpasial.show', $imbSpasial->id) !!}"> <i class="icon-list icon"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>

          <nav>
            {{ $imbSpasials->links('vendor.pagination.bootstrap-4') }}
          </nav>
        </div>
      </div>

    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
@endsection

@section('javascript')
  <script>
    /* ---------- Imb-Spatial, API-POST ---------- */
    var drawingManager;
    var selectedShape;
    var infowindow;
    var messagewindow;
    var locations;
    var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
    var selectedColor;
    var colorButtons = {};

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(-0.294640, 100.367812),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        zoomControl: true
      });
      var polyOptions = {
        strokeWeight: 0,
        fillOpacity: 0.45,
        editable: true
      };
      // Creates a drawing manager attached to the map that allows the user to draw
      // markers, lines, and shapes.
      drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: true,
        drawingControlOptions: {
          position: google.maps.ControlPosition.TOP_CENTER,
          drawingModes: ['polygon']
        },
        polygonOptions: polyOptions,
        map: map
      });

      google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
        if (e.type !== google.maps.drawing.OverlayType.MARKER) {
          // Switch back to non-drawing mode after drawing a shape.
          drawingManager.setDrawingMode(null);

          // Add an event listener that selects the newly-drawn shape when the user
          // mouses down on it.
          var newShape = e.overlay;
          newShape.type = e.type;
          google.maps.event.addListener(newShape, 'click', function() {
            setSelection(newShape);
          });

          setSelection(newShape);

          if (e.type === google.maps.drawing.OverlayType.POLYGON) {
            locations = e.overlay.getPath().getArray();
            console.log("POLY:" + locations.toString());
            //alert(locations.toString() + " 1st instace");
          }
        }
      });

      // TODO: InfoWindow goes Here, for polygon on click show
//      var infoWindow = new google.maps.InfoWindow;

//          google.maps.event.addListener(map, 'click', function(event) {
//            marker = new google.maps.Marker({
//              position: event.latLng,
//              map: map
//            });
//
//            google.maps.event.addListener(marker, 'click', function() {
//              infowindow.open(map, marker);
//            });
//          });
//
//          infowindow = new google.maps.InfoWindow({
//            content: document.getElementById('spatial-form')
//          });
//
//          messagewindow = new google.maps.InfoWindow({
//            content: document.getElementById('message')
//          });

      // Clear the current selection when the drawing mode is changed, or when the
      // map is clicked.
      google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
      google.maps.event.addListener(map, 'click', clearSelection);
      google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

      buildColorPalette();
    }

    function clearSelection() {
      if (selectedShape) {
        selectedShape.setEditable(false);
        selectedShape = null;
      }
    }

    function setSelection(shape) {
      clearSelection();
      selectedShape = shape;
      shape.setEditable(true);
      selectColor(shape.get('fillColor') || shape.get('strokeColor'));
    }

    function deleteSelectedShape() {
      if (selectedShape) {
        selectedShape.setMap(null);
      }
    }

    function selectColor(color) {
      selectedColor = color;
      for (var i = 0; i < colors.length; ++i) {
        var currColor = colors[i];
        colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
      }

      // Retrieves the current options from the drawing manager and replaces the
      // stroke or fill color as appropriate.
      var polygonOptions = drawingManager.get('polygonOptions');
      polygonOptions.fillColor = color;
      drawingManager.set('polygonOptions', polygonOptions);
    }

    function setSelectedShapeColor(color) {
      if (selectedShape) {
        if (selectedShape.type === google.maps.drawing.OverlayType.POLYLINE) {
          selectedShape.set('strokeColor', color);
        } else {
          selectedShape.set('fillColor', color);
        }
      }
    }

    function makeColorButton(color) {
      var button = document.createElement('span');
      button.className = 'color-button';
      button.style.backgroundColor = color;
      google.maps.event.addDomListener(button, 'click', function() {
        selectColor(color);
        setSelectedShapeColor(color);
      });

      return button;
    }

    function buildColorPalette() {
      var colorPalette = document.getElementById('color-palette');
      for (var i = 0; i < colors.length; ++i) {
        var currColor = colors[i];
        var colorButton = makeColorButton(currColor);
        colorPalette.appendChild(colorButton);
        colorButtons[currColor] = colorButton;
      }
      selectColor(colors[0]);
    }

    function showArrays(event) {
      // Since this polygon has only one path, we can call getPath() to return the
      // MVCArray of LatLngs.
      var vertices = this.getPath();

      var contentString = '<b>Bermuda Triangle polygon</b><br>' +
        'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
        '<br>';

      // Iterate over the vertices.
      for (var i = 0; i < vertices.getLength(); i++) {
        var xy = vertices.getAt(i);
        contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
          xy.lng();
      }
    }

//    TODO: Load from database
    /* This function save latitude and longitude to the polygons[] variable after we call it. */
    function encodePolygon(polygon)
    {
      //This variable gets all bounds of polygon.
      var path = polygon.getPath();

      var encodeString =
        google.maps.geometry.encoding.encodePath(path);

      /* store encodeString in database */
    }

    function DrawPolygon(encodedString){
      var decodedPolygon =
        google.maps.geometry.encoding.decodePath(encodedString);

      var polygon = new google.maps.Polygon({
        paths: decodedPolygon,
        editable: false,
        strokeColor: '#FFFF',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FFFF',
        fillOpacity: 0.35
      });
    }

    $.ajaxSetup(
      {
        headers:
          {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $('#spatial-form').submit(function(event)
    {
      event.preventDefault();
      var polygon = locations.toString();

      var postData =
        {
          'imb_id': $('select[name=imb_id]').val(),
          'polygon': polygon
        };

      $.ajax(
        {
          type: 'POST',
          url: '/api/imbSpasial',
          data: postData,
          success: function(response)
          {
            $('input[type=imb_id]').val("");
//            TODO: Toast
            $('#message').text('Lokasi telah disimpan');
          },
          error: function(response) {
            //            TODO: Toast
            $('#message').text('Lokasi gagal disimpan');
          }
        });
    });
  </script>
@endsection

@section('style')
<style>
  #map div {
    width: auto;
  }
  #panel {
    width: 200px;
    font-family: Arial, sans-serif;
    font-size: 13px;
    float: right;
    margin: 10px;
  }
  #color-palette {
    clear: both;
  }
  .color-button {
    width: 14px;
    height: 14px;
    font-size: 0;
    margin: 2px;
    float: left;
    cursor: pointer;
  }
  #delete-button { }
</style>
@endsection