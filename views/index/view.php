<div class="container konten">
	<div class="col-md-8" align="justify">
		<h2><?php echo $model2->nama_barang;?></h2>
		<hr />

		<div class="row">
			<div class="col-md-4">
			<?php 
			if($model2->thumbnail==""){
			?>
				<div style="width:200px; height:140px; background: #aaa"></div>
			<?php }else{ ?>
				<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $model2->thumbnail;?>" width="200" height="140">
			<?php } ?>

			</div>
			<div class="col-md-5" style="font-family: Roboto;">
				<label>Rp. <?php echo number_format($model2->harga_barang,2,",",".");?> / Kilo<br />
				Tersedia <?php echo $model2->stok_barang;?> Kilograms<br /></label>
				<br />
				<button onclick="location.href='<?php echo URL."/index/pesan?id=".$model2->id_barang;?>'" class="btn btn-warning"><li class="fa fa-shopping-cart"> Pesan Ayam</li></button>
			</div>
		</div>
		<br />
		<b>Deskripsi</b>
		<br />
		<?php echo $model2->deskripsi_barang;?>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
	<?php include 'sideBar.php';?>
</div>
