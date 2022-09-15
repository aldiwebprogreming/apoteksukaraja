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
        <h4 style="font-weight: bold; margin-bottom: 30px; ">Data Privilige</h4>
        <div class="row">

          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalAdmin">Tambah Privilige</button>

          <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Form Tambah Privilige</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('utama/tambah_priv') ?>">

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Role :</label>
                      <select class="form-control" name="role" required="">
                        <option value="">-- Pilih Role --</option>
                        <?php foreach ($role as $data) { ?>
                          <option><?= $data['role'] ?></option>
                        <?php } ?>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Access :</label><br>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="dashboard" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox1">Dashboard</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="item" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox2">Item</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="user" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox1">User</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="role" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox2">Role</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="privilege" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox1">Privilege</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="harga" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox2">harga</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="stok" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox2">Stok</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="pembelian" name="access[]">
                        <label class="form-check-label" for="inlineCheckbox2">pembelian</label>
                      </div>

                    </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="kirim" class="btn btn-primary" value="Tambah Privilege">
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
                    <th>Role</th>
                    <th>Access</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  ?>
                  <?php foreach ($priv as $data) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data['role'] ?></td>
                      <td><?= $data['access'] ?></td>
                      <td>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $data['id'] ?>">
                          Hapus
                        </button>
<!-- 
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
                          Edit
                        </button> -->


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
                                <form method="post" action="<?= base_url('utama/hapus_priv') ?>">
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

                        <div class="modal fade" id="myModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">


                                <form method="post" action="<?= base_url('utama/edit_item') ?>">
                                  <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Item :</label>
                                    <input type="text" name="nama_item" class="form-control" id="recipient-name" required="" value="<?= $data['nama_item'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Harga :</label>
                                    <select class="form-control" name="harga" required="">
                                      <option><?= $data['harga'] ?></option>

                                      <?php foreach ($harga as $harga1) { ?>
                                        <option><?= $harga1['harga'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Stok :</label>
                                    <input type="number" name="stok" class="form-control" id="recipient-name" required value="<?= $data['stok'] ?>">
                                  </div>


                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Unit :</label>
                                    <select class="form-control" name="unit" required="">
                                      <option><?= $data['unit'] ?></option>

                                      <?php foreach ($unit as $unit1) { ?>
                                        <option><?= $unit1['unit'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Item">
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
                  <th>Role</th>
                  <th>Access</th>
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
