<!DOCTYPE html>
<html><head>
	<title>Laporan Data Barang</title>
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
	<h4 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Pelanggan</h4>
	<br>
	<br>

	<center>
		<table style="width:80%;">

			<tr>
				<th>No</th>
				<th>Kode Pelanggan</th>
				<th>Nama Pelanggan</th>
				<th>Alamat</th>
				<th>Date</th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($pelanggan as $data) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['kode_pelanggan'] ?></td>
					<td><?= $data['nama_pelanggan'] ?></td>
					<td><?= $data['alamat'] ?></td>
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