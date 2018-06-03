<div class="container konten">
	<?php include 'adminMenu.php';?>

	<div class="col-md-8" align="justify">
		<h2>Transaksi Pelanggan</h2>
		<hr />
		<?php 
		foreach($model->data as $tr){ 
			$barang->find()->where(["id_barang"=>$tr->id_barang])->one();
			$user->find()->where(["id_user"=>$tr->id_user])->one();
		?>		
		<div class="row">
		<div class="col-md-4"><br />
			<?php 
			if($tr->status_transaksi<2){
			?>
			<a href="<?php echo URL;?>/vendor/images/bukti/<?php echo $tr->bukti;?>" target="_blank">
				<img src="<?php echo URL;?>/vendor/images/bukti/<?php echo $tr->bukti;?>" width="200" height="140">
			<br />
			</a>
			Lihat Gambar
			<?php 
			}else{
			if($barang->thumbnail==""){
			?>
				<div style="width:200px; height:140px; background: #aaa"></div>
			<?php }else{ ?>
				<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $barang->thumbnail;?>" width="200" height="140">
			<?php } }?>
		</div>
		<div class="col-md-7">
		<h3><?php echo $barang->nama_barang;?></h3>
		<table width="100%">
			<tr>
				<td width="200">Nama Pelanggan</td>
				<td>:</td>
				<td><?php echo $user->nama_user;?></td>
			</tr>
			<tr>
				<td width="200">E-mail</td>
				<td>:</td>
				<td><?php echo $user->email;?></td>
			</tr>
			<tr>
				<td width="200">Jumlah Beli</td>
				<td>:</td>
				<td><?php echo $tr->jumlah_beli;?> Kilogram</td>
			</tr>
			<tr>
				<td width="200">Total Bayar</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($tr->total_bayar,2,",",".");?></td>
			</tr>
		</table>
		<br />
		<br />
		<?php
			if($tr->status_transaksi=="0"){
		?>
		<button class="btn btn-big btn-danger" onclick="location.href='<?php echo URL."/index/transaksipayment?id=".$tr->id_transaksi;?>'"><il class="fa fa-money"> Klik untuk lihat</il></button>
		<?php }elseif($tr->status_transaksi=="1"){ ?>
		<button class="btn btn-big btn-success" onclick="location.href='<?php echo URL."/admin/transaksiconfirm?id=".$tr->id_transaksi;?>'">Konfirmasi</button>
		<?php }?>
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
</div>
