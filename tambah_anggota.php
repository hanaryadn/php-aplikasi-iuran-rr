<?php 
	include ('koneksi.php');
	include ('cek_login.php');
 ?>
 
 	<h3>Tambah Anggota</h3>
 	<hr>
 	
 	<form method="POST">
 		<div class="form-group col-sm-8">
 			<label for="nama">Nama Anggota</label>
 			<input type="text" class="form-control" id="nama" name="nama_anggota" placeholder="Masukkan Nama Anggota">
 		</div>
 		<div class="form-group col-sm-8">
 			<button class="btn btn-md btn-success" name="simpan"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
 			<a href="index.php?halaman=anggota" class="btn btn-md btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
 		</div>
 	</form>
	<hr>
 	<!-- proses simpan -->
 	<?php 

 		if (isset($_POST['simpan'])) {
 			// ambil data dari form
 			$nama_anggota = $_POST['nama_anggota'];

 			// cek apa anggota sudah terdaftar
 			$ambil = $koneksi->query("SELECT * FROM anggota WHERE nama_anggota='$nama_anggota'");
 			$ada = $ambil->num_rows;
 			if ($ada==1) {
 				echo "<script>alert('Maaf Nama ini sudah terdaftar');</script>";
 			}else{
 				// simpan ke db anggota
 				$koneksi->query("INSERT INTO anggota (nama_anggota)
 							VALUES ('$nama_anggota')");
 				echo "<script>alert('Anggota ditambahkan');</script>";
 				echo "<script>location='index.php?halaman=anggota';</script>";
 			}
 	} ?>