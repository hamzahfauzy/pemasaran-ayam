<div class="container konten">
	<?php include 'adminMenu.php';?>

	<div class="col-md-8" align="justify">
		<h2>Laporan Penjualan</h2>
		<hr />
		<table class="table table-bordered">
			<tr>
				<th>NO</th>
				<th>Nama Pelanggan</th>
				<th>E-mail</th>
				<th>Nama Barang</th>
				<th>Jumlah Beli</th>
				<th>Total Bayar</th>
				<th></th>
			</tr>
			<?php 
		$i=1;$total_penghasilan=0;$total_terbeli=0;
		foreach($model->data as $tr){ 
			$barang->find()->where(["id_barang"=>$tr->id_barang])->one();
			$user->find()->where(["id_user"=>$tr->id_user])->one();
		?>		
		<tr>
				<td width="20" align="center"><?php echo $i;$i++;?></td>
				<td><?php echo $user->nama_user;?></td>
				<td><?php echo $user->email;?></td>
				<td><?php echo $barang->nama_barang;?></td>
				<td align="center"><?php echo $tr->jumlah_beli;?> Kg</td>
				<td align="center">Rp. <?php echo number_format($tr->total_bayar,2,",",".");?></td>
				<td align="center"><a href="<?php echo URL."/index/transaksipayment?id=".$tr->id_transaksi;?>">Lihat</a></td>
			</tr>

		<?php
		$total_penghasilan += $tr->total_bayar; 
		$total_terbeli += $tr->jumlah_beli;
		 } ?>
		<tr>
			<td width="20" ></td>
			<td align="center" colspan="3"><b>Total</b></td>
			<td align="center"><?php echo $total_terbeli;?> KG</td>
			<td align="center">Rp. <?php echo number_format($total_penghasilan,2,",",".");?></td>
			<td></td>
		</tr>
		</table>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
</div>
