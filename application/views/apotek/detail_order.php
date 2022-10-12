  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Detail Order  <i class="fas fa-user"></i></h3>
        <hr>
        <div class="row">


         <a href="<?= base_url('utama/cetak_detailorder/') ?><?= $kode ?>" target="_blank" class="btn btn-danger mb-3">Cetak Data<i class="fas fa-print"></i></a>

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
                <th>Total Harga</th>
                <th>Date</th>

              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              ?>
              <?php foreach ($order as $data) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode_penjualan'] ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?=  "Rp " . number_format($data['harga'],0,',','.') ?></td>
                  <td><?= $data['qty'] ?></td>
                  <td><?= $data['satuan'] ?></td>
                  <td><?=  "Rp " . number_format($data['total_harga'],0,',','.') ?></td>
                  <td><?= $data['date'] ?></td>
                  


                <?php } ?>
              </tbody>
              <tfoot>
                <tr style="background: orange">
                 <th colspan="3" style="text-align:center;"><?= $no-1 ?> Order</th>
                 <th><?=  "Rp " . number_format($total['harga'],0,',','.') ?></th>
                 <th colspan="2" style="text-align: center;"><?= $total['qty'] ?> QTY</th>

                 <th colspan="3">Total Harga : <?=  "Rp " . number_format($total['total_harga'],0,',','.') ?> </th>

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








