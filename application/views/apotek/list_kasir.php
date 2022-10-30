
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
					<th scope="col">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($list as $list2) {  ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $list2['nama_barang'] ?></td>
						<td><?= $list2['qty'] ?></td>
						<td>
							<?= "Rp " . number_format($list2['harga_total'],0,',','.');  ?>
							
						</td>
						<td><button class="btn btn-danger btn-sm" id="hapus<?= $list2['id'] ?>"><i class="fas fa-trash"></i></button></td>
					</tr>
					<script>
						$(document).ready(function(){
							$("#hapus<?= $list2['id'] ?>").click(function(){

								var id = "<?= $list2['id'] ?>";
								url = "<?= base_url('utama/hapus_kasir?id=') ?>"+id;
								$("#tampil-cart").load(url);
							})
							
						})
					</script>
				<?php } ?>
			</tbody>
		</table>
		<hr>
		<h5>Total Harga :  <?= "Rp " . number_format($total['harga_total'],0,',','.'); ?> </h5>
		<hr>

	</div>
</div>

<div>
	<div class="form-group">
		<label class="label">Tunai</label>
		<input type="text" name="tunai" id="tunai" class="form-control">
	</div>
	<div class="form-group">
		<label class="label">Kembalian</label>
		<input type="text" name="kembalian" id="kembalian" class="form-control">
	</div>
</div>

<a href="<?= base_url('utama/cetak_bukti_kasir?kode=') ?><?= $kode ?>" class="btn btn-success btn-block" id="cetak">Cetak Bukti</a>

<script>
	$(document).ready(function(){

		$("#tunai").keyup(function(){
			const tunai = $(this).val();
			const hargatotal =  "<?= $total['harga_total'] ?>";
			const kembalian = tunai - hargatotal;
			$("#kembalian").val(kembalian);

		})

	})
</script>