  <footer class="main-footer">

  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="<?= base_url() ?>assets_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url() ?>assets_admin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>assets_admin/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets_admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets_admin/dist/js/pages/dashboard3.js"></script>

<script src="<?= base_url() ?>assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets_admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets_admin/alert.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- <script src="?php echo base_url() ?>assets_admin/plugins/select2/js/select2.full.min.js"></script> -->

<script src="<?php echo base_url() ?>assets_admin/plugins/summernote/summernote-bs4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.1/sweetalert2.min.js" integrity="sha512-haPWapEH4geHw14UUzxrXfv7WygtauJoqmcg9f3HRgqE1cr+TSlB8hqsyq0F3i34DUsvq9k3r8uCjJFBmdDE4g==" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(document).ready(() => {
    $('#image').change(function() {
      const file = this.files[0];
      console.log(file);
      if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
          console.log(event.target.result);
          $('#imgPreview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });
</script>

<script>

  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>



<script src="<?php echo base_url() ?>assets_admin/alert.js"></script>
<?php echo "<script>".$this->session->flashdata('message')."</script>"?> 
<?php $this->session->unset_userdata('message'); ?>

</body>
</html>
