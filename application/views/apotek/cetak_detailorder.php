<!DOCTYPE html>
<html><head>
	<title>Laporan Detail</title>
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
	<h4 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Penjualan Dengan Kode Order <?= $kode ?></h4>
	<br>
	<br>

	<center>
		<table style="width:80%;">

			<tr>
				<th>No</th>
				<th>Kode Penjualan</th>
				<th>Nama Barang</th>
				<th>Harga Barang</th>
				<th>Qty</th>
				<th>Satuan</th>
				<th>Total Hargas</th>
				<th>Date</th>

			</tr>
			<?php 
			$no = 1;
			?>
			<?php 
			foreach ($penjualan_detail as $dat) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $dat['kode_penjualan'] ?></td>
					<td><?= $dat['nama_barang'] ?></td>
					<td><?= $dat['harga'] ?></td>
					<td><?= $dat['qty'] ?></td>
					<td><?= $dat['satuan'] ?></td>
					<td><?= $dat['total_harga'] ?></td>
					<td><?= $dat['date'] ?></td>
				</tr>

			<?php } ?>
			<tr>
				
				<th style="text-align:center;"><?= $no-1 ?> Order</th>
				<th>-</th>
				<th>-</th>
				<th><?=  "Rp " . number_format($total['harga'],0,',','.') ?></th>
				<th  style="text-align: center;"><?= $total['qty'] ?> QTY</th>

				<th colspan="3">Total Pemasukan : <?=  "Rp " . number_format($total['total_harga'],0,',','.') ?> </th>

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