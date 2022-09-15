  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data User <i class="fas fa-user"></i></h3>
        <hr>
        <div class="row">
         <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalAdmin">Tambah User</button>

         <div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Form Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php 
                $kode = 'user-'.rand(0,10000);
                ?>
                <form method="post" action="">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kode User</label>
                    <input type="text" name="kode_user" class="form-control" id="recipient-name" value="<?= $kode ?>" required="" readonly>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="recipient-name" required="" placeholder="Username">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Role</label>
                    <select class="form-control" name="role" required>
                      <option value="">-- Pilih Role --</option>
                      <option>Kasir</option>
                      <option>Admin</option>
                      <option>Super Admin</option>
                    </select>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="kirim" class="btn btn-primary" value="Tambah User">
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
                <th>Kode User</th>
                <th>Username</th>
                <th>Role</th>
                <th>Date Create</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              ?>
              <?php foreach ($user as $data) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode_user'] ?></td>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['role'] ?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                           <form method="post" action="">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Kode User</label>
                              <input type="text" name="kode_user" class="form-control" id="recipient-name" required="" value="<?= $data['kode_user'] ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="recipient-name" required="" placeholder="Username" value="<?= $data['username'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Role</label>
                              <select class="form-control" name="role" required>
                                <option ><?= $data['role'] ?></option>
                                <option value="">-- Pilih Role --</option>
                                <option>Kasir</option>
                                <option>Admin</option>
                                <option>Super Admin</option>
                              </select>
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
              <th>Kode User</th>
              <th>Username</th>
              <th>Role</th>
              <th>Date Create</th>
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








