<?php
namespace models;
use libs\Model;

class Transaksi_Model extends Model {
	static $table = "transaksi";
	static $lbl = ["id_transaksi","id_user","id_barang","jumlah_beli","total_bayar","status_transaksi","bukti","tanggal"];	
}