<?php
namespace models;
use libs\Model;

class Login_Model extends Model {
	static $table = "user_profile";
	static $lbl = ["id_user","nama_user","username","password","email","hak_akses","tanggal"];	
}