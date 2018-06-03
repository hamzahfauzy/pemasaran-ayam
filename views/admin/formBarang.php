<div class="container konten">
	<?php include'adminMenu.php';?>
	<div class="col-md-5">
			<h3>Form Barang</h3><br />	
	<?php
		use libs\Html;
		echo Html::formbegin(["method"=>"post","enctype"=>"multipart/form-data"]);
		if(isset($id_barang)){
		echo Html::hidden($model,"id_barang",["class"=>"form-control"]);
		}
		echo Html::text($model,"nama_barang",["class"=>"form-control","placeholder"=>"Nama Barang"])."<br />";
		echo Html::textArea($model,"deskripsi_barang",["class"=>"form-control","placeholder"=>"Deskripsi"])."<br />";
		echo Html::text($model,"stok_barang",["class"=>"form-control","placeholder"=>"Stok Barang"])."<br />";
		echo Html::text($model,"harga_barang",["class"=>"form-control","placeholder"=>"Harga Barang"])."<br />";
		?>
		<input type="file" name="thumbnail" ><br />
		<?php
		echo Html::button(["label"=>"<i class='fa fa-save'></i> Selesai dan Simpan","class"=>"btn btn-success"]);
		echo Html::formend();
	?>
	<br />
	<br />

	</div>
</div>
