  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Barang <?= $tgl ?> <i class="fas fa-cart-plus"></i></h3>
        <hr>
        <div class="row">
          <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModalAdmin">Tambah Barang  <i class="fas fa-plus"></i></button>

          <?php   if (isset($tgl_awal)) { ?>
            <a href="<?= base_url('utama/cetak_databarang?tgl_awal=') ?><?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mb-2 ml-2">Cetak Data Barang <i class="fas fa-print"></i></a>
          <?php   }else{ ?>
            <a href="<?= base_url('utama/cetak_databarang') ?>" target="_blank" class="btn btn-danger ml-2 mb-2">Cetak Data Barang <i class="fas fa-print"></i></a>
          <?php   } ?>

          <form class="form-inline" method="post" action="">
           <div class="form-group mx-sm-3 mb-2">

             <input type="date" class="form-control" name="tgl1">
           </div>
           S/D
           <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="date" class="form-control" name="tgl2">
          </div>
          <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Cari Data Pertanggal</button>
        </form>

        <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Form Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php 
                $kode = 'produk-'.rand(0,10000);
                ?>
                <form method="post" action="">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" id="recipient-name" value="<?= $kode ?>" required="" readonly>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="recipient-name" required="" placeholder="Nama barang">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" id="recipient-name" required="" placeholder="Harga">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Satuan Barang</label>
                    <select class="form-control" name="satuan">
                      <option value="">-- Pilih Satuan Barang --</option>
                      <option>Btl</option>
                      <option>Box</option>
                      <option>Saset</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Stok Awal</label>
                    <input type="number" name="stok" class="form-control" id="recipient-name" required="" placeholder="Stok">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
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
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Date Create</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              ?>
              <?php foreach ($barang as $data) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode_barang'] ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?= $data['harga'] ?></td>
                  <td><?= $data['satuan'] ?></td>
                  <td><?= $data['stok'] ?></td>
                  <td><?= $data['date'] ?></td>
                  <td>

                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $data['id'] ?>">
                      Hapus
                    </button>

                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
                      Edit
                    </button>


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
                            <form method="post">
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

                    <div class="modal fade" id="myModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <label for="recipient-name" class="col-form-label">Kode Barang</label>
                              <input type="text" name="kode_barang" class="form-control" id="recipient-name" value="<?= $data['kode_barang'] ?>" required="" readonly>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Nama Barang</label>
                              <input type="text" name="nama_barang" class="form-control" id="recipient-name" required="" placeholder="Nama barang" value="<?= $data['nama_barang'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Harga</label>
                              <input type="number" name="harga" class="form-control" id="recipient-name" required="" placeholder="Harga" value="<?= $data['harga'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Satuan Barang</label>
                              <select class="form-control" name="satuan">
                                <option><?= $data['satuan'] ?></option>
                                <option value="">-- Pilih Satuan Barang --</option>
                                <option>Btl</option>
                                <option>Box</option>
                                <option>Saset</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Stok Awal</label>
                              <input type="number" name="stok" class="form-control" id="recipient-name" required="" placeholder="Stok" value="<?= $data['stok'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Keterangan</label>
                              <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?= $data['keterangan'] ?></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" name="edit" class="btn btn-primary" value="Edit Barang">
                            </div>
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
              <th colspan="3" style="text-align:center"><?= $no - 1 ?> Jenis Barang</th>
              <th colspan="2" style="text-align:center"><?=  "Rp " . number_format($total['harga'],0,',','.') ?></th>
              <th colspan="3"><?= $total['stok'] ?> Stok</th>


            </tr>
          </tfoot>
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








