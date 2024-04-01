<?php
session_start();
require '../config/functions.php';

$list_product = query("SELECT * FROM product ORDER BY id_product DESC");
$list_category= query("SELECT * FROM category ORDER BY id_category Desc ");
$list_merek= query("SELECT * FROM merek ORDER BY id_merek Desc");
$list_ukuran= query("SELECT * FROM ukuran ORDER BY id_ukuran Desc");
$list_warna= query("SELECT * FROM warna ORDER BY id_warna Desc");
$list_pembayaran=query("SELECT * FROM pembayaran ORDER BY id_pembayaran Desc");
$list_outlet = query("SELECT * FROM tb_outlet ORDER BY id_outlet Desc");
$list_user = query("SELECT * FROM tb_login where id_user != '$_SESSION[id_user]' ");
if (!isset($_SESSION['username'])) {
	echo "<script>alert('Anda Harus Login!');</script>";
	header("Location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Halaman Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">
	<script src="../css/jquery-3.5.1.js"></script>

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Page-Level Plugin CSS - Tables -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../icon.png">
 <style> 
 .lihat{
	border: none;
 }
</style>
</head>

<body style="height: 52.4vw;">

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="beranda.php">Sport Mech</a>
			</div>
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">

				<li>
					<?php 

          if(isset($_SESSION['username'])){

            ?>
            
            <a class="element place-right">Selamat datang, <?php echo "$_SESSION[username]"; ?></a>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg" style="margin-right: 10px"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="fa fa-sign-out" style="padding-right: 10px"></i>Logout</a></li>
              </ul>
            </li>

            <?php
          }else{
            ?>
            <span class="element-divider"></span>
            <a href="login_form.php"><i class="fa fa-user" style="padding-right: 10px"></i>Login</a>
            <?php
          }
          ?>
				</li>
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="beranda.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
					</li>
					<li class="dropdown-header">Setup Konten</li>
					<li >
						<a href="category.php"><i class="fa fa-fw fa-grav"></i> Katagori</a>
					</li>
					<li >
						<a href="merek.php"><i class="fa fa-fw fa-glass"></i> Merek</a>
					</li>
					<li >
						<a href="warna.php"><i class="fa fa-fw fa-eercast"></i> Warna</a>
					</li>
					<li >
						<a href="ukuran.php"><i class="fa fa-fw fa-linode"></i> Ukuran</a>
					</li>
					<li >
						<a href="pesanan.php"><i class="fa fa-fw fa-cube"></i> Pesanan </a>
					</li>
                    <li class="dropdown-header">Setup Administrator</li>
                    <li>
                        <a href="admin.php"><i class="fa fa-user-circle fa-fw"></i>&nbsp;Admin</a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-address-book fa-fw"></i>&nbsp;User</a>
					</li>
					<li>
                        <a href="outlet.php"><i class="fa fa-building fa-fw"></i>&nbsp;Outlet</a>
                    </li>
                    <li class="dropdown-header">Setup Pembayaran</li>
                    <li>
                        <a href="pembayaran.php"><i class="fa fa-money fa-fw"></i>&nbsp;Pembayaran</a>
                    </li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
