<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Login_Model;
use models\Barang_Model;
use models\Transaksi_Model;

class Admin extends Controller {

	function __construct(){
		parent::__construct();
	}

	function actionIndex(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$this->view->title = "Admin Session";
				Session::init();
				$this->view->render("index",1,["namaAdmin"=>Session::get("NamaUser")]);
			}
		}
	}
	function actionDataBarang(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$model = new Barang_Model;
				$this->view->title = "Admin Session - Data Barang";
				$model->find()->execute();
				$this->view->render("dataBarang",1,["model"=>$model,"namaAdmin"=>Session::get("NamaUser")]);
			}
		}
	}
	function actionDataUser(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$model = new Login_Model;
				$this->view->title = "Admin Session - Data Pelanggan";
				$model->find()->execute();
				$this->view->render("dataUser",1,["model"=>$model,"namaAdmin"=>Session::get("NamaUser")]);
			}
		}
	}

	function actionTambahBarang(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$this->view->title= "Tambahkan Data Barang";
				$model = new Barang_Model();
				if($this->request("POST")){
					$image = $_FILES['thumbnail']['name'];
					$tmp = $_FILES['thumbnail']['tmp_name'];
					$type = $_FILES['thumbnail']['type'];
					$destination = "vendor/images/upload/".$image;
					move_uploaded_file($tmp, $destination);
					$model->attr($_POST);		
					$model->thumbnail = $image;	
					if($model->save()){
						$this->redirect("admin/databarang");
					}

				}else{
					$this->view->render("formBarang",1,["model"=>$model]);
				}
			}
		}
	}
	function actionEditBarang($id){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$this->view->title= "Ubah Data Barang";
				$model = new Barang_Model();
				if($this->request("POST")){
					$image = $_FILES['thumbnail']['name'];
					$tmp = $_FILES['thumbnail']['tmp_name'];
					$type = $_FILES['thumbnail']['type'];
					$destination = "vendor/images/upload/".$image;
					move_uploaded_file($tmp, $destination);
					$model->attr($_POST);		
					$model->thumbnail = $image;	
					if($model->save()){
						$this->redirect("admin/databarang");
					}

				}
				$model->find()->where(["id_barang"=>$id])->one();
				$this->view->render("formBarang",1,["model"=>$model,"id_barang"=>$id]);	
			}
		}
	}
	function actionHapusBarang($id){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$this->view->title= "Menghapus Data Barang";
				$model = new Barang_Model();
				if(isset($id)){
					if($model->delete(["id_barang"=>$id])){
						$this->redirect("admin/databarang");
					}
				}
			}
		}
	}
	function actionHapusUser($id){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$this->view->title= "Menghapus Data User";
				$model = new Login_Model();
				if(isset($id)){
					if($model->delete(["id_user"=>$id])){
						$this->redirect("admin/datauser");
					}
				}
			}
		}
	}
	function actionTransaksi(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$model = new Transaksi_Model;
				$model2 = new Barang_Model;
				$model3 = new Login_Model;
				$this->view->title = "Admin Session - Transaksi";
				$model->find()->execute();
				$this->view->render("transaksi",1,["model"=>$model,"barang"=>$model2,"user"=>$model3]);
			}
		}
	}
	function actionLaporan(){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$model = new Transaksi_Model;
				$model2 = new Barang_Model;
				$model3 = new Login_Model;
				$this->view->title = "Admin Session - Laporan";
				$model->find()->where(["status_transaksi"=>0])->execute();
				$this->view->render("laporan",1,["model"=>$model,"barang"=>$model2,"user"=>$model3]);
			}
		}
	}
	function actionTransaksiconfirm($id){
		Session::init();
		$aKses = Session::get("Akses");
		if(isset($aKses)){
			if($aKses=="Admin"){				
				$m = new Barang_Model;
				$m2 = new Barang_Model;
				$model = new Transaksi_Model;
				$model2 = new Transaksi_Model;
				$this->view->title = "Admin Session - Transaksi";
				$model->find()->where(["id_transaksi"=>$id])->one();
				$m->find()->where(["id_barang"=>$model->id_barang])->one();
				$model2 = $model;
				$model2->status_transaksi = 0;
				$m2 = $m;
				$m2->stok_barang = $m->stok_barang-$model->jumlah_beli;
				if($model2->save()){
					$m2->save();
					$this->redirect("admin/transaksi");
				}
			}
		}
	}

}
