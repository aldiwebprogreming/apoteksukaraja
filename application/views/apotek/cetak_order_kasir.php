<!DOCTYPE html>
<html><head>
	<title>Bukti Order</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			},

			/*s*/
		</style>
	</head><body>
		<center>

			<p style="font-size: 10px;"><strong>APOTEK SUKARAJA</strong> <br>Jl. Brigjend Katamso No.82c, Sukaraja, Kec. Medan Maimun, Kota Medan, Sumatera Utara 20212 <br>
				<strong>Telp : 0614519955</strong></p>
				<label style="font-weight:bold">----------------------------------------------------</label>

				<table style="font-size: 11px;" border="0">
					<tr>
						<td>Tgl</td>
						<td>:</td>
						<td><?= date('d/m/Y') ?></td>
					</tr>
					<tr>
						<td>Nomor</td>
						<td>:</td>
						<td><?= $this->session->kode ?></td>
					</tr>
					<center>
						<label>------------------------------------------------------------------------------</label>
					</center>
				</table>
				<table style="font-size: 10px;" border="0">
					<tr style="font-weight:bold;">
						<td widtd="100">Item</td>
						<td widtd="30">Harga</td>
						<td widtd="50">Harga Total</td>
					</tr>
					<?php foreach ($list as $data) { ?>


						<tr >
							<td width="100"><?= $data['nama_barang'] ?> ( <?= $data['qty'] ?> qty )</td>
							<td width="30"><?= $data['harga'] ?></td>
							<td width="50"><?=  "Rp " . number_format($data['harga_total'],0,',','.'); ?></td>
						</tr>
					<?php } ?>
				</table>
				<label style="font-weight:bold">----------------------------------------------------</label>
				<table border="0" style="font-size:10px;">
					<tr>
						<td width="100"><b>TOTAL :</b></td>
						<td colspan="2" style="font-weight:bold"><?=  "Rp " . number_format($total['harga_total'],0,',','.'); ?></td>

					</tr>

					<tr>
						<td width="100"><b>TUNAI :</b></td>
						<td colspan="2" style="font-weight:bold"><?=  "Rp " . number_format($kembalian['tunai'],0,',','.'); ?></td>
					</tr>
					<tr>
						<td width="100"><b>KEMBALIAN :</b></td>
						<td colspan="2" style="font-weight:bold"><?=  "Rp " . number_format($kembalian['kembalian'],0,',','.'); ?></td>
					</tr>



				</table>

				<div style="position: absolute;top: 85%">

					<h5>TERIMA KASIH SUDAH BERBELANJA DI APOTEK SUKARAJA</h5>
				</div>



			</body></html>