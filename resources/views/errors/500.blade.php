@extends('layouts.error')

@section('title', '503 Error')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="clearfix">
        <h1 class="float-left display-3 mr-4">500</h1>
        <h4 class="pt-3">Admin, kita punya masalah!</h4>
        <p class="text-muted">Halaman yang Anda cari sementara tidak tersedia.</p>
      </div>
    </div>
  </div>
</div>
@endsection
