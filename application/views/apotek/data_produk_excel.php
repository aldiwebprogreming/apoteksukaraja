<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Produuk</title>
</head>
<body>

	<table border="1" class="table2excel">
		<thead >
			<tr class="noExl">
				<th>No</th>
				<th>Nama Produk</th>
				<th>QTY</th>
				<th>Unit</th>
				<th>Harga Netto</th>
				<th>Diskon</th>
				<th>Harga Jual</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($produk as $data) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['nama_produk'] ?></td>
					<td><?= $data['qty'] ?></td>
					<td><?= $data['unit'] ?></td>
					<td><?= $data['harga_netto'] ?></td>
					<td><?= $data['diskon'] ?></td>
					<td><?= $data['harga_jual'] ?></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src=" <?= base_url('assets_admin/excel/') ?>jquery.table2excel.js"></script>

	<script>
		$(function() {
			$(".table2excel").table2excel({
				exclude: ".noExl",
				name: "Excel Document Name",
				filename: "Data Produk",
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});

			var url = "<?= base_url('utama/data_produk') ?>";

			window.location.href = url;

		});
	</script>

</body>
</html>