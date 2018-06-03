<div class="container konten">
	<?php include'adminMenu.php';?>
	<div class="col-md-8">
		<h2>Admin Session - Data Barang</h2>
		<br />
		<button onclick="location.href='<?php echo URL;?>/admin/tambahBarang'" class="btn btn-success">Tambah</button>
		<br />
		<br />
		<table width="100%" class="table table-bordered">
			<tr>
				<th>Thumbnail</th>
				<th>Nama Barang</th>
				<th>Stok Barang</th>
				<th>Harga Barang</th>
			</tr>
		<?php foreach ($model->data as $b) { ?>
			<tr>
				<td width="122">
					<?php
						if($b->thumbnail!=""){
					?>
						<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $b->thumbnail;?>" width="120" height="90">
					<?php }else{ ?> 
						<div style="width:120px;height: 90px; background: #eee"></div>
					<?php } ?>

				</td>
				<td>
					<?php echo $b->nama_barang;?>
					<br />
					<a href="<?php echo URL;?>/admin/editbarang?id=<?php echo $b->id_barang;?>">Edit</a>
					<a href="<?php echo URL;?>/admin/hapusbarang?id=<?php echo $b->id_barang;?>">Hapus</a>

				</td>
				<td><?php echo $b->stok_barang;?></td>
				<td><?php echo $b->harga_barang;?></td>
			</tr>
		<?php  }?>
		</table>
	</div>
</div>
