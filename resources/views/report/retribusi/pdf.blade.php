<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{!! $rep['title'] . '- ' . $rep['subtitle'] !!}</title>

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
  <h4 style="text-align: center; text-transform: uppercase"><b>{!! $rep['title'] !!}<br/></b>{!! $rep['subtitle'] !!}</h4>

  <table border="1">
    <thead>
    <tr>
      <th width="25%">Biaya Retribusi IMB</th>
      <th width="25%">Permohonan</th>
      <th>Alamat Pemohon</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>{!! $rImbRetribusi->imb->jenis_bangunan !!}</td>
      <td>
        Nama: {!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbPemohonAll($rImbRetribusi->imb->imb_pemohon_id), 'nama') !!}<br />
        Nomor: {!! \sigimbbkt\Libraries\IdConversion::conversionException(\sigimbbkt\Libraries\IdConversion::getImbPemohonAll($rImbRetribusi->imb->imb_pemohon_id), 'id') !!}
      </td>
      <td>
        Diatas Tanah HM / HGB / Suku: {!! $rImbRetribusi->imb->status_tanah !!}<br />
        Lokasi Bangunan: {!! $rImbRetribusi->imb->jalan . ' Kelurahan ' . $rImbRetribusi->imb->kelurahan !!}
      </td>
    </tr>
    </tbody>
  </table><br /><hr />

  <p style="font-weight: bold; text-decoration: underline;">URAIAN</p>
  <table border="0">
    <tbody>
    <tr>
      <td width="80%">a. Luas Bangunan: {!! $rImbRetribusi->luas_bangunan !!} m<sup>2</sup></td>
      <td>Koefisien: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) !!}</td>
    </tr>
    <tr>
      <td>b. Tingkat Bangunan: {!! \sigimbbkt\Libraries\StringMod::setRomawi($rImbRetribusi->tingkat_bangunan) !!}</td>
      <td>Koefisien: {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) !!}</td>
    </tr>
    <tr>
      <td>c. Guna Bangunan: {!! $rImbRetribusi->guna_bangunan !!}</td>
      <td>Koefisien: {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) !!}</td>
    </tr>
    <tr>
      <td>d. Jenis Bangunan: {!! $rImbRetribusi->jenis_bangunan !!}</td>
      <td>Koefisien: {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) !!}</td>
    </tr>
    <tr>
      <td>e. Lokasi / Kawasan: {!! $rImbRetribusi->lokasi_kawasan !!}. Jalan {!! $rImbRetribusi->lokasi_jalan !!}. Kelurahan {!! $rImbRetribusi->lokasi_kelurahan !!}</td>
      <td>(Tarif Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},- per-izin)</td>
    </tr>
    </tbody>
  </table>

  <p style="font-weight: bold; text-decoration: underline;">RETRIBUSI</p>
  <table border="0">
    <tbody>
    <tr>
      <td width="80%">Dihitung 1% dari anggaran fisik bangunan</td>
      <td></td>
    </tr>
    <tr>
      <td>* Bangunan Baru: {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) !!} x {!! \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) !!} x Rp {!! \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
      <td>= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
    </tr>
    <tr>
      <td>* Bangunan Renovasi / Perbaikan / Rehabilitasi = 30 % a Patokan Dasar</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;(30 % x Rp {!! $rImbRetribusi->patokan_dasar !!},-)</td>
      <td>= Rp {!! $rImbRetribusi->patokan_dasar / 100 * 30 !!},-</td>
    </tr>
    <tr>
      <td>* Plank Izin</td>
      <td>= Rp {!! $rImbRetribusi->plank_izin !!},-</td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;Jumlah</td>
      <td>= Rp {!! \sigimbbkt\Libraries\Calculation::luasBangunan($rImbRetribusi->luas_bangunan) * \sigimbbkt\Libraries\Calculation::tingkatBangunan($rImbRetribusi->tingkat_bangunan) * \sigimbbkt\Libraries\Calculation::gunaBangunan($rImbRetribusi->guna_bangunan) * \sigimbbkt\Libraries\Calculation::jenisBangunan($rImbRetribusi->jenis_bangunan) * \sigimbbkt\Libraries\Calculation::lokasiKawasan($rImbRetribusi->lokasi_kawasan) !!},-</td>
    </tr>
    <tr>
      <td>Terbilang: </td>
      <td></td>
    </tr>
    </tbody>
  </table>

</body>
</html>