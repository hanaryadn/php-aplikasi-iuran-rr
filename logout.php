<?php 
	session_start();
	// hapus session 
	session_destroy();
	// alihkan
	echo "<script>location='index.php';</script>";

 ?>