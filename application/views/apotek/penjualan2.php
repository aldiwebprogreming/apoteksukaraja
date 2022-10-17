  


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <div class="container">

    <div class="card">
      <div class="card-body">
       <h3 style="font-weight: bold;">Penjualan <i class="fas fa-shopping-bag"></i></h3>
       <!--  <a href="<?= base_url('utama/cetak_penjualan') ?>" target="_blank" class="btn btn-danger">Cetak</a> -->
       <hr>
       <form method="post" action="<?= base_url('utama/add_penjualan') ?>">
         <div class="row">
          <div class="col-sm-4">
            <div class="row">

              <div class="col-sm-6">
                <?php 
                $kode = 'faktur-'.rand(0,10000);
                ?>

                <div class="form-group">
                  <label>Kode Penjualan</label>
                  <input type="text" class="form-control" name="kode" placeholder="" value="<?= $kode ?>">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <select class="form-control" name="pelanggan" id="pelanggan" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach ($pelanggan as $data) {  ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama_pelanggan'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                 <label>Tanggal</label>
                 <input type="date" class="form-control" name="tgl" placeholder="" value="<?= date('Y-m-d') ?>" required>
               </div>
             </div>

             <div class="col-sm-6">
              <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" name="alamat" id="alamat" required></textarea>
             </div>
           </div>

           <div class="col-sm-12">
            <div class="form-group">
             <label>NB</label>
             <input type="text" name="nb" maxlength="50" class="form-control">
             <small style="font-style: italic;">Tuliskan keterangan jika dibutuhkan</small>
           </div>
         </div>

       </div>
     </div>

     <div class="col-sm-8">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Itam</th>
            <th>Harga@</th>
            <th>Qty</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          ?>
          <?php for ($i=0; $i < $count ; $i++) {  ?>
            <tr>

              <td><?= $no++ ?></td>
              <td>
                <select class="form-control text-center" id="barang<?= $i ?>" name="barang[]">
                  <option value="">-- Pilih Produk --</option>
                  <?php foreach ($produk as $data) { ?>
                    <option value="<?= $data['id'] ?>"><?= $data['nama_produk'] ?></option>
                  <?php } ?>
                </select>
              </td>

              <td>
                <p id="harga<?= $i ?>" style="display: none;">Rp.0</p>
                <p id="harga2<?= $i ?>">Rp.0</p>
              </td>
              <td>
                <p><input type="number" name="qty[]" class="text-center" id="qty<?= $i ?>"></p>
              </td>
              <td>
                <p id="totalharga<?= $i ?>">Rp.0</p>
              </td>


            </tr>
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
            <script>
              $(document).ready(function(){

               $("#barang<?= $i ?>").change(function(){
                const val = $(this).val();
                const url = "<?= base_url('utama/get_harga?id=') ?>"+val;
                const url2 = "<?= base_url('utama/get_harga2?id=') ?>"+val;
                $("#harga<?= $i ?>").load(url);
                $("#harga2<?= $i ?>").load(url2);

                $("#qty<?= $i ?>").val('0');
                $("#totalharga<?= $i ?>").html('Rp.0');


              });

               $("#qty<?= $i ?>").keyup(function(){
                const qty = $(this).val();
                const harga = $("#harga<?= $i ?>").html();
                const total_harga = qty * harga;

                const numb = total_harga;
                const format = numb.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('');

                $("#totalharga<?= $i ?>").html(rupiah);

              });

             })
           </script>

           <script>
            $(document).ready(function(){





            })
          </script>


        <?php } ?>


      </tbody>
      <tfoot>
        <tr>
         <th>No</th>
         <th>Itam</th>
         <th>Harga@</th>
         <th>Qty</th>
         <th>Total Harga</th>

       </tr>
     </tfoot>
   </table>
   <button class="btn btn-primary btn-block mt-3">Cetak Faktur <i class="fas fa-file"></i></button>
 </div>

</div>



</form>

</div>
</div>

</div>
</div>







<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<script>
  $(document).ready(function(){
    $("#pelanggan").change(function(){
      var id = $(this).val();
      var url = "<?= base_url('utama/get_alamat?id=') ?>"+id;
      $("#alamat").load(url);
    })
  })
</script>








