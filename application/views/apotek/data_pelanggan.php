  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Pelanggan <i class="fas fa-user"></i></h3>
        <hr>
        <div class="row">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalAdmin">Tambah Pelanggan <i class="fas fa-plus"></i></button>
          <a href="<?= base_url('utama/cetak_datapelanggan') ?>" target="_blank" class="btn btn-danger mb-3 ml-2">Cetak Data Pelanggan <i class="fas fa-print"></i></a>


          <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Form Tambah Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php 
                  $kode = 'pelanggan-'.rand(0,10000);
                  ?>
                  <form method="post" action="">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Kode pelanggan</label>
                      <input type="text" name="kode_pelanggan" class="form-control" id="recipient-name" value="<?= $kode ?>" required="" readonly>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nama Pelanggan</label>
                      <input type="text" name="nama_pelanggan" class="form-control" id="recipient-name" required="" placeholder="Nama pelanggan">
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Alamat</label>
                      <textarea class="form-control" name="alamat" placeholder="alamat"></textarea>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" name="kirim" class="btn btn-primary" value="Tambah Pelanggan">
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
                  <th>Kode Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>Date Create</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                ?>
                <?php foreach ($pelanggan as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['kode_pelanggan'] ?></td>
                    <td><?= $data['nama_pelanggan'] ?></td>
                    <td><?= $data['alamat'] ?></td>
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
                              <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">


                             <form method="post" action="">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kode pelanggan</label>
                                <input type="text" name="kode_pelanggan" class="form-control" id="recipient-name" required="" value="<?= $data['kode_pelanggan'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control" id="recipient-name" required="" placeholder="Nama pelanggan" value="<?= $data['nama_pelanggan'] ?>">
                              </div>

                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="alamat"><?= $data['alamat'] ?></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="edit" class="btn btn-primary" value="Edit Pelanggan">
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
                <th>No</th>
                <th>Kode Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Date Creat</th>
                <th>Opsi</th>

              </tr>
            </tfoot>
          </table>

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








