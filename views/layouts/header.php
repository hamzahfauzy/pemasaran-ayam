<?php 
use libs\Session;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$this->title;?></title>
<link href="<?php echo URL;?>/vendor/bootstrap/style.css" type="text/css" rel="stylesheet">

<?php
foreach($this->vendor as $key => $val){
	if($key == "css"){
		foreach($val as $value){
			echo "<link href='$value' type='text/css' rel='stylesheet'>\n";
		}
	}
}
?>
<?php
foreach($this->vendor as $key => $val){
	if($key == "js"){
		foreach($val as $value){
			echo "<script src='$value'></script>\n";
		}
	}
}
?>
<style>
body, html {
    height: 100%;
    background: #efefef;

    /* Full height */

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.transparent {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background:rgba(255,255,255,0.5);
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
}
</style>
</head>
<body>

<div style="padding-top: 70px;"></div>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#FFF;"><?=SITENAME;?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a title="Halaman Utama" href="<?php echo URL;?>/"><il class="fa fa-home"></il></a></li>
        <?php
        Session::init();
        $Password = Session::get("Password");
        $Akses = Session::get("Akses");
        if(isset($Password)){
          if($Akses=="Admin"){
            echo "<li><a href='".URL."/admin'>Admin Session</a></li>";  
          }
          echo "<li><a title='Transaksi' href='".URL."/index/transaksi'><il class='fa fa-shopping-cart'></il></a></li>";
          echo "<li><a title='Profil Saya' href='".URL."/registrasi/profil'><il class='fa fa-user'></il></a></li>";
          echo "<li><a title='Keluar' href='".URL."/login/out'><il class='fa fa-sign-out'></il></a></li>";
        }else{
          echo "<li><a href='".URL."/login'>Login</a></li>";
        }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="container">
      <div class="col-md-12">
        <img src="<?php echo URL;?>/vendor/images/header.jpeg" width="100%">
      </div>
  </div>
  <br />
  <br />
