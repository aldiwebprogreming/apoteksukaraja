  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Produk  <i class="fas fa-cart-plus"></i></h3>
        <hr>
        <div class="row">
          <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModalAdmin">Tambah Produk  <i class="fas fa-plus"></i></button>


          <a href="<?= base_url('utama/export_excel') ?>" class="btn btn-success ml-2 mb-2">Export <i class="fas fa-print"></i></a>

         <!--  <select class="form-control">
            <option>-- Pilih Barang --</option>
            <?php foreach($produk as $data) { ?>
              <option><?= $data['nama_produk'] ?></option>
            <?php } ?>
          </select> -->

          <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Form Tambah Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('utama/tambah_produk') ?>">

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control" id="recipient-name" required="" placeholder="Nama produk">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Qty</label>
                      <input type="number" name="qty" class="form-control" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Unit</label>
                      <select class="form-control" name="unit">
                        <option>-- Pilih Unit --</option>
                        <option>Btl</option>
                        <option>Pcs</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Harga Netto</label>
                      <input type="number" name="harga_netto" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Diskon</label>
                      <input type="number" name="diskon" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Harga Jual</label>
                      <input type="number" name="harga_jual" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" name="kirim" class="btn btn-primary" value="Tambah Barang">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="container">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Unit</th>
                  <th>Harga Netto</th>
                  <th>Diskon</th>
                  <th>Harga Jual</th>
                  <th>Opsi</th>

                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                ?>
                <?php foreach ($produk as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_produk'] ?></td>
                    <td><?= $data['unit'] ?></td>
                    <td><?= str_replace(' ', '.', $data['harga_netto']);  ?></td>
                    <td><?= $data['diskon'] ?></td>
                    <td><?= $data['harga_jual'] ?></td>
                    <td>

                      <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
                        Edit
                      </button> -->

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                       Hapus
                     </button>


                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                           Apakah anda ingin menghapus data ini?
                           <form method="post" action="<?= base_url('utama/hapus_produk') ?>">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

<!-- 
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
                            <form method="post" action="<?= base_url('utama/hapus_produk') ?>">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" name="hapus" class="btn btn-danger" value="Hapus">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  -->
                   <!--  <div class="modal fade" id="myModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                           <form method="post" action="">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Nama Produk</label>
                              <input type="text" name="nama_produk" class="form-control" id="recipient-name" required="" placeholder="Nama produk" value="<?= $data['nama_produk'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Qty</label>
                              <input type="number" name="qty" class="form-control" id="recipient-name" required="" value="<?= $data['qty'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Unit</label>
                              <select class="form-control" name="unit" required>
                                <option><?= $data['qty'] ?></option>
                                <option value="">-- Pilih Unit --</option>
                                <option>Btl</option>
                                <option>Pcs</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Harga Netto</label>
                              <input type="number" name="harga_netto" class="form-control" id="recipient-name" required="" value="<?= $data['harga_netto'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Diskon</label>
                              <input type="number" name="diskon" class="form-control" id="recipient-name" required="" value="<?= $data['diskon'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Harga Jual</label>
                              <input type="number" name="harga_jual" class="form-control" id="recipient-name" required="" value="<?= $data['harga_jual'] ?>">
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" name="edit" class="btn btn-primary" value="Edit Produk">
                            </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div> -->

                </td>
              </tr>


            <?php } ?>
          </tbody>
            <!-- <tfoot>
              <tr>
                <th colspan="3" style="text-align:center"><?= $no - 1 ?> Jenis Barang</th>
                <th colspan="2" style="text-align:center"><?=  "Rp " . number_format($total['harga'],0,',','.') ?></th>
                <th colspan="3"><?= $total['stok'] ?> Stok</th>


              </tr>
            </tfoot> -->
          </table>

        </div>
      </form>
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








