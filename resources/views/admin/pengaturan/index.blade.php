@extends('layouts.master')

@section('title', 'Pengaturan Umum')

@section('breadcrumb')
<li class="breadcrumb-item">Pengaturan</li>
<li class="breadcrumb-item active">Sistem</li>
@endsection

@section('breadcrumb-menu')
@endsection

@section('content')
<div class="animated fadeIn">

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-wrench"></i>
          <strong>Pengaturan</strong>
          <small>Umum</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="main_name" class="col-sm-3 col-form-label">Nama Sistem</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="main_name" name="main_name" placeholder="Nama sistem..." value="{!! $pengaturan['main_name'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="subName" class="col-sm-3 col-form-label">Perusahaan/Dinas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="subName" name="subName" placeholder="Perusahaan/dinas..." value="{!! $pengaturan['subName'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="alias" class="col-sm-3 col-form-label">Alias</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias..." value="{!! $pengaturan['alias'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-globe"></i>
          <strong>Pengaturan</strong>
          <small>Environment</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="app_env" class="col-sm-3 col-form-label">Environment</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="app_env" name="app_env" placeholder="Nama sistem..." value="{!! $pengaturan['app_env'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="app_debug" class="col-sm-3 col-form-label">Debug</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="app_debug" name="app_debug" placeholder="Perusahaan/dinas..." value="{!! $pengaturan['app_debug'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="app_url" class="col-sm-3 col-form-label">Url</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="app_url" name="app_url" placeholder="Alias..." value="{!! $pengaturan['app_url'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-database"></i>
          <strong>Pengaturan</strong>
          <small>Database</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="db_connection" class="col-sm-3 col-form-label">Jenis Database</label>
              <div class="col-sm-9">
                <select name="db_connection" id="db_connection" class="form-control" disabled>
                  <option value="" disabled>Pilih Jenis Database</option>
                  <option value="mysql">MySQL</option>
                  <option value="pgsql" selected>PostgreSQL</option>
                  <option value="oracle">Oracle</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="db_host" class="col-sm-3 col-form-label">Hostname</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="db_host" placeholder="Hostname..." value="{!! $pengaturan['db_host'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="db_port" class="col-sm-3 col-form-label">Port</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="db_port" name="db_port" placeholder="Port..." value="{!! $pengaturan['db_port'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="db_name" class="col-sm-3 col-form-label">Database Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="db_name" name="db_name" placeholder="Database..." value="{!! $pengaturan['db_name'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="db_username" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="db_username" name="db_username" placeholder="Username..." value="{!! $pengaturan['db_username'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="db_password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="db_password" name="db_password" placeholder="Password..." value="{!! $pengaturan['db_password'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-rocket"></i>
          <strong>Pengaturan</strong>
          <small>Cache</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="broadcast_driver" class="col-sm-3 col-form-label">Broadcast Driver</label>
              <div class="col-sm-9">
                <select name="broadcast_driver" id="broadcast_driver" class="form-control" disabled>
                  <option value="" disabled>Pilih Jenis Driver</option>
                  <option value="memcached">Memcached</option>
                  <option value="redis" selected>Redis</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="cache_driver" class="col-sm-3 col-form-label">Cache Driver</label>
              <div class="col-sm-9">
                <select name="cache_driver" id="cache_driver" class="form-control" disabled>
                  <option value="" disabled>Pilih Jenis Driver</option>
                  <option value="memcached">Memcached</option>
                  <option value="redis" selected>Redis</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="cache_prefix" class="col-sm-3 col-form-label">Cache Prefix</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cache_prefix" name="cache_prefix" value="{!! $pengaturan['cache_prefix'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="cache_lifetime" class="col-sm-3 col-form-label">Cache Lifetime</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cache_lifetime" name="cache_lifetime" value="{!! $pengaturan['cache_lifetime'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="session_driver" class="col-sm-3 col-form-label">Session Driver</label>
              <div class="col-sm-9">
                <select name="session_driver" id="session_driver" class="form-control" disabled>
                  <option value="" disabled>Pilih Jenis Driver</option>
                  <option value="memcached">Memcached</option>
                  <option value="redis" selected>Redis</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="session_cookie" class="col-sm-3 col-form-label">Session Cookie</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="session_cookie" name="session_cookie" value="{!! $pengaturan['session_cookie'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="queue_driver" class="col-sm-3 col-form-label">Queue Driver</label>
              <div class="col-sm-9">
                <select name="queue_driver" id="queue_driver" class="form-control" disabled>
                  <option value="" disabled>Pilih Jenis Driver</option>
                  <option value="memcached">Memcached</option>
                  <option value="redis" selected>Redis</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-rocket"></i>
          <strong>Pengaturan</strong>
          <small>Redis</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="redis_host" class="col-sm-3 col-form-label">Hostname</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="redis_host" name="redis_host" value="{!! $pengaturan['redis_host'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="redis_password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="redis_password" name="redis_password" value="{!! $pengaturan['redis_password'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="redis_port" class="col-sm-3 col-form-label">Port</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="redis_port" name="redis_port" value="{!! $pengaturan['redis_port'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-envelope"></i>
          <strong>Pengaturan</strong>
          <small>Surat</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="mail_driver" class="col-sm-3 col-form-label">Driver</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_driver" name="mail_driver" value="{!! $pengaturan['mail_driver'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="mail_host" class="col-sm-3 col-form-label">Hostname</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_host" name="mail_host" value="{!! $pengaturan['mail_host'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="mail_port" class="col-sm-3 col-form-label">Port</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_port" name="mail_port" value="{!! $pengaturan['mail_port'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="mail_username" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_username" name="mail_username" value="{!! $pengaturan['mail_username'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="mail_password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_password" name="mail_password" value="{!! $pengaturan['mail_password'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="mail_encryption" class="col-sm-3 col-form-label">Encryption</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail_encryption" name="mail_encryption" value="{!! $pengaturan['mail_encryption'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-ellipsis-h"></i>
          <strong>Pengaturan</strong>
          <small>Lain</small>
        </div>
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <label for="google_maps_api_key" class="col-sm-3 col-form-label">Google Maps API Key</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="google_maps_api_key" name="google_maps_api_key" value="{!! $pengaturan['google_maps_api_key'] !!}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="bing_maps_api_key" class="col-sm-3 col-form-label">Bing Maps API Key</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="bing_maps_api_key" name="bing_maps_api_key" value="{!! $pengaturan['bing_maps_api_key'] !!}" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-ladda ladda-button" data-color="blue" data-style="slide-left" disabled><i class="fa fa-check"> Simpan</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
@endsection