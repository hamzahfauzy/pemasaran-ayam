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
		<div class="col-md-4">
			<label>Stok Saat ini <br /><i style="color:#444"><?php echo $model2->stok_barang;?> Kilogram</i></label><br /><br />
			<label>Harga/Kilogram <br /><i style="color:#444">Rp. <?php echo number_format($model2->harga_barang,2,",",".");?></i></label>
		</div>
		<div class="col-md-3">
		<?php
			use libs\Html;
			echo Html::formbegin(["method"=>"post"]);
			?>
			<label>Jumlah Beli</label><br />
			<select class="form-control" name="jumlah_beli">
				<?php for($i=1;$i<=$model2->stok_barang;$i++){?>
				<option value="<?php echo $i;?>"><?php echo $i;?> Kg</option>
				<?php } ?>
			</select><br />
			<?php
			echo Html::button(["label"=>"<i class='fa fa-shopping-cart'></i> Lanjut","class"=>"btn btn-success"]);
			echo Html::formend();
		?>
		</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
	<?php include 'sideBar.php';?>
</div>
