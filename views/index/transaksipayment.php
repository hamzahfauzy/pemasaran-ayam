<?php 
$barang->find()->where(["id_barang"=>$transaksi->id_barang])->one();
?>		
<div class="container konten">
	<div class="col-md-8" align="justify">
		<hr />
		<?php
			if($transaksi->status_transaksi=="0"){
		?>
		<div class="alert alert-success">
			<label>Lunas</label><br />
		</div>

		<?php }else{ ?>

		<div class="alert alert-danger">
			<label>Untuk pembayaran Via Transfer Bank </label><br />
			BRI : XXX XXX XX XX XX<br />
			BNI : XXX XXX XX XX XX<br />
			Mandiri : XXX XXX XX XX XX<br />
		</div>
		<div class="alert alert-warning">
			Setelah itu anda harus mengirim bukti pembayaran anda dengan Upload di form dibawah ini !
		</div>
		<?php } ?>

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
		<table width="100%">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $user->nama_user;?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>:</td>
				<td><?php echo $user->email;?></td>
			</tr>
			<tr>
				<td>Pesanan</td>
				<td>:</td>
				<td><b><?php echo $barang->nama_barang;?></b></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($barang->harga_barang,2,",",".");?></td>
			</tr>
			<tr>
				<td>Jumlah beli</td>
				<td>:</td>
				<td><?php echo $transaksi->jumlah_beli;?> Kilogram</td>
			</tr>
		</table><br />
		<label style="color:#555;">Total Yang Harus dibayar <i style="color:#444">Rp. <?php echo number_format($transaksi->total_bayar,2,",",".");?></i></label>
		<br />
		<br />
		<?php
			if($transaksi->status_transaksi=="0"){
		?>
		<a href="#">Lunas</a><br />
		<img src="<?php echo URL."/vendor/images/bukti/".$transaksi->bukti;?>" width="300">

		<?php }elseif($transaksi->status_transaksi=="1"){ ?>
		<?php }elseif($transaksi->status_transaksi=="2"){ ?>

		<label>Silahkan Upload Bukti Pembayaran Anda !</label>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="bukti" required="required"><br />
			<button class="btn btn-big btn-danger"><il class="fa fa-upload"> Upload</il></button>
		</form>	
		<?php } ?>
		</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
	<?php include 'sideBar.php';?>
</div>
