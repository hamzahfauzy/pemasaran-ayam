<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Login_Model;
use models\Barang_Model;

class Registrasi extends Controller {

	function __construct(){
		parent::__construct();
	}

	function actionIndex(){
		$this->view->title= "Registrasi";
		$model = new Login_Model();
		if($this->request("POST")){
			date_default_timezone_set("Asia/Jakarta");
			$model->attr($_POST);
			$model->hak_akses = "pelanggan";
			$model->tanggal = date("Y-m-d H:i:s");
			$model->password = md5($model->password);
			if($model->save()){
				$this->redirect("login");
			}

		}
		$this->view->render("index",1,["model"=>$model]);
	}

	function actionProfil(){
		Session::init();
		$ID = Session::get("ID");
		$this->view->title= "Profil";
		$model = new Login_Model();
		$sModel = new Barang_Model();
		$model->find()->where(["id_user"=>$ID])->one();
		$sModel->find()->execute();
		$this->view->render("profil",1,["model"=>$model,"sModel"=>$sModel]);
	}
	
	function actionEdit(){
		Session::init();
		$ID = Session::get("ID");
		date_default_timezone_set("Asia/Jakarta");
		$this->view->title= "Ubah Profil";
		$model = new Login_Model();
		if($this->request("POST")){
			$model->attr($_POST);
			$model->hak_akses = Session::get("Akses");
			$model->tanggal = date("Y-m-d H:i:s");
			$model->password = md5($model->password);
			if($model->save()){
				$this->redirect("registrasi/profil");
			}
		}
		$model->find()->where(["id_user"=>$ID])->one();
		$model->password = "";
		$this->view->render("index",1,["model"=>$model,"id_user"=>$ID]);
	}
	
}