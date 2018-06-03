<div class="container konten">
	<?php include'adminMenu.php';?>
	<div class="col-md-8">
		<h2>Admin Session - Data User</h2>
		<br />
		<br />
		<table width="100%" class="table table-bordered">
			<tr>
				<th></th>
				<th>Nama Barang</th>
				<th>Stok Barang</th>
				<th>Harga Barang</th>
			</tr>
		<?php $a=1;foreach ($model->data as $b) { 	?>
			<tr>
				<td>
					<?php echo $a;$a++;?>
				</td>
				<td>
					<?php echo $b->nama_user;?>
					<br />
					<a href="<?php echo URL;?>/admin/hapususer?id=<?php echo $b->id_user;?>">Hapus</a>
				</td>
				<td>
					<?php echo $b->email;?>
				</td>
				<td>
					<?php echo $b->hak_akses;?>
				</td>
			</tr>
		<?php } ?>
		</table>
		
	</div>
</div>
