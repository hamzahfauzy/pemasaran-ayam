<?php
namespace controllers;
use libs\Session;
use libs\Controller;
use models\Login_Model;

class Login extends Controller {

	function __construct(){
		parent::__construct();
	}

	function actionIndex(){
		$this->view->title = "Login";
		$model = new Login_Model();
		if($this->request("POST")){
			$model->attr($_POST);
			$model->password = md5($model->password);
			$model->find()->where(["username"=>$model->username,"password"=>$model->password])->one();
			if($model->length>=1){
				Session::init();
				Session::set("ID",$model->id_user);
				Session::set("NamaUser",$model->nama_user);
				Session::set("Username",$model->username);
				Session::set("Password",$model->password);
				Session::set("Email",$model->email);
				Session::set("Akses",$model->hak_akses);
				$this->redirect("");
			}else{	
				?>
					<script>
						alert("Username atau Password Anda Salah, Ulangi !");
						location.href='<?php echo URL."/login";?>';
					</script>
				<?php
			}

		}else{
			$this->view->render("index",1,["model"=>$model]);
		}
	}
	function actionOut(){
		Session::init();
		Session::destroy();
		$this->redirect("");
	}
	
}