<?php 
	session_start();
	include ('koneksi.php');
	// jika sudah login
	if (isset($_SESSION['admin'])) {
		echo "<script>location='index.php?halaman=home';</script>";
	}
 ?>
 
 	<div class="row">
	 	<div class="col-sm-8 offset-sm-2">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<i class="oi oi-account-login"></i> Login
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group">
							<label for="username"><i class="glyphicon glyphicon-user"></i> Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username ...">
						</div>
						<div class="form-group">
							<label for="password"><i class="glyphicon glyphicon-lock"></i> Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password ...">
						</div>
						<div class="form-group">
							<button class="btn btn-dark" name="login"><i class="glyphicon glyphicon-ok-circle"></i> Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Proses Login -->
	<?php 
		if (isset($_POST['login'])) {
			// ambil dari form
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			// cek di tbl admin
			$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
			$cek = $ambil->num_rows;
			// cek jika ada
			if ($cek==1) {
				// pecah akun
				$akun = $ambil->fetch_assoc();
				// taruh ke session
				$_SESSION['admin'] = $akun;
				// alihkan ke
				echo "<script>location='index.php?halaman=home';</script>";
			}else{
				echo "<script>alert('Login Gagal');</script>";
			}
		}
	 ?>