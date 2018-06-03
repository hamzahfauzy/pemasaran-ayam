<div class="container konten">
	<div class="col-md-8">
		<h2>Selamat Datang Di Penjualan Ayam</h2>
		<div class="row">
		<?php foreach ($model->data as $b) { ?>
		<a href="<?php echo URL;?>/index/view?id=<?php echo $b->id_barang;?>" style="color:#444;text-decoration: none">
		<div class="col-md-6" style="padding-top: 8px; padding-bottom:8px;">
		<table>
			<tr>
				<td width="90" valign="top">
				<?php
					if($b->thumbnail!=""){
				?>
					<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $b->thumbnail;?>" width="80" height="60">
				<?php }else{ ?> 
					<div style="width:80px;height: 60px; background: #eee"></div>
				<?php } ?>
				</td>
				<td align="justify">
					 <h4 style="padding:0; margin: 0;"><?php echo $b->nama_barang;?></h4>
					 <i style="color:#888; font-size: 12px;"><?php echo substr($b->deskripsi_barang, 0,40);?></i>
				</td>
			</tr>
		</table>
			
		</div>
		</a>
		<?php } ?>
		</div>
	</div>
	<?php include 'sideBar.php';?>
</div>
