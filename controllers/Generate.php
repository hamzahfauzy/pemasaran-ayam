<?php
namespace controllers;
use libs\Controller;
use libs\Model;

class Generate extends Controller {
	
	function __construct(){
		parent::__construct();
		$this->view->title = "CRUD Generator";
	}
	
	function actionIndex(){
		if($_SERVER['SERVER_ADDR'] == "::1" || $_SERVER['SERVER_ADDR'] == "127.0.0.1"){
			$dbname = new Model();
			if($this->request("POST")){
				$table = $dbname->showfield($_POST['table']);
				$label = "";
				$tableNo = 0;
				$PK = "";
				foreach($table as $values){
					if($tableNo == 0)
						$PK = "'".$values->Field."'";
					if($tableNo < count($table)-1)
						$label .= '"'.$values->Field.'",';
					else
						$label .= '"'.$values->Field.'"';
					$tableNo++;
				}
				
				$getsamplecontroller = file_get_contents("controllers/Sample.txt");
				$getsamplecontroller = str_replace("{Sample}",$_POST['controllerName'],$getsamplecontroller);
				$getsamplecontroller = str_replace("{PK}",$PK,$getsamplecontroller);
				
				$getsamplemodel = file_get_contents("models/Sample_Model.txt");
				$getsamplemodel = str_replace("{Sample}",$_POST['controllerName'],$getsamplemodel);
				$getsamplemodel = str_replace("{table}",$_POST['table'],$getsamplemodel);
				$getsamplemodel = str_replace("{label}",$label,$getsamplemodel);
				
				$getcreateview = file_get_contents("views/generate/create.txt");
				$geteditview = file_get_contents("views/generate/edit.txt");
				$getformview = file_get_contents("views/generate/form.txt");
				$getindexview = file_get_contents("views/generate/index.txt");
				$getview = file_get_contents("views/generate/view.txt");
				
				$getcreateview = str_replace("{Sample}",$_POST['controllerName'],$getcreateview);
				$geteditview = str_replace("{Sample}",$_POST['controllerName'],$geteditview);
				$getformview = str_replace("{Sample}",$_POST['controllerName'],$getformview);
				$getindexview = str_replace("{Sample}",$_POST['controllerName'],$getindexview);
				$getview = str_replace("{Sample}",$_POST['controllerName'],$getview);
				
				mkdir("views/".strtolower($_POST['controllerName']));
				
				file_put_contents("controllers/".$_POST['controllerName'].".php",$getsamplecontroller);
				file_put_contents("models/".$_POST['controllerName']."_Model.php",$getsamplemodel);
				file_put_contents("views/".strtolower($_POST['controllerName'])."/create.php",$getcreateview);
				file_put_contents("views/".strtolower($_POST['controllerName'])."/edit.php",$geteditview);
				file_put_contents("views/".strtolower($_POST['controllerName'])."/form.php",$getformview);
				file_put_contents("views/".strtolower($_POST['controllerName'])."/index.php",$getindexview);
				file_put_contents("views/".strtolower($_POST['controllerName'])."/view.php",$getview);
				
				$this->redirect("generate");
			}
			$this->view->render("index",1,["dbname"=>$dbname]);
		}else{
			$this->error();
		}
	}
	
}

