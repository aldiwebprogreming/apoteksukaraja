<!DOCTYPE html>
<html><head>
	<title>Laporan Data Order</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		},

		td{
			text-align: center;
		}
	</style>
</head><body>
	<h4 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Order <?= $tgl ?></h4>
	<br>
	<br>

	<center>
		<table style="width:80%;">

			<tr>
				<th>No</th>
				<th>Kode Order</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Qty</th>
				<th>Total Harga</th>
				<th>NB</th>
				<th>Date</th>

			</tr>
			<?php 
			$no = 1;
			?>
			<?php foreach ($order as $data) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['kode_order'] ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['alamat'] ?></td>
					<td><?= $data['qty_barang'] ?></td>
					<td><?=  "Rp " . number_format($data['total_harga'],0,',','.') ?></td>
					<td><?= $data['nb'] ?></td>
					<td><?= $data['date'] ?></td>
				</tr>
			<?php } ?>
			<tr>
				
				<th colspan="4" style="text-align:center;"><?= $no-1 ?> Order</th>
				<th colspan="1" style="text-align: center;"><?= $total['qty_barang'] ?> QTY</th>
				<th><?=  "Rp " . number_format($total['total_harga'],0,',','.') ?></th>
				<th colspan="2">Total Pemasukan : <?=  "Rp " . number_format($total['total_harga'],0,',','.') ?> </th>



			</tr>
			
		</table>
	</center>

	<div style="position: absolute;top: 95%">
		<hr >
		<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
		</p>
	</div>
</p>





</body></html>