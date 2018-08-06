@extends('layouts.front')

@section('title', 'Halaman Utama')

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-12" style="padding: 0 0; max-width: 100%; width: 100%; overflow: hidden">
      <div class="card" style="margin-bottom: 0;">

        <div class="card-body" style="margin-bottom: 0;padding: 0.25rem">

          <div id="map"></div>
          <div class='filter-ctrl'>
            <input class="form-control" type='search' id='pencarian' name='filter' autofocus autocomplete="off" placeholder='Pencarian Pemohon IMB...' />
          </div>

          <div class='map-overlay top' id="draggAble">
            <div class='map-overlay-inner'>
              <fieldset>
                <label for="layers">Layer</label>
                <nav id="layers"></nav>
              </fieldset>
              <fieldset>
                <label for="layer">Warna Layer</label>
                <select id='layer' name='layer'>
                  <option selected disabled>Pilih Layer</option>
                  <option value='imb'>IMB</option>
                  <option value='building'>Bangunan</option>
                </select>
              </fieldset>
              <fieldset>
                <div id='swatches'></div>
              </fieldset>
              <fieldset>
                <label for="layer-list">Jenis Peta</label>
                <div id='layer-list'>
                  <div class="form-check">
                    <label for='basic-street' class="form-check-label">
                      <input class="form-check-input" id='basic-street' type='radio' name='rtoggle' value='cj90xcblb2br92rmon6ffmxz6' checked='checked'>
                      Basic Street
                    </label>
                  </div>
                  <div class="form-check">
                    <label for='bright' class="form-check-label">
                      <input class="form-check-input" id='bright' type='radio' name='rtoggle' value='cj9nswf703sgq2snlaeih656x'>
                      Bright
                    </label>
                  </div>
                  <div class="form-check">
                    <label for='dark' class="form-check-label">
                      <input class="form-check-input" id='dark' type='radio' name='rtoggle' value='cj9nsx44p3sja2ro0blbnvr2b'>
                      Dark
                    </label>
                  </div>
                  <div class="form-check">
                    <label for='satellite' class="form-check-label">
                      <input class="form-check-input" id='satellite-street' type='radio' name='rtoggle' value='cj9nsxo8y3o9k2rp9cirm1d22'>
                      Satellite Street
                    </label>
                  </div>
                </div>
                <nav id='filter-group' class='filter-group'></nav>
              </fieldset>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>

