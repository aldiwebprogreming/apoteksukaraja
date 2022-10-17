<!DOCTYPE html>
<html><head>
  <title>Laporan Data Produk</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <!-- <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    },

    td{
      text-align: center;
    }
  </style> -->
</head><body>
  <h4 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Produk</h4>
  <br>
  <br>

  <center>
    <table style="width:80%;">
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Qty</th>
        <th>Unit</th>
        <th>Harga Notte</th>
        <th>Diskon</th>
        <th>Harga Jual</th>
      </tr>
      <?php $no = 1; ?>
      <?php foreach ($produk as $data) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data['nama_produk'] ?></td>
          <td><?= $data['qty'] ?></td>
          <td><?= $data['unit'] ?></td>
          <td><?= $data['harga_netto'] ?></td>
          <td><?= $data['diskon'] ?></td>
          <td><?= $data['harga_jual'] ?></td>
        </tr>
      <?php } ?>
    </table>
  </center>

  <div style="position: absolute;top: 95%">
    <hr>
    <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
    </p>
  </div>
</p>

</body></html>