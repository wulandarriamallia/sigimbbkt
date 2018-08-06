<a href="{!! route('pemohon::imb.show', $notification->data['imb']['id']) !!}" class="dropdown-item" target="_blank">
  <i class="fa fa-exclamation text-info"></i>
  PIMB-{!! \sigimbbkt\Libraries\Generator::genImbId($notification->data['imb']['id']) !!} Anda telah diselesaikan.
</a>