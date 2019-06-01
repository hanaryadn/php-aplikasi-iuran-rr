<?php 
	include ('koneksi.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/icon/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/icon.css">	
    <link rel="icon" type="image/png" sizes="16x16" href="assets/fav.png">
    <title>Aplikasi Iuran RR</title>
  </head>
  <body>

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
			<div class="container">
				  <a class="navbar-brand text-white font-weight-bold" id="navbrand" href="index.php"><i class="glyphicon glyphicon-fire"></i> AIRR</a>
				  <?php session_start(); ?>
				  <?php if (isset($_SESSION['admin'])): ?>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".sidebar-collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>					  
				  <?php endif; ?>
				  <div class="collapse navbar-collapse nav" id="navbarNav">
					  <span class="navbar-text text-white">
					     Aplikasi Iuran RR
					  </span>		    
				  </div>
			</div>
		</nav>
		
		<!-- Menu  -->
			<!-- samping -->
		<aside class="sidebar sidebar-collapse pt-1">
				<?php if (!empty($_SESSION["admin"])): ?>
					<ul class="list-group mt-2 p-2 pt-2">
					  <li class="list-group-item bg-dark text-white"><i class="glyphicon glyphicon-th-list"></i> Menu</li>
					  <li class="list-group-item"> <i class="glyphicon glyphicon-home"></i> <a href="index.php"><font color="black">Beranda</font></a> </li>
					  <li class="list-group-item"> <i class="glyphicon glyphicon-user"></i> <a href="index.php?halaman=anggota"><font color="black">Anggota</font></a> </li>
					  <li class="list-group-item"> <i class="glyphicon glyphicon-book"></i> <a href="index.php?halaman=iuran"><font color="black">Data Iuran</font></a> </li>
					  <li class="list-group-item"> <i class="glyphicon glyphicon-log-out"></i> <a href="index.php?halaman=logout"><font color="red">Logout</font></a> </li>
					</ul>
				<?php endif; ?>
				<?php session_write_close(); ?>									
		</aside>		
		
		<!-- tengah -->
		<section class="content pt-1">
			<div class="col-md-10 p-2">
	 			<div class="inner">
	 				<!-- <div class="container-fluid"> -->
						<?php 
							if (isset($_GET["halaman"])) {
								if ($_GET["halaman"]=="home") {
									include 'home.php';
								}elseif ($_GET["halaman"]=="anggota") {
									include 'anggota.php';
								}elseif ($_GET["halaman"]=="iuran") {
									include 'iuran.php';
								}elseif ($_GET["halaman"]=="setor") {
									include 'setor.php';
								}elseif ($_GET["halaman"]=="logout") {
									include 'logout.php';
								}elseif ($_GET["halaman"]=="tambah_anggota") {
									include 'tambah_anggota.php';
								}elseif ($_GET["halaman"]=="tambah_setor") {
									include 'tambah_setor.php';
								}elseif ($_GET["halaman"]=="detail_setor") {
									include 'detail_setor.php';
								}elseif ($_GET["halaman"]=="batas") {
									include 'batas.php';
								}
							}else{
								include 'login.php';
							}
						 ?> 					
	 				</div>
	 			</div>
	 		</div>
		</section>

		<!-- Footer -->
		<footer class="page-footer font-small bg-dark pt-4 text-white">
	    	<!-- Copyright -->
		    <div class="container">	
		    	<div class="footer-copyright pb-4">
		    		© 2019 - AIRR by <strong>Hanary A.</strong>
		    	</div>
		    </div>
	    	<!-- Copyright -->
	  	</footer>
	  	<!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/mob.js"></script>
  </body>
</html>