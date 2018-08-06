@extends('layouts.master')

@section('title', 'Tambah Data IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imb.index') !!}">IMB</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list-alt"></i>
          <strong>Form Tambah </strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        {!! Form::open(['route' => 'front_office::imb.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="card-body">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="imb_pemohon_id">Nama Pemohon</label>
            <div class="col-md-5">
              <select class="form-control select2" name="imb_pemohon_id" id="imb_pemohon_id">
                <option disabled selected>Pilih Nama Pemohon</option>
                @foreach ($imbPemohons as $imbPemohon)
                <option value="{!! $imbPemohon->id !!}">{!! $imbPemohon->nama !!}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="telepon">No. Telepon</label>
            <div class="col-md-5">
              <label class="form-control-label" for="telepon" id="telepon">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="alamat">Alamat</label>
            <div class="col-md-5">
              <label class="form-control-label" for="alamat" id="alamat">-</label>
            </div>
          </div><hr />

          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="jalan">Jalan / RT-RW</label>
            <div class="col-md-5">
              <textarea class="form-control" name="jalan" id="jalan" cols="30" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="kelurahan">Kelurahan</label>
            <div class="col-md-5">
              <select class="form-control select2" name="kelurahan" id="kelurahan">
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
            <label class="col-md-2 form-control-label" for="kecamatan">Kecamatan</label>
            <div class="col-md-5">
              <select class="form-control select2" name="kecamatan" id="kecamatan">
                <option disabled selected>Pilih Kecamatan</option>
                <option value="Aul Birugo Tigo Baleh">Aul Birugo Tigo Baleh</option>
                <option value="Guguk Panjang">Guguk Panjang</option>
                <option value="Mandiangin Koto Selayan">Mandiangin Koto Selayan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="status_tanah">Status Tanah</label>
            <div class="col-md-5">
              <select class="form-control select2" name="status_tanah" id="status_tanah">
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
            <label class="col-md-2 form-control-label" for="advis_planning">KRK / Advis Planning</label>
            <div class="col-md-5">
              <input type="text" class="form-control" required autocomplete="off" name="advis_planning" id="advis_planning">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="peruntukkan">Peruntukkan</label>
            <div class="col-md-5">
              <select class="form-control select2" name="peruntukkan" id="peruntukkan">
                <option disabled selected>Pilih Peruntukkan</option>
                <option>Tempat Tinggal</option>
                <option>Tempat Usaha Karya</option>
                <option>Tempat Usaha Sosial</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="jenis_bangunan">Jenis Bangunan</label>
            <div class="col-md-5">
              <select class="form-control select2" name="jenis_bangunan" id="jenis_bangunan">
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
            <label class="col-sm-2"></label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="jenis_lain_lain" id="jenis_lain_lain" autocomplete="off" placeholder="Lain lain, jika ada...">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <a class="btn btn-secondary" href="{!! route('front_office::imb.index') !!}"><i class="icon-close icons"> Batal</i></a>
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left"><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

</div>
@endsection