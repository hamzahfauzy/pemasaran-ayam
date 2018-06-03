<?php
use libs\ArrayHelper;
use libs\Html;
?>

<div class="container">
	<div class="panel">
		<div class="panel-body">
		<h2>CRUD Generator</h2>

		<?php
		$arr = json_decode(json_encode($dbname->showtable()), true);
		$map = ArrayHelper::map($arr,["","Tables_in_".DBNAME]);
		echo Html::formbegin(["method"=>"post"]);
		echo "<label>Select Table : </label>";
		echo Html::comboBox([
							"id"=>"tbl",
							"name"=>"table",
							"value"=>$map,
							"class"=>"form-control"
							]);
		echo "<label>Controller Name : </label>";
		echo Html::text(0,0,[
						"id"=>"controllerName",
						"name"=>"controllerName",
						"class"=>"form-control"
						]);
		echo "<p></p>";
		echo Html::button(["class"=>"btn btn-success","label"=>"Generate"]);
		echo Html::formend();
		?>
		</div>
	</div>
</div>