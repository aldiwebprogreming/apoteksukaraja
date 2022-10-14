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
	<h4 style="font-weight:bold; margin-bottom: 10px;">Laporang Data Barang <?= $tgl ?></h4>
	<br>
	<br>

	<center>
		<table style="width:80%;">

			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Kode Barang</th>
				<th>Harga</th>
				<th>Satuan</th>
				<th>Stok</th>
				<th>Keterangan</th>
				<th>Date Create</th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($barang as $data) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['kode_barang'] ?></td>
					<td><?= $data['nama_barang'] ?></td>
					<td> <?= "Rp " . number_format($data['harga'] ,0,',','.'); ?></td>
					<td><?= $data['satuan'] ?></td>
					<td><?= $data['stok'] ?></td>
					<td><?= $data['keterangan'] ?></td>
					<td><?= $data['date'] ?></td>
				</tr>
			<?php } ?>
			<tr>
				<th colspan="3"><?= $no - 1  ?> Jenis Barang</th>
				<th><?=  "Rp " . number_format($total['harga'],0,',','.') ?></th>
				<th>-</th>
				<th><?= $total['stok'] ?></th>
				<th>-</th>
				<th>-</th>
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