@extends('layouts.master')

@section('title', 'Tambah Data Retribusi IMB')

@section('breadcrumb')
<li class="breadcrumb-item">Data Master</li>
<li class="breadcrumb-item"><a href="{!! route('front_office::imbRetribusi.index') !!}">Retribusi IMB</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="card card-accent-primary">
        <div class="card-header">
          <i class="fa fa-list-alt"></i>
          <strong>Form Tambah Retribusi</strong>
          <small>Izin Mendirikan Bangunan (IMB)</small>
        </div>
        {!! Form::open(['route' => 'front_office::imbRetribusi.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="card-body">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="imb_id">No. PIMB</label>
            <div class="col-md-4">
              <select class="form-control select2" name="imb_id" id="imb_id">
                <option disabled selected>Pilih No. PIMB</option>
                @foreach ($imbs as $imb)
                  <option value="{!! $imb->id !!}">IMB{!! \sigimbbkt\Libraries\Generator::genImbId($imb->id) . '-' . $imb->imbPemohon->nama !!}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label">Biaya Retribusi IMB</label>
            <label class="col-md-2 form-control-label" for="jenis_bangunan">Bangunan</label>
            <div class="col-md-4">
              <label class="form-control-label" for="jenis_bangunan" id="jenis_bangunan">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label">Pemohonan</label>
            <label class="col-md-2 form-control-label" for="pemohon_nama">Nama</label>
            <div class="col-md-4">
              <label class="form-control-label" for="pemohon_nama" id="pemohon_nama">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label"></label>
            <label class="col-md-2 form-control-label" for="pemohonan_nomor">Nomor</label>
            <div class="col-md-4">
              <label class="form-control-label" for="pemohonan_nomor" id="pemohonan_nomor">-</label>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="pemohon_alamat">Alamat Pemohon</label>
            <div class="col-md-4">
              <label class="form-control-label" for="pemohon_alamat" id="pemohon_alamat">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="status_tanah">Diatas Tanah HM / HGB / Suku</label>
            <div class="col-md-4">
              <label class="form-control-label" for="status_tanah" id="status_tanah">-</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 form-control-label" for="lokasi_bangunan">Lokasi Bangunan</label>
            <div class="col-md-4">
              <label class="form-control-label" for="lokasi_bangunan" id="lokasi_bangunan">-</label>
            </div>
          </div><hr />
          <fieldset>
            <legend>Uraian</legend>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="luas_bangunan">Luas Bangunan</label>
              <div class="col-md-2">
                <input type="number" min="0" class="form-control luas_bangunan" autocomplete="off" name="luas_bangunan" value="0" required>
              </div>
              <label class="col-md-3 form-control-label"></label>
              <label class="col-md-1 form-control-label" for="luas_koefisien">Koefisien</label>
              <div class="col-md-1">
                <label class="badge badge-pill badge-primary float-right luas_koefisien">0.00</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="tingkat_bangunan">Tingkat Bangunan</label>
              <div class="col-md-2">
                <input type="number" min="1" max="5" class="form-control tingkat_bangunan" autocomplete="off" name="tingkat_bangunan" value="0" required>
              </div>
              <label class="col-md-3 form-control-label"></label>
              <label class="col-md-1 form-control-label" for="tingkat_koefisien">Koefisien</label>
              <div class="col-md-1">
                <label class="badge badge-pill badge-success float-right tingkat_koefisien">0.00</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="guna_bangunan">Guna Bangunan</label>
              <div class="col-md-5">
                <select class="form-control select2 guna_bangunan" name="guna_bangunan" required>
                  <option disabled selected>Pilih Guna Bangunan</option>
                  <option value="Bangunan Sosial">Bangunan Sosial</option>
                  <option value="Bangunan Perumahan">Bangunan Perumahan</option>
                  <option value="Bangunan Fasilitas Umum">Bangunan Fasilitas Umum</option>
                  <option value="Bangunan Pendidikan">Bangunan Pendidikan</option>
                  <option value="Bangunan Kelembagaan/Kantor">Bangunan Kelembagaan/Kantor</option>
                  <option value="Bangunan Perdagangan & Jasa">Bangunan Perdagangan & Jasa</option>
                  <option value="Bangunan Industri">Bangunan Industri</option>
                  <option value="Bangunan Khusus">Bangunan Khusus</option>
                  <option value="Bangunan Campuran">Bangunan Campuran</option>
                  <option value="Bangunan Lain-lain">Bangunan Lain-lain</option>
                </select>
              </div>
              <label class="col-md-1 form-control-label" for="guna_koefisien">Koefisien</label>
              <div class="col-md-1">
                <label class="badge badge-pill badge-danger float-right guna_koefisien">0.00</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="jenis_bangunan">Jenis Bangunan</label>
              <div class="col-md-5">
                <select class="form-control select2 jenis_bangunan" name="jenis_bangunan" required>
                  <option disabled selected>Pilih Jenis Bangunan</option>
                  <option value="Bangunan Mewah/Luks">Bangunan Mewah/Luks</option>
                  <option value="Bangunan Permanen">Bangunan Permanen</option>
                  <option value="Bangunan Semi Permanen">Bangunan Semi Permanen</option>
                  <option value="Bangunan Darurat">Bangunan Darurat</option>
                </select>
              </div>
              <label class="col-md-1 form-control-label" for="jenis_koefisien">Koefisien</label>
              <div class="col-md-1">
                <label class="badge badge-pill badge-warning float-right jenis_koefisien">0.00</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="lokasi_kawasan">Lokasi / Kawasan</label>
              <div class="col-md-5">
                <select class="form-control select2 lokasi_kawasan" name="lokasi_kawasan" required>
                  <option disabled selected>Pilih Lokasi / Kawasan</option>
                  <option value="Kawasan pasar/pertokoan dan lingkungan komersial">Kawasan pasar/pertokoan dan lingkungan komersial</option>
                  <option value="Lingkungan perumahan di pusat kota">Lingkungan perumahan di pusat kota</option>
                  <option value="Lingkungan perumahan di pinggir kota">Lingkungan perumahan di pinggir kota</option>
                </select>
              </div>
              <div class="col-md-3">
                (Tarif Rp <label class="form-control-label lokasi_tarif">0</label>,- per-izin)
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="lokasi_jalan">*Jalan</label>
              <div class="col-md-5">
                <textarea class="form-control" name="lokasi_jalan" id="lokasi_jalan" cols="30" rows="3" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="lokasi_kelurahan">*Kelurahan</label>
              <div class="col-md-5">
                <textarea class="form-control" name="lokasi_kelurahan" id="lokasi_kelurahan" cols="30" rows="3" required></textarea>
              </div>
            </div>
          </fieldset><hr />
          <fieldset>
            <legend>Retribusi</legend>
            <p>Dihitung 1% dari anggaran fisik bangunan </p>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="bangunan_baru">*Bangunan Baru</label>
              <div class="col-md-1">
                <label class="badge badge-pill badge-primary float-right luas_koefisien sum1">0.00</label>
              </div>x
              <div class="col-md-1">
                <label class="badge badge-pill badge-success float-right tingkat_koefisien sum2">0.00</label>
              </div>x
              <div class="col-md-1">
                <label class="badge badge-pill badge-danger float-right guna_koefisien sum3">0.00</label>
              </div>x
              <div class="col-md-1">
                <label class="badge badge-pill badge-warning float-right jenis_koefisien sum4">0.00</label>
              </div>x
              <div class="col-md-2">
                Rp <label class="form-control-label lokasi_tarif sum5">0</label>
              </div>=
              <div class="col-md-2">
                Rp <label class="form-control-label bangunan_baru_total">0</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-6 form-control-label">*Bangunan Renovasi / Perbaikkan / Rehabilitas = 30% x a Patokan Dasar</label>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label"><label class="form-control-label">(30 % </label> x Rp </label>
              <div class="col-md-3">
                <input type="text" class="form-control" autocomplete="off" name="patokan_dasar" id="patokan_dasar" value="0">
              </div>)
              <label class="col-md-3 form-control-label"></label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= Rp&nbsp;<label class="form-control-label bangunan_renovasi_total">0</label>
            </div>

            <div class="form-group row">
              <label class="col-md-6 form-control-label"></label>
              <label class="col-md-2 form-control-label" for="jumlah">Jumlah</label>
              <div class="col-md-3">
                &nbsp;&nbsp;= Rp <label class="form-control-label bangunan_baru_total">0</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 form-control-label" for="terbilang">Terbilang</label>
              <div class="col-md-9">
                <label class="form-control-label terbilang">-</label>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <a class="btn btn-secondary" href="{!! route('front_office::imbRetribusi.index') !!}"><i class="icon-close icons"> Batal</i></a>
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