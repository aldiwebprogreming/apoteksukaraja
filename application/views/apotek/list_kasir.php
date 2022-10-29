
<div>
	<div class="row">
		<table class="table">
			<caption>List of users</caption>
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Produk</th>
					<th scope="col">Qty</th>
					<th scope="col">Total Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($list as $list2) {  ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $list2['nama_barang'] ?></td>
						<td><?= $list2['qty'] ?></td>
						<td><?= "Rp " . number_format($list2['harga_total'],0,',','.');  ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<hr>
		<h5>Total Harga :  <?= "Rp " . number_format($total['harga_total'],0,',','.'); ?> </h5>
		<hr>
		<a href="<?= base_url('utama/cetak_bukti_kasir?kode=') ?><?= $kode ?>" class="btn btn-success btn-block">Cetak Bukti</a>
	</div>
</div>