	<div class="col-md-4">
		<h3 style="">PRODUK</h3>

		<?php 
		foreach ($sModel->data as $barang) {
		?>
		<a href="<?php echo URL;?>/index/view?id=<?php echo $barang->id_barang;?>" style="color:#444;text-decoration: none">
		<div style="padding-top: 8px; padding-bottom:8px;">
		<table>
			<tr>
				<td width="90" valign="top">
				<?php
					if($barang->thumbnail!=""){
				?>
					<img src="<?php echo URL;?>/vendor/images/upload/<?php echo $barang->thumbnail;?>" width="80" height="60">
				<?php }else{ ?> 
					<div style="width:80px;height: 60px; background: #eee"></div>
				<?php } ?>
				</td>
				<td align="justify">
					 <h5 style="padding:0; margin: 0;"><?php echo $barang->nama_barang;?></h5>
					 <i style="color:#888; font-size: 12px;"><?php echo substr($barang->deskripsi_barang, 0,80);?></i>
				</td>
			</tr>
		</table>
			
		</div>
		</a>
		<?php
		}
		?>
	</div>
