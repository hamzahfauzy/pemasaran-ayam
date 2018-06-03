<div class="container">
	<center>
	<div style="max-width: 400px; width:100%;" class="konten">
			<div class="panel-body" align="left">
				<h3>Login</h3>	
				<?php
					use libs\Html;
					echo Html::formbegin(["method"=>"post"]);
					echo Html::text($model,"username",["class"=>"form-control","placeholder"=>"Username"])."<br />";
					echo Html::password($model,"password",["class"=>"form-control","placeholder"=>"Password"])."<br />";
					echo Html::button(["label"=>"<i class='fa fa-save'></i> Simpan","class"=>"btn btn-success"]);
					echo Html::formend();
				?>
				<br />
				<a href="<?php echo URL;?>/registrasi">Registrasi?</a>
			</div>
	</div>	
	</center>
</div>
