<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{!! $rep['title'] !!}</title>

  <style type="text/css">
    a[href^="https://"], body {
      color: #000
    }

    h3, th {
      text-align: center
    }

    table, td, th {
      border: 1px solid #000;
      border-collapse: collapse
    }

    caption, td {
      text-align: left
    }

    body {
      width: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      line-height: 1.45;
      font-family: Garamond, "Times New Roman", serif;
      background: 0 0;
      font-size: 0.8em
    }

    h1, h2, h3, h4, h5, h6 {
      page-break-after: avoid
    }

    h1 {
      font-size: 19pt
    }

    h2 {
      font-size: 17pt
    }

    h3 {
      font-size: 15pt
    }

    h4, h5, h6 {
      font-size: 14pt
    }

    h2, h3, p {
      orphans: 3;
      widows: 3
    }

    code {
      font: 12pt Courier, monospace
    }

    blockquote {
      margin: 1.2em;
      padding: 1em;
      font-size: 12pt
    }

    hr {
      background-color: #ccc
    }

    img {
      float: left;
      margin: 1em 1.5em 1.5em 0;
      max-width: 100% !important
    }

    a img {
      border: none
    }

    a:link, a:visited {
      background: 0 0;
      font-weight: 700;
      text-decoration: underline;
      color: #333
    }

    a:link[href^="https://"]:after, a[href^="https://"]:visited:after {
      content: " (" attr(href) ") ";
      font-size: 90%
    }

    abbr[title]:after {
      content: " (" attr(title) ")"
    }

    a[href$=".jpg"]:after, a[href$=".jpeg"]:after, a[href$=".gif"]:after, a[href$=".png"]:after {
      content: " (" attr(href) ") ";
      display: none
    }

    a[href^="javascript:"]:after, a[href^="#"]:after {
      content: ""
    }

    table {
      width: 100%;
      font-size: 0.8em
    }

    th {
      background: #ccc;
      padding: 4px 0
    }

    td {
      padding: 4px 5px
    }

    tfoot {
      font-style: normal
    }

    caption {
      background: #fff;
      margin-bottom: 2em
    }

    thead {
      display: table-header-group
    }

    img, tr {
      page-break-inside: avoid
    }

    @media print {
      .tg {
        border-collapse: collapse;
        border-spacing: 0;
        border-color: #ccc;
        width: 100%;
      }

      .tg td {
        font-family: Arial, serif;
        font-size: 12px;
        padding: 10px 5px;
        overflow: hidden;
        word-break: normal;
        border: 1px solid #ccc;
        color: #333;
        background-color: #fff;
      }

      .tg th {
        font-family: Arial, serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        overflow: hidden;
        word-break: normal;
        border: 1px solid #ccc;
        color: #333;
        background-color: #f0f0f0;
      }

      .tg .tg-3wr7 {
        font-weight: bold;
        font-size: 12px;
        font-family: "Arial", Helvetica, sans-serif !important;;
        text-align: center
      }

      .tg .tg-ti5e {
        font-size: 10px;
        font-family: "Arial", Helvetica, sans-serif !important;;
        text-align: center
      }

      .tg .tg-rv4w {
        font-size: 10px;
        font-family: "Arial", Helvetica, sans-serif !important;
      }
    }
  </style>
</head>

<body>
  <h4 align="center"><b>{!! $rep['title'] !!}<br/></b>{!! $rep['subtitle'] !!}</h4>

  <table border="1">
    <thead>
    <tr>
      <th>No. URUT</th>
      <th>NO. IZIN</th>
      <th>TGL IZIN</th>
      <th>NAMA PEMOHON</th>
      <th>GUNA BANGUNAN / JENIS BANGUNAN</th>
      <th colspan="2">LUAS BANGUNAN</th>
      <th colspan="2">TINGKAT BANGUNAN</th>
      <th>LOKASI BANGUNAN</th>
      <th>KECAMATAN</th>
      <th>KELURAHAN</th>
    </tr>
    </thead>
    <tbody>
    @if ($rImbs->isEmpty())
      <tr>
        <td colspan="12" style="text-align: center"><i>Tidak ada data...</i></td>
      </tr>
    @else
      @foreach ($rImbs as $key => $rImb)
      <tr>
        <td style="text-align: center">{!! $rImb->id !!}</td>
        <td>648 {!! $rImb->id !!}/BP2TPM-PP</td>
        <td>{!! \sigimbbkt\Libraries\TimeStamp::FormatDate3rd($rImb->created_at) !!}</td>
        <td>{!! $rImb->imbPemohon->nama !!}</td>
        <td>{!! $rImb->jenis_bangunan . '/' . \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'jenis_bangunan') !!}</td>
        <td style="text-align: center">{!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'luas_bangunan') !!}</td>
        <td style="text-align: center">M<sup>2</sup></td>
        <td style="text-align: center">{!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbRetribusiAll($rImb->id), 'tingkat_bangunan') !!}</td>
        <td style="text-align: center">Lantai</td>
        <td>{!! $rImb->jalan !!}</td>
        <td>{!! $rImb->kecamatan !!}</td>
        <td>{!! $rImb->kelurahan !!}</td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>

  <div style="position: relative; left: 430px; width: 900px">
    <p align="center"><br/>Pekanbaru, {!! strftime('%d %B %Y') !!}<br/><br/><br/><br/>Ketua DPMPTSPPTK</p>
  </div>

</body>
</html>