<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tentang {!! Config::get('app.alias') !!}</h4>
        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="{!! asset('assets/img/favicon.png') !!}" class="rounded" alt="{!! Config::get('app.alias') !!}">
          <h3>{!! Config::get('app.alias') !!}</h3>
          <p>Versi {!! Config::get('app.version') !!}</p>
          <p>{!! Config::get('app.production') . ' ' . Config::get('app.author') !!}.</p><br />
        </div>
        <nav class="nav nav-tabs nav-justified" id="aboutTabs" role="tablist">
          <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="nav-about" aria-selected="true"><i class="fa fa-question-circle"></i>&nbsp;Tentang proyek</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-envelope"></i>&nbsp;Kontak kami</a>
          <a class="nav-item nav-link" id="nav-disclaimer-tab" data-toggle="tab" href="#disclaimer" role="tab" aria-controls="nav-disclaimer" aria-selected="false"><i class="fa fa-exclamation-circle"></i>&nbsp;Penolakan</a>
          <nav class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i>&nbsp;Metadata <b class="caret"></b></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#spasial-bukittinggi" data-toggle="tab">Data Spasial Bukittinggi</a>
              <a class="dropdown-item" href="#dinas" data-toggle="tab">DPMPTSPPTK</a>
            </div>
          </nav>
        </nav>
        <div class="tab-content" id="aboutTabsContent">
          <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="panel panel-primary">
              <p>Sigimbbkt dirancang dengan <i class="fa fa-heart-o" aria-hidden="true" style="color: red;"></i> oleh <a href="https://www.classicnite.com/">{!! Config::get('app.author') !!}</a>. <br />Dibangun dengan menggunakan komponen open-source: <a href="https://www.mapbox.com" target="_blank">Mapbox</a>, <a href="http://coreui.io" target="_blank">CoreUI</a>, <a href="https://getbootstrap.com" target="_blank">Bootstrap 4</a> dan <a href="https://laravel.com" target="_blank">Laravel 5</a>.</p><br />
              <div class="panel-heading">Fitur</div>
              <ul class="list-group">
                <li class="list-group-item">Template peta yang mobile-friendly dengan navigasi responsif.</li>
                <li class="list-group-item">Tampilan peta dengan rendering grafis 3D interaktif di dalam web browser dengan menggunakan teknologi WebGL.</li>
                <li class="list-group-item">Dasbor admin dengan 4 hak akses, Administrator, Pemohon IMB, Petugas Lapangan dan Petugas Retribusi.</li>
              </ul>
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <form class="form-horizontal" role="form" method="POST" action="{!! route('contactUs.store') !!}" id="contact-us-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_depan">Nama Depan</label>
                  <input type="text" class="form-control" autocomplete="off" id="nama_depan" name="nama_depan">
                </div>
                <div class="form-group col-md-6">
                  <label for="nama_belakang">Nama Belakang</label>
                  <input type="text" class="form-control" autocomplete="off" id="nama_belakang" name="nama_belakang">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" autocomplete="off" id="kontak_email" name="kontak_email">
                </div>
                <div class="form-group col-md-6">
                  <label for="pesan">Pesan</label>
                  <textarea rows="4" class="form-control" id="pesan" name="pesan"></textarea>
                </div>
              </div>
              <div class="form-row justify-content-end">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left">Kirim</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade text-danger" id="disclaimer" role="tabpanel" aria-labelledby="disclaimer-tab">
            <p>Data yang disediakan di situs ini hanya untuk tujuan informasi dan perencanaan.</p>
            <p>Sama sekali tidak ada ketepatan atau kelengkapan jaminan yang tersirat atau yang dimaksudkan. Semua informasi di peta ini dapat diatur sedemikian rupa mungkin.</p>
          </div>
          <div class="tab-pane fade" id="spasial-bukittinggi" role="tabpanel" aria-labelledby="spasial-bukittinggi-tab">
            <p>Data spasial Bukittinggi milik <a href="http://www.openstreetmap.org/way/181731689" target="_blank">OpenStreetMap</a>.</p>
          </div>
          <div class="tab-pane fade" id="dinas" role="tabpanel" aria-labelledby="dinas-tab">
            <p>Data Izin Mendirikan Bangunan (IMB) milik <a href="" target="_blank">Dinas Penanaman Modal Pelayanan Terpadu dan Satu Pintu Perindustrian dan Tenaga Kerja (DPMPTSPPTK)</a>.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="legendModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Legenda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p><i class='fa fa-map'></i>&nbsp;Kecamatan</p><br />
        <ul class='list-group'>
          <li class="list-group-item"><span class='fa fa-square' style="color: #c0ca33">&nbsp;</span>&nbsp;Aur Birugo Tigo Baleh</li>
          <li class="list-group-item"><span class='fa fa-square' style="color: #5e35b1">&nbsp;</span>&nbsp;Guguk Panjang</li>
          <li class="list-group-item"><span class='fa fa-square' style="color: #039be5">&nbsp;</span>&nbsp;Mandiangin Koto Selayan</li>
        </ul><br />
        <p><i class='fa fa-map'></i>&nbsp;Bangunan</p><br />
        <ul class='list-group'>
          <li class="list-group-item"><span class='fa fa-square' style="color: grey">&nbsp;</span>&nbsp;Bangunan Pemohon</li>
        </ul><br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="persyaratanModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Persyaratan Izin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <ol>
          <li>Permohonan Tertulis.</li>
          <li>Foto copy KTP Pemilik.</li>
          <li>Foto copy Surat Keterangan Rencana Kota/Advis Planning.</li>
          <li>Foto copy Sertifikat Tanah yang dilegalisir BPN.</li>
          <li>Surat Izin merapat dari tetangga bersebelahan yang diketahui oleh Lurah setempat (jika bangunan dibangun sehabis batas tanah).</li>
          <li>Bagi tanah yang tidak/belum mempunyai sertifikat, dilengkapi dengan surat kepemilikan tanah yang dinyatakan oleh Mamak Kepala Waris, disetujui oleh waris dan diketahui oleh KAN, Lurah dan Camat lokasi tanah yang akan dibangun.</li>
          <li>Gambar rencana bangunan sesuai dengan Advis Planning (gambar ditanda tangani oleh Pemilik bangunan serta pembuat gambar.</li>
          <li>Surat Pernyataan tidak memulai pekerjaan pendirian bangunan sebelum IMB diterbitkan.</li>
          <li>Foto copy Rekomendasi Amdal/UPL/UKL/Andal Lalin, bagi IMB untuk izin Usaha.</li>
          <li>Dokumen berbentuk gambar yang ditanda tangani oleh Petugas Teknis.</li>
          <li>Kajian Struktur Bangunan bagi Bangunan yang lebih dari dua tingkat.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="alurModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Alur Izin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <img src="{!! asset('assets/img/alur_izin.jpg') !!}" class="irounded mx-auto d-block" alt="alur_izin" style="width: 100%">
        <p>Keterangan :</p>
        <ol>
          <li>Pemohon menyerahkan berkas permohonan ke bagian front office.</li>
          <li>Setelah diperiksa berkas permohonan, front office mengagendakan pada buku izin masuk dan menyerahkan permohonan tersebut kebidang perizinan.</li>
          <li>Bidang perizinan memeriksa kembali kelengkapan berkas, apabila berkas lengkap maka dilakukan survey kelapangan.</li>
          <li>Bidang perizinan bersama tim teknis melakukan survey kelapangan.</li>
          <li>Selanjutnya bidang perizinan menerbitkan SK dan izin sekaligus membuat SKRD nya.</li>
          <li>Kemudian bidang perizinan menyerahkan SK izin yang telah selesai diproses ke sekretaris untuk diparaf.</li>
          <li>Selanjutnya sekretaris melanjutkan kepada kepala badan untuk ditandatangani.</li>
          <li>Kepala badan menyerahkan kembali kepada sekretaris.</li>
          <li>Sekretaris menyerahkan surat  izin  yang telah ditandatangani tersebut kebidang perizinan.</li>
          <li>Bidang perizinan menyerahkan SK izin pada front office.</li>
          <li>Sebelum SK izin diserahkan kepada pemohon, terlebih dahulu front office menyerahkan SKRD pada pemohon untuk membayar retribusi pada kasir. Setelah retribusi dibayar barulah SK izin diserahkan dengan terlebih dahulu diagendakan dalam buku izin keluar.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="imbModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah IMB</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form-horizontal" role="form" method="POST" id="imb-pemohon-form" action="{!! route('imbPemohon.store-api') !!}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="imb_pemohon_id">Nama Pemohon</label>
            <div class="col-md-5">
              <select class="form-control" name="imb_pemohon_id" id="imb_pemohon_id">
                <option disabled selected>Pilih Nama Pemohon</option>
                @foreach ($imbPemohonLists as $imbPemohonList)
                  <option value="{!! $imbPemohonList->id !!}">IMB{!! $imbPemohonList->id .'-' . $imbPemohonList->nama !!}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="telepon">No. Telepon</label>
            <div class="col-md-5">
              <label class="form-control-label" for="telepon" id="telepon">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="alamat">Alamat</label>
            <div class="col-md-5">
              <label class="form-control-label" for="alamat" id="alamat">-</label>
            </div>
          </div><hr />

          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="jalan">Jalan / RT-RW</label>
            <div class="col-md-5">
              <textarea class="form-control" name="jalan" id="jalan" cols="30" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="kelurahan">Kelurahan</label>
            <div class="col-md-5">
              <select class="form-control" name="kelurahan" id="kelurahan">
                <option disabled selected>Pilih Kelurahan</option>
                <option value="Aur Kuning">Aur Kuning</option>
                <option value="Parit Antang">Parit Antang</option>
                <option value="Kubu Tanjuang">Kubu Tanjuang</option>
                <option value="Pakan Labuah">Pakan Labuah</option>
                <option value="Ladang Cakiah">Ladang Cakiah</option>
                <option value="Belakang Balok">Belakang Balok</option>
                <option value="Sapiran">Sapiran</option>
                <option value="Birugo">Birugo</option>
                <option value="Aur Tajungkang Tangah Sawah">Aur Tajungkang Tangah Sawah</option>
                <option value="Pakan Kurai">Pakan Kurai</option>
                <option value="Benteng Pasar Atas">Benteng Pasar Atas</option>
                <option value="Bukit Apit Puhun">Bukit Apit Puhun</option>
                <option value="Kayu Kubu">Kayu Kubu</option>
                <option value="Bukit Cangang Kayu Ramang">Bukit Cangang Kayu Ramang</option>
                <option value="Tarok Dipo">Tarok Dipo</option>
                <option value="Campago Ipuh">Campago Ipuh</option>
                <option value="Kubuh Gulai Rancang">Kubuh Gulai Rancang</option>
                <option value="Puhun Pintu Kabun">Puhun Pintu Kabun</option>
                <option value="Puhun Tembok">Puhun Tembok</option>
                <option value="Pulai Anak Air">Pulai Anak Air</option>
                <option value="Garegeh">Garegeh</option>
                <option value="Campago Guguak Bulek">Campago Guguak Bulek</option>
                <option value="Manggis Ganting">Manggis Ganting</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="kecamatan">Kecamatan</label>
            <div class="col-md-5">
              <select class="form-control" name="kecamatan" id="kecamatan">
                <option disabled selected>Pilih Kecamatan</option>
                <option value="Aul Birugo Tigo Baleh">Aul Birugo Tigo Baleh</option>
                <option value="Guguk Panjang">Guguk Panjang</option>
                <option value="Mandiangin Koto Selayan">Mandiangin Koto Selayan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="status_tanah">Status Tanah</label>
            <div class="col-md-5">
              <select class="form-control" name="status_tanah" id="status_tanah">
                <option disabled selected>Pilih Status Tanah</option>
                <option value="Tanah Sawah">Tanah Sawah</option>
                <option value="Tanah Pekarangan">Tanah Pekarangan</option>
                <option value="Tidak bersertifikat (tanah negara, hak garap)">Tidak bersertifikat (tanah negara, hak garap)</option>
                <option value="Sertifikat Hak Milik (SHM)">Sertifikat Hak Milik (SHM)</option>
                <option value="Sertifikat Hak Guna Bangunan (SHGB)">Sertifikat Hak Guna Bangunan (SHGB)</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="advis_planning">KRK / Advis Planning</label>
            <div class="col-md-5">
              <input type="text" class="form-control" required autocomplete="off" name="advis_planning" id="advis_planning">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="peruntukkan">Peruntukkan</label>
            <div class="col-md-5">
              <select class="form-control" name="peruntukkan" id="peruntukkan">
                <option disabled selected>Pilih Peruntukkan</option>
                <option>Tempat Tinggal</option>
                <option>Tempat Usaha Karya</option>
                <option>Tempat Usaha Sosial</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="jenis_bangunan">Jenis Bangunan</label>
            <div class="col-md-5">
              <select class="form-control" name="jenis_bangunan" id="jenis_bangunan">
                <option disabled selected>Pilih Jenis Bangunan</option>
                <option>Wisma Kecil</option>
                <option>Wisma Sedang</option>
                <option>Wisma Besar</option>
                <option>Pertokoan</option>
                <option>Ruko</option>
                <option>Industri</option>
                <option>Kantor Pemerintahan/Swasta</option>
                <option>Rumah Sakit</option>
                <option>Sekolah</option>
                <option>Mesjid</option>
                <option>Tempat Ibadah Lain</option>
                <option>Rumah Tempat Tinggal</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3"></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="jenis_lain_lain" id="jenis_lain_lain" autocomplete="off" placeholder="Lain lain, jika ada...">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close icons"> Batal</i></button>
          <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-check"> Simpan</i></button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@foreach ($imbPemohons as $imbPemohon)
  <div class="modal fade" id="showImb{!! $imbPemohon->id !!}Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Informasi Bangunan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-condensed table-striped table-bordered" id="imbPemohons">
            <thead></thead>
            <tbody>
            <tr>
              <td>Calon Pemilik</td><td>{!! $imbPemohon->nama !!}</td>
            </tr>
            {{--<tr>--}}
              {{--<td>Koordinat</td>--}}
              {{--<td>--}}
                {{--@forelse ($imbPemohon->imbs as $imb)--}}
                  {{--@if (isset($imb->imbSpasial))--}}
                    {{--POLYGON {!! $imb->imbSpasial->polygon !!}--}}
                  {{--@endif--}}
                {{--@empty--}}
                  {{--<i>Tidak ada data...</i>--}}
                {{--@endforelse--}}
              {{--</td>--}}
            {{--</tr>--}}
            <tr>
              <td>Alamat</td><td>{!! $imbPemohon->alamat !!}</td>
            </tr>
            <tr>
              <td>Luas Tanah</td>
              <td>
                @forelse ($imbPemohon->imbs as $imb)
                  @if (isset($imb->imbSpasial))
                    {!! $imb->imbSpasial->area !!} M2
                  @endif
                @empty
                  <i>Tidak ada data...</i>
                @endforelse
              </td>
            </tr>
            <tr>
              <td>Status Tanah</td>
              <td>
                @forelse ($imbPemohon->imbs as $imb)
                  {!! $imb->status_tanah !!}
                @empty
                  <i>Tidak ada data...</i>
                @endforelse
              </td>
            </tr>
            <tr>
              <td>Kecamatan</td>
              <td>
                @forelse ($imbPemohon->imbs as $imb)
                  {!! $imb->kecamatan !!}
                @empty
                  <i>Tidak ada data...</i>
                @endforelse
              </td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td>
                @forelse ($imbPemohon->imbs as $imb)
                  {!! $imb->kelurahan !!}
                @empty
                  <i>Tidak ada data...</i>
                @endforelse
              </td>
            </tr>
            <tr>
              <td>Peruntukan</td>
              <td>
                @forelse ($imbPemohon->imbs as $imb)
                  {!! $imb->peruntukkan !!}
                @empty
                  <i>Tidak ada data...</i>
                @endforelse
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endforeach

@endsection

@section('javascript')
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.js'></script>
  <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
  <script>
    {{-- Make toolbox draggable --}}
    dragElement(document.getElementById(("draggAble")));

    function dragElement(elmnt)
    {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementById(elmnt.id + "header"))
      {
        {{-- if present, the header is where you move the DIV from: --}}
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
      } else
      {
        {{-- otherwise, move the DIV from anywhere inside the DIV: --}}
        elmnt.onmousedown = dragMouseDown;
      }

      function dragMouseDown(e)
      {
        e = e || window.event;
        {{-- get the mouse cursor position at startup: --}}
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        {{-- call a function whenever the cursor moves: --}}
        document.onmousemove = elementDrag;
      }

      function elementDrag(e)
      {
        e = e || window.event;
        {{-- calculate the new cursor position: --}}
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        {{-- set the element's new position: --}}
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
      }

      function closeDragElement()
      {
        {{-- stop moving when mouse button is released: --}}
        document.onmouseup = null;
        document.onmousemove = null;
      }
    }

    {{-- Init Mapbox GL --}}
    mapboxgl.accessToken = 'pk.eyJ1IjoiY2xhc3NpY25pdGUiLCJhIjoiY2o5MHg0aTNtMzNqejJybjU4dnhudmI0ZCJ9.J2R_x1-738dvZtlL9GdRiw';
    var layerIDs = []; {{-- Will contain a list used to filter against. --}}
    var filterInput = document.getElementById('pencarian'); {{-- get input --}}

    var map = new mapboxgl.Map({
      container: 'map', {{-- container id --}}
      style: 'mapbox://styles/classicnite/cj90xcblb2br92rmon6ffmxz6', {{-- hosted style id --}}
      center: [100.369, -0.305], {{-- starting position --}}
      zoom: 13, {{-- starting zoom --}}
      pitch: 40,
      bearing: 20
    });

    {{-- Add zoom and rotation controls --}}
    map.addControl(new mapboxgl.NavigationControl());

    {{-- Create a popup, but don't add it to the map yet. --}}
    var popup = new mapboxgl.Popup({
      closeButton: false
    });

    {{-- Add style controls --}}
    var layerList = document.getElementById('layer-list');
    var inputs = layerList.getElementsByTagName('input');

    {{-- Add change map controls --}}
    function switchLayer(layer) {
      var styleName = layer.target.value;
      map.setStyle('mapbox://styles/classicnite/' + styleName);
    }

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].onclick = switchLayer;
    }

    {{-- Add color switcher control --}}
    var swatches = document.getElementById('swatches');
    var layer = document.getElementById('layer');
    var colors = ['#ffffcc','#a1dab4','#41b6c4','#2c7fb8','#253494','#fed976','#feb24c','#fd8d3c','#f03b20','#bd0026'];

    colors.forEach(function(color) {
      var swatch = document.createElement('button');
      swatch.style.backgroundColor = color;
      swatch.addEventListener('click', function() {
        if (layer.value === 'imb') {
          map.setPaintProperty(layer.value, 'fill-extrusion-color', color);
        } else {
          map.setPaintProperty(layer.value, 'fill-color', color);
        }
      });
      swatches.appendChild(swatch);
    });

    {{-- Add toggle layers control --}}
    var toggleableLayerIds = [ 'AUR BIRUGO TIGO BALEH', 'GUGUK PANJANG', 'MANDIANGIN KOTO SELAYAN' ];

    for (var l = 0; l < toggleableLayerIds.length; l++) {
      var id = toggleableLayerIds[l];

      var link = document.createElement('a');
      link.href = '#';
      link.className = 'active';
      link.textContent = id;

      link.onclick = function (e) {
        var clickedLayer = this.textContent;
        e.preventDefault();
        e.stopPropagation();

        var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

        if (visibility === 'visible') {
          map.setLayoutProperty(clickedLayer, 'visibility', 'none');
          this.className = '';
        } else {
          this.className = 'active';
          map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
        }
      };

      var layers = document.getElementById('layers');
      layers.appendChild(link);
    }

    {{-- fetch data from db --}}
    var imbs = {
      "type": "FeatureCollection",
      "features": [
        @foreach ($imbPoligons as $imbPoligon)
        {!! $imbPoligon->geojson !!},
        @endforeach
      ]
    };

    {{-- Add map data --}}
    map.on('style.load', function() {

      map.addSource('imbs', {
        "type": "geojson",
        "data": imbs
      });

      imbs.features.forEach(function(feature) {
        var symbol = feature.properties['name'];
        var layerID = 'id-' + symbol;

        {{-- Add a layer for this symbol type if it hasn't been added already. --}}
        if (!map.getLayer(layerID)) {
          map.addLayer({
            "id": layerID,
            "type": "fill-extrusion",
            "source": "imbs",
            "layout": {

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
            },
            "filter": ["==", "name", symbol]
          });

          layerIDs.push(layerID);
        }

      });

      filterInput.addEventListener('keyup', function(e) {
        {{-- If the input value matches a layerID set --}}
        {{-- it's visibility to 'visible' or else hide it. --}}
        var value = e.target.value.trim().toLowerCase();
        layerIDs.forEach(function(layerID) {
          map.setLayoutProperty(layerID, 'visibility',
            layerID.indexOf(value) > -1 ? 'visible' : 'none');

          {{-- Filter Bangunan Pemohon-IMB --}}
          var table, tr, td, m;
          table = document.getElementById("imbPemohons");
          tr = table.getElementsByTagName("tr");
          for (m = 0; m < tr.length; m++)
          {
            td = tr[m].getElementsByTagName("td")[0];
            if (td)
            {
              if (td.innerHTML.toLowerCase().indexOf(value) > -1)
              {
                tr[m].style.display = "";
              } else
              {
                tr[m].style.display = "none";
              }
            }
          }
        });
        popup.remove();
      });

      @foreach ($detailPoligons as $detailPoligon)
      map.on('click', '{!! $detailPoligon->nama !!}', function (e) { map.flyTo({center: e.lngLat});new mapboxgl.Popup().setLngLat(e.lngLat).setHTML(e.features[0].properties.description).addTo(map); });
      map.on('mousemove', '{!! $detailPoligon->nama !!}', function(e) { map.getCanvas().style.cursor = 'pointer';var feature = e.features[0];popup.setLngLat(e.lngLat).setHTML(feature.properties.description).addTo(map); });
      map.on('mouseenter', '{!! $detailPoligon->nama !!}', function () { map.getCanvas().style.cursor = 'pointer'; });
      map.on('mouseleave', '{!! $detailPoligon->nama !!}', function () { map.getCanvas().style.cursor = '';popup.remove(); });
      @endforeach

      {{--Add Layer Kecamatan--}}
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($aurBirugoTigoBaleh) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($gugukPanjang) !!});
      map.addLayer({!! \sigimbbkt\Libraries\StringMod::setNullOrNotSpatial($mandianginKotoSelatan) !!});
    });
  </script>
@endsection

@section('style')
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.css' rel='stylesheet' />
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
  <style>
    {{-- Mapbox GL Style --}}
    #map { position:relative; min-height: 750px; max-height: 100%; width:100%; }
    p { margin: 0; font-size: 13px; }

    {{-- Color switcher control Style --}}
    .map-overlay { font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif; position: absolute; width: 200px; top: -5px; left: -5px; padding: 10px; }
    .map-overlay .map-overlay-inner { background-color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 10px; -webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.4); -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.4); box-shadow: 0 1px 5px rgba(0,0,0,0.4); }
    .map-overlay-inner fieldset { border: none; padding: 0; margin: 0 0 10px; }
    .map-overlay-inner fieldset:last-child { margin: 0; }
    .map-overlay-inner select { width: 100%; }
    .map-overlay-inner label { display: block; font-weight: bold; margin: 0 0 5px; }
    .map-overlay-inner button { display: inline-block; width: 36px; height: 20px; border: none; cursor: pointer; }
    .map-overlay-inner button:focus { outline: none; }
    .map-overlay-inner button:hover { box-shadow:inset 0 0 0 3px rgba(0, 0, 0, 0.10); }
    .filter-group { font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif; font-weight: 600; position: absolute; top: 10px; right: 10px; z-index: 1; border-radius: 3px; width: 120px; color: #fff; }

    {{-- Color switcher control Style --}}
    {{-- #menu { position: absolute; background: #fff; padding: 10px; font-family: 'Open Sans', sans-serif; } --}}

    {{-- Toggle layers control Style --}}
    #layers { background: #fff; border-radius: 3px; width: 120px; border: 1px solid rgba(0,0,0,0.4); font-family: 'Open Sans', sans-serif; }

    #layers a { font-size: 13px;color: #404040;display: block; margin: 0; padding: 10px;text-decoration: none; border-bottom: 1px solid rgba(0,0,0,0.25); text-align: center; }
    #layers a:last-child { border: none; }
    #layers a:hover { background-color: #f8f8f8; color: #404040; }
    #layers a.active { background-color: rgba(56, 135, 190, 0.7); color: #ffffff; }
    #layers a.active:hover { background: #3074a4; }

    .filter-group input[type=checkbox]:first-child + label { border-radius: 3px 3px 0 0; }
    .filter-group label:last-child { border-radius: 0 0 3px 3px; border: none; }
    .filter-group input[type=checkbox] { display: none; }
    .filter-group input[type=checkbox] + label { background-color: #3386c0; display: block; cursor: pointer; padding: 10px; border-bottom: 1px solid rgba(0, 0, 0, 0.25); }
    .filter-group input[type=checkbox] + label { background-color: #3386c0; text-transform: capitalize; }
    .filter-group input[type=checkbox] + label:hover,
    .filter-group input[type=checkbox]:checked + label { background-color: #4ea0da; }
    .filter-group input[type=checkbox]:checked + label:before { content: '✔'; margin-right: 5px; }

    .filter-ctrl { position: absolute;top: 10px;right: 50px;z-index: 1;width: 220px; }
    .filter-ctrl input[type=text] {
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;width: 100%;border: 0;background-color: #fff;
      height: 40px;margin: 0;color: rgba(0,0,0,.5);padding: 10px;box-shadow: 0 0 0 2px rgba(0,0,0,0.1);border-radius: 3px;
    }

    {{-- Make draggable div element --}}
    #draggAble { cursor: move; z-index: 99999; }
  </style>
@endsection