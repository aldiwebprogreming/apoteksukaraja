  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
      <!--   <?= $this->session->flashdata('hello'); ?> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <h4 style="font-weight: bold; margin-bottom: 30px; ">Data Pembelian</h4>
        <div class="row">

         <!--  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalAdmin">Tambah Pembelian</button>
         -->
         <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Form Tambah Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Item :</label>
                    <input type="text" name="nama_item" class="form-control" id="recipient-name" required="">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Harga :</label>
                    <select class="form-control" name="harga" required="">
                      <option value="">-- Pilih Harga --</option>
                      <?php foreach ($harga as $data) { ?>
                        <option><?= $data['harga'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Stok :</label>
                    <input type="number" name="stok" class="form-control" id="recipient-name" required="">
                  </div>


                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Unit :</label>
                    <select class="form-control" name="unit" required="">
                      <option value="">-- Pilih Unit --</option>
                      <?php foreach ($unit as $data) { ?>
                        <option><?= $data['unit'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="kirim" class="btn btn-primary" value="Tambah Item">
                </div>
              </form>
            </div>
          </div>
        </div>



        <div class="container mb-3">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Item</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Total Harga</th>
                  <th>Total Harga PPN</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                ?>
                <?php foreach ($pembelian as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['invoice'] ?></td>
                    <td><?= $data['item'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['qty'] ?></td>
                    <td><?= $data['unit'] ?></td>
                    <td><?= $data['total_harga'] ?></td>
                    <td><?= $data['total_ppn'] ?></td>
                    <td>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $data['id'] ?>">
                        Hapus
                      </button>

                     <!--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
                        Edit
                      </button>
                    -->

                    <div class="modal fade" id="myModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda ingin menghapus data ini?
                            <form method="post" action="<?= base_url('utama/hapus_pembelian') ?>">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>



                  </td>
                </tr>

              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Nama Item</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Total Harga</th>
                <th>Total Harga PPN</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>







      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
