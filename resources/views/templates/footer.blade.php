
  <!--   Core JS Files   -->
  
  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- DataTable -->
  <script src="../assets/datatables/dataTables.min.js"></script>
  <!-- Sweet Alert -->
  <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script>
    $(function(){
    $(document).on('click', '#logout', function (e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Tolong konfirmasi sebelum anda keluar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tentu'
      }).then((result) => {
        if (result.isConfirmed) {
          // $(e.target).attr('href').submit
          window.location.href = "{{url('/logout')}}";
        }
      })  
    })
  })
  </script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <!-- Dropzone -->
  <script src="../assets/plugins/dropzone/dropzone.js"></script>
  <script>
    Dropzone.options.excel = {
        acceptedFiles: ".xls,.xlsx",
        dictDefaultMessage: "Drop your Excel here",
        maxFiles: 1,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                toastr.error('Only single file is allowed.')
            });
        }
    };
</script>

  @stack('script')
</body>

</html>