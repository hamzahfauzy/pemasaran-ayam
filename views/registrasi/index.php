<div class="container">
	<center>
	<div style="max-width: 400px; width:100%;" class="konten">
			<div class="panel-body" align="left">
				<h3>
				<?php if(isset($id_user)){echo "Ubah Profil";}else{echo "Registrasi Pengguna";}?>
				</h3>
				<br />	
				<?php
					use libs\Html;
					echo Html::formbegin(["method"=>"post"]);
					if(isset($id_user)){
					echo Html::hidden($model,"id_user",["class"=>"form-control"]);
					}
					echo Html::text($model,"nama_user",["class"=>"form-control","placeholder"=>"Nama Lengkap"])."<br />";
					echo Html::text($model,"email",["class"=>"form-control","placeholder"=>"E-Mail"])."<br />";
					echo Html::text($model,"username",["class"=>"form-control","placeholder"=>"Username"])."<br />";
					echo Html::password($model,"password",["class"=>"form-control","placeholder"=>"Password"])."<br />";
					echo Html::button(["label"=>"<i class='fa fa-save'></i> Selesai","class"=>"btn btn-success"]);
					echo Html::formend();
				?>
			</div>
	</div>	
	</center>
</div>
