<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('title') - {!! Config::get('app.mainName') . Config::get('app.subName') !!}">
  <meta name="author" content="{!! Config::get('app.author') !!}">
  <meta name="keyword" content="sistem,informasi,geografis,izin,mendirikan,bangunan,kota,bukittinggi">
  <link rel="shortcut icon" href="{!! asset('assets/img/favicon.png') !!}" type="image/png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') - {!! Config::get('app.mainName') . Config::get('app.subName') !!}</title>

  <!-- End-External-Styles -->

  <link rel="stylesheet" href="{!! elixir('assets/css/master.min.css') !!}">
  <link rel="stylesheet" href="{!! elixir('assets/css/app.min.css') !!}">
  <!-- End-Include-Styles -->

  @yield('style')
  <!-- End-Inline-Style -->
</head>