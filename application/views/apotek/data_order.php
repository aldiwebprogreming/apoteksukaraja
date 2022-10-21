  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Order <?= $tgl ?> <i class="fas fa-shop"></i></h3>
        <hr>
        <div class="row">

          <?php if (isset($tgl_awal)) { ?>

           <a href="<?= base_url('utama/cetak_dataorder?tgl_awal=') ?><?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mb-3">Cetak Data Penjualan <i class="fas fa-print"></i></a>

         <?php  }else{ ?>

           <a href="<?= base_url('utama/cetak_dataorder') ?>" target="_blank" class="btn btn-danger mb-3">Cetak Data Penjualan <i class="fas fa-print"></i></a>

         <?php  } ?>

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

        <div class="container">
          <form method="post" action="<?= base_url('utama/print_order') ?>">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No</th>
                  <th>Kode Order</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Qty</th>
                  <th>Total Harga</th>
                  <th>NB</th>
                  <th>Date</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                ?>
                <?php foreach ($order as $data) { ?>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input type="checkbox" name="order[]" class="form-check-input" id="exampleCheck1" value="<?= $data['kode_order']?> ">
                        <label class="form-check-label" for="exampleCheck1">Print</label>
                      </div>
                    </td>
                    <td><?= $no++ ?></td>
                    <td><?= $data['kode_order'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['qty_barang'] ?></td>
                    <td><?=  "Rp " . number_format($data['total_harga'],0,',','.') ?></td>
                    <td><?= $data['nb'] ?></td>
                    <td><?= $data['date'] ?></td>
                    <td>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $data['id'] ?>">
                        Hapus
                      </button>

                      <a href="<?= base_url('utama/detail_order/') ?><?= $data['kode_order'] ?>" class="btn btn-primary btn-sm">Detail Order</a>

                   <!--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
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




                  </td>
                </tr>

              <?php } ?>
            </tbody>
            <tfoot>
              <tr style="background: orange">
                <th colspan="5" style="text-align:center;"><?= $no-1 ?> Order</th>
                <th colspan="1" style="text-align: center;"><?= $total['qty_barang'] ?> QTY</th>
                <th><?=  "Rp " . number_format($total['total_harga'],0,',','.') ?></th>


                <th colspan="3">Total Pemasukan : <?=  "Rp " . number_format($total['total_harga'],0,',','.') ?> </th>

              </tr>
            </tfoot>
          </table>

          <button type="submit" name="print" class="btn btn-primary btn-block mt-3">Print</button>
        </form>
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








