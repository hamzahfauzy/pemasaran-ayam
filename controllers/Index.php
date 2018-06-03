<?php
namespace controllers;
use libs\Session;
use libs\Controller;
use models\Barang_Model;
use models\Transaksi_Model;
use models\Login_Model;

class Index extends Controller {

	function __construct(){
		parent::__construct();
	}

	function actionIndex(){
		$model = new Barang_Model();
		$model->find()->execute();
		$this->view->title = "Penjualan Ayam";
		return $this->view->render("index",1,["model"=>$model]);
	}
	function actionView($id){
		$model = new Barang_Model();
		$model->find()->execute();
		$model2 = new Barang_Model();
		$model2->find()->where(["id_barang"=>$id])->one();
		$this->view->title = $model2->nama_barang;
		return $this->view->render("view",1,["model"=>$model,"model2"=>$model2]);
	}
	function actionPesan($id){
		Session::init();
		$model = new Barang_Model();
		$model->find()->execute();
		$model2 = new Barang_Model();
		$model3 = new Transaksi_Model();
		date_default_timezone_set("Asia/Jakarta");
		if($this->request("POST")){
			$model2->find()->where(["id_barang"=>$id])->one();
			$model3->attr($_POST);
			$model3->id_user = Session::get("ID");
			$model3->id_barang = $id;
			$model3->total_bayar = $model3->jumlah_beli*$model2->harga_barang;
			$model3->status_transaksi = 2;
			$model3->bukti = "";
			$model3->tanggal = date("Y-m-d H:i:s");
			if($model3->save()){
				$this->redirect("index/transaksi");
			}
		}

		$model2->find()->where(["id_barang"=>$id])->one();
		$this->view->title = $model2->nama_barang;
		return $this->view->render("formpesan",1,["model"=>$model,"model2"=>$model2]);
	}
	function actionTransaksi(){
		Session::init();
		$id_user = Session::get("ID");
		$model = new Barang_Model();
		$model3 = new Barang_Model();
		$model = $model->find()->execute();
		$model2 = new Transaksi_Model();
		$model2->find()->where(["id_user"=>$id_user])->execute();
		$this->view->title = "Transaksi";
		return $this->view->render("transaksi",1,["model"=>$model,"transaksi"=>$model2,"barang"=>$model3]);
	}
	function actionTransaksiPayment($id){
		Session::init();
		$id_user = Session::get("ID");
		$user = new Login_Model();
		$model = new Barang_Model();
		$model3 = new Barang_Model();
		if(isset($_FILES['bukti']['name'])){
			$model4 = new Transaksi_Model();
			$model5 = new Transaksi_Model();
			$name = $_FILES['bukti']['name'];
			$tmp = $_FILES['bukti']['tmp_name'];
			$type = $_FILES['bukti']['type'];
			$destination = "vendor/images/bukti/".$name;
			move_uploaded_file($tmp, $destination);
			$model4->find()->where(["id_transaksi"=>$id])->one();
			$model5->id_transaksi = $model4->id_transaksi;
			$model5->id_user = $model4->id_user;
			$model5->id_barang = $model4->id_barang;
			$model5->jumlah_beli = $model4->jumlah_beli;
			$model5->total_bayar = $model4->total_bayar;
			$model5->status_transaksi = 1;
			$model5->bukti = $name;
			$model5->tanggal = $model4->tanggal;
			if($model5->save()){
				$this->redirect("index/transaksi");
			}
		}else{
			$model = $model->find()->execute();
			$model2 = new Transaksi_Model();
			$model2->find()->where(["id_transaksi"=>$id])->one();
			$user->find()->where(["id_user"=>$model2->id_user])->one();
			$this->view->title = "Transaksi";
			return $this->view->render("transaksipayment",1,["model"=>$model,"transaksi"=>$model2,"barang"=>$model3,"user"=>$user]);			
		}
	}
	function actionHapusTransaksi($id){
		Session::init();
		$model = new Transaksi_Model();
		if(isset($id)){
			if($model->delete(["id_transaksi"=>$id])){
				$this->redirect("index/transaksi");
			}
		}
		$this->view->title = "Hapus Transaksi";
	}

}