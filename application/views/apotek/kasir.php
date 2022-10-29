  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Kasir Apps<i class="fas fa-cart-plus"></i></h3>
        <hr>
        <div class="row">

          <div class="container">

            <div class="row">
              <div class="col-sm-6">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Qty</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <form method="post" class="form-data">
                    <?php 
                    foreach ($produk as $data) { ?>
                      <tr>

                        <td><?= $data['nama_produk'] ?></td>
                        <td><?= $data['harga_jual'] ?></td>
                        <td><input type="number" name="qty[]" id="qty<?= $data['id'] ?>" value="1" class="form-control"></td>
                        <td>
                          <input type="hidden" name="id[]" id="id<?= $data['id'] ?>" value="<?= $data['id'] ?>">
                          <button class="btn btn-primary" id="add<?= $data['id'] ?>">Add</button>
                        </td>
                      </tr>

                      <script>
                        $(document).ready(function(){
                          $("#add<?= $data['id'] ?>").click(function(){
                            var id = $("#id<?= $data['id'] ?>").val();
                            var qty = $("#qty<?= $data['id'] ?>").val();
                            url = "<?= base_url('utama/add_keranjang?id=') ?>"+id+"&&qty="+qty;
                            $("#tampil-cart").load(url);
                          })
                        })
                      </script>
                    <?php } ?>
                  </form>
                </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <div id="tampil-cart">

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <!-- /.content -->
  </div>
</div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->













