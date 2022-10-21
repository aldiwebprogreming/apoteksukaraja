<!DOCTYPE html>
<html><head>
	<title>Cetak Faktur</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		},

		td{
			/*	text-align: center;*/
		}
	</style>
</head><body>
	
	<?php 
	for ($i=0; $i < $count ; $i++) { 
		$kode_order = $order[$i];


		$this->db->where('kode_order', $order[$i]);
		$list = $this->db->get('tbl_order')->row_array();
		// var_dump($list);
		$order2 = $this->db->get_where('tbl_penjualan',['kode_penjualan' => $kode_order])->result_array();

		?>
		<div style="page-break-after: always;">
			<table border="0">
				<tr>
					<td><p>APOTEK SUKARAJA</p></td>
					<td width="300"><p style="text-align: center;">FAKTUR</p></td>
				</tr>

			</table>
			<br>

			<table border="0" style="margin-top: 10px;">
				<tr>
					<td width="112" style="font-weight: bold;">Faktur No</td>
					<td width="200" style="font-weight: bold;">: <?= $list['kode_order'] ?></td>
					<td width="" style="font-weight: bold;">Kepada Yth :</td>
				</tr>
				<tr>
					<td width="113" style="font-weight: bold;">Tanggal</td>
					<td width="300" style="font-weight: bold;">: <?= $list['date'] ?></td>
					<td width=""><?= $list['nama'] ?></td>
				</tr>
				<tr>
					<td width="113"></td>
					<td width="250"></td>
					<td width=""><p><?= $list['alamat'] ?></p></td>
				</tr>
			</table>

			<?php if ($list['nb'] == null) { ?>
			<?php }else{ ?>
				<table border="0">
					<tr>
						<td>NB. : <?= $list['nb'] ?> </td>

					</tr>
				</table>
			<?php } ?>

			<table style="text-align: center; margin-top:5px;">
				<tr>
					<th width="100">QTY</th>
					<th width="200">Keterangan</th>
					<th width="100">Harga @</th>
					<th width="100">Total</th>

				</tr>

				<?php foreach ($order2 as $data) {  ?>
					<tr>
						<td><?= $data['qty'];  ?> <!-- <?= $data['satuan'] ?> --></td>
						<td><?= $data['nama_barang'] ?></td>
						<td>Rp <?= $data['harga'] ?></td>
						<td>Rp <?= $data['total_harga'] ?></td>
					</tr>

				<?php } ?>
				<tr>
					<th width="100">Diterima Oleh</th>
					<th width="200">Hormat Kami</th>
					<th width="100">Total</th>
					<th width="100">Rp <?= $list['total_harga'] ?></th>

				</tr>

			</table>

			<table border="0" style="margin-top: 30px;">
				<tr>
					<th width="100">
						___________
					</th>
					<th width="200">
						___________
					</th>
					<th width="100"></th>
					<th width="100"></th>

				</tr>
			</table>

		</div>

	<?php } ?>
	

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body></html>