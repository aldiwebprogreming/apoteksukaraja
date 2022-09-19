<!DOCTYPE html>
<html><head>
	<title>Laporan Data Penjualan</title>
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
		<h2 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Penjualan</h2>
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
					</tr>
				<?php } ?>
			</table>
		</center>

		<div style="position: absolute;top: 95%">
			<hr >
			<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
			</p>
		</div>
	</p>





</body></html>