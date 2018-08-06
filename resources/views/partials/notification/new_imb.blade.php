<a href="{!! route('front_office::imb.show', $notification->data['imb']['id']) !!}" class="dropdown-item" target="_blank">
  <i class="fa fa-exclamation text-info"></i>
  {!! \sigimbbkt\Libraries\IdConversion::getImbPemohonAll($notification->data['imb']['imb_pemohon_id'])->nama  !!} telah mengajukan PIMB-{!! \sigimbbkt\Libraries\Generator::genImbId($notification->data['imb']['id']) !!}
</a>