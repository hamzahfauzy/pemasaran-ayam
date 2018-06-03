<div class="container konten">
	<div class="col-md-8" align="justify">
		<h2>Transaksi Anda</h2>
		<hr />
		<?php 
		foreach($transaksi->data as $tr){ 
			$barang->find()->where(["id_barang"=>$tr->id_barang])->one();
		?>		
		<div class="row">
		<div class="col-md-4"><br />
			<?php 
			if($barang->thumbnail==""){
			?>
				<div style="width:200px; height:140px; background: #aaa"></div>
			<?php }else{ ?>
				<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $barang->thumbnail;?>" width="200" height="140">
			<?php } ?>
		</div>
		<div class="col-md-7">
		<h3><?php echo $barang->nama_barang;?></h3>
		<label style="color:#555;">Harga <i style="color:#444">Rp. <?php echo number_format($barang->harga_barang,2,",",".");?></i>/Kilogram</label>
		<br />
		<label style="color:#555;">Jumlah Yang Anda Beli <i style="color:#444"><?php echo $tr->jumlah_beli;?> Kilogram</i></label>
		<label style="color:#555;">Total Yang Harus dibayar <i style="color:#444">Rp. <?php echo number_format($tr->total_bayar,2,",",".");?></i></label>
		<br />
		<?php
			if($tr->status_transaksi=="0"){
		?>
		<button class="btn btn-big btn-success" onclick="location.href='<?php echo URL."/index/transaksipayment?id=".$tr->id_transaksi;?>'"><il class="fa fa-money"> Lunas, Klik untuk lihat</il></button>
		<?php }elseif($tr->status_transaksi=="1"){ ?>
		<button class="btn btn-big btn-success" disabled="disabled" onclick="location.href='<?php echo URL."/index/transaksipayment?id=".$tr->id_transaksi;?>'">Menunggu Konfirmasi . . .</button>
		<?php }elseif($tr->status_transaksi=="2"){ ?>
		<button class="btn btn-big btn-success" onclick="location.href='<?php echo URL."/index/transaksipayment?id=".$tr->id_transaksi;?>'"><il class="fa fa-money"> Lanjut ke pembayaran</il></button>
		<button class="btn btn-big btn-danger" onclick="location.href='<?php echo URL."/index/hapustransaksi?id=".$tr->id_transaksi;?>'">Batal</button>
		<?php } ?>
		</div>
		</div>
		<br />
		<br />
		<?php } ?>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
	<?php include 'sideBar.php';?>
</div>
