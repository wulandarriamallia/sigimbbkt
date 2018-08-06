<script>
  $(document).ready(function () {
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
      case 'info':
        toastr.info("{{ Session::get('message') }}", "Informasi!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
        break;

      case 'warning':
        toastr.warning("{{ Session::get('message') }}", "Peringatan!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
        break;

      case 'success':
        toastr.success("{{ Session::get('message') }}", "Sukses!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
        break;

      case 'error':
        toastr.error("{{ Session::get('message') }}", "Kesalahan!", {
          showMethod: "fadeIn",
          hideMethod: "fadeOut",
          timeOut: 5e3,
          progressBar: !0
        });
        break;
    }
    @endif
  });
</script>