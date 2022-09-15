


<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
  <!-- Content Header (Page header) -->

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3>Dashboard</h3>
        <div class="row">

          <div class="col-sm-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="nof"><?= $item2 ?></h3>

                <p>Data Item</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
              <!-- <a href="<?= base_url('utama/item') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="col-sm-4">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 id="nof"><?= $user ?><h3>

                  <p>Data User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-user"></i>
                </div>
                <!-- <a href="<?= base_url('utama/user') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->

              </div>
            </div>

            <div class="col-sm-4">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="nof"><?= $role ?></h3>

                  <p>Data Role</p>
                </div>
                <div class="icon">
                  <i class="ion ion-user"></i>
                </div>
                <!-- <a href="<?= base_url('utama/role') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>

          </div>
        </div>


        <div class="container">
          <div class="row">
            <div class="col-sm-6">
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode Item</th>
                  <th>Item</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($item as $data) { ?>
                  <tr>
                    <td><?= $data['kode_item'] ?></td>
                    <td><?= $data['nama_item'] ?></td>
                    <td><?= $data['stok'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['kode_item'] ?>">
                      Beli
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $data['kode_item'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-text="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content center">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <h3 class="text-primary"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h3>
                              Apakah Ingin membeli produk ini ?
                            </center>
                          </div>
                          <div class="modal-footer">
                            <form method="post" action="<?= base_url('utama/cart') ?>">
                              <input type="hidden" name="kode_item" value="<?= $data['kode_item'] ?>">
                              <input type="hidden" name="nama_item" value="<?= $data['nama_item'] ?>">
                              <input type="hidden" name="stok" value="<?= $data['stok'] ?>">
                              <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
                              <input type="hidden" name="qty" value="1">
                              <input type="hidden" name="unit" value="<?= $data['unit'] ?>">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Yess</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <!--  <p class="float-right">Invoice : </p> -->
              <h6 class="text-primary" style="font-weight: bold;">Keranjang</h6>

              <hr>
              <div class="row">
                <?php foreach ($cart as $data) { ?>
                  <div class="col-sm-6">
                    <p style="font-weight: bold;"><?= $data['id'] ?></p>
                  </div>
                  <div class="col-sm-6">
                    <p>Item  : <?= $data['name'] ?></p>
                    <p>Harga : <?= "Rp " . number_format($data['price'],0,',','.'); ?> / <?= $data['unit'] ?> </p>
                    <p>Qty : 
                      <select id="qty<?= $data['id'] ?>">
                        <option><?= $data['qty'] ?></option>
                        <?php for ($i=1; $i <= $data['stok'] ; $i++) { ?>
                          <option><?= $i ?></option>
                        <?php } ?>
                      </select>
                    </p>
                    <p>Sub total : <label id="subtotal<?= $data['id'] ?>"><?=  "Rp " . number_format($data['subtotal'],0,',','.'); ?></label></p>
                  </div>


                  <script>
                    $(document).ready(function(){
                      $("#qty<?= $data['id'] ?>").change(function(){
                        var id = "<?= $data['id'] ?>";
                        var rowid = "<?= $data['rowid'] ?>";
                        var val = $(this).val();
                        var url = "<?= base_url('utama/update_cart?rowid=') ?>"+rowid+"&qty="+val;
                        var url2 = "<?= base_url('utama/update_total?rowid=') ?>"+rowid+"&qty="+val;
                        var url3 = "<?= base_url('utama/update_totalbayar?rowid=') ?>"+rowid+"&qty="+val;
                        var url4 = "<?= base_url('utama/update_totalbayar2?rowid=') ?>"+rowid+"&qty="+val;
                      // alert(url);
                      $("#subtotal<?= $data['id'] ?>").load(url);
                      $("#total").load(url2);
                      $("#totalbayar").load(url3);
                      $("#totalbayar2").load(url4);
                      var totalbayar = $("#totalbayar2").html();
                      $("#totalbayar2").val(totalbayar);
                    })
                    })
                  </script>
                <?php } ?>

                <div class="col-sm-6">
                  <p style="font-weight: bold;">Total :</p>
                </div>

                <div class="col-sm-6">
                  <p style="font-weight: bold;" id="total"><?= "Rp " . number_format($total,0,',','.');  ?></p>
                </div>

                <div class="col-sm-6">
                  <p style="font-weight: bold;">PPN :</p>
                </div>

                <div class="col-sm-6">
                  <p style="font-weight: bold;" id="total">11%</p>
                </div>

                <div class="col-sm-6">
                  <p style="font-weight: bold;">Total Belanja :</p>
                </div>

                <?php 
                $tot = $total;
                $ppn = 11;
                $ret = $ppn / 100;
                $hasilret = $tot * $ret;
                $hasil = $tot + $hasilret;
                
                ?>
                
                <div class="col-sm-6">
                  <form method="post" action="<?= base_url('utama/bayar') ?>">
                    <p style="font-weight: bold;" id="totalbayar"><?= "Rp " . number_format($hasil,0,',','.'); ?></p>
                    <p style="font-weight: bold; display: none" id="totalbayar2"><?= $hasil ?></p>
                    <input type="hidden" name="totalbayar" class="totalbayar2" id="totalbayar2" value="<?= $hasil ?>">
                  </div>

                  <div class="col-sm-6">
                    <p> Uang anda</p>
                    <input type="number" class="form-control" id="uang" name="uang_anda" required="">
                  </div>


                  <div class="col-sm-6"> 
                    <p>Kembalian</p>
                    <input type="text" id="hasilkembalian" name="kembalian" class="form-control" value="" readonly="">
                  </div>

                  <button type="submit" class="btn btn-primary btn-block btn-sm mt-2">Bayar</button>

                </form>











              </div>
            </div>
          </div>
        </div>
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




<!-- Main Footer -->
<script src="http://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- kalender -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
  $(document).ready(function(){

    $("#uang").keyup(function(){
      var uang_anda = $(this).val();
      var totalbayar = $(".totalbayar2").val();
      var hasil = uang_anda - totalbayar;
      $("#hasilkembalian").val(hasil);
    })    

  })
</script>


