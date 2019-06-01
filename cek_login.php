<?php 

	if (!isset($_SESSION['admin'])) {
		echo "<script>alert('Maaf anda tidak punya Akses');</script>";
		echo "<script>location='index.php';</script>";
	}

 ?>