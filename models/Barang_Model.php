<?php
namespace models;
use libs\Model;

class Barang_Model extends Model {
	static $table = "barang";
	static $lbl = ["id_barang","nama_barang","deskripsi_barang","stok_barang","harga_barang","thumbnail"];	
}