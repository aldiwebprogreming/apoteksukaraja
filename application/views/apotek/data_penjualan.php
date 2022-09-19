  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Penjualan <i class="fas fa-user"></i></h3>
        <hr>
        <div class="row">

         <a href="<?= base_url('utama/cetak_datapenjualan') ?>" target="_blank" class="btn btn-danger mb-3">Cetak Data Penjualan <i class="fas-fa-print"></i></a>



         <div class="container">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Penjualan</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Total Hargas</th>
                <th>Date</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              ?>
              <?php foreach ($penjualan as $data) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode_penjualan'] ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?= $data['harga'] ?></td>
                  <td><?= $data['qty'] ?></td>
                  <td><?= $data['satuan'] ?></td>
                  <td><?= $data['total_harga'] ?></td>
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
                            <form method="post" action="<?= base_url('utama/hapus_penjualan') ?>">
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
             <th>Kode Penjualan</th>
             <th>Nama Barang</th>
             <th>Harga Barang</th>
             <th>Qty</th>
             <th>Satuan</th>
             <th>Total Hargas</th>
             <th>Date</th>
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








