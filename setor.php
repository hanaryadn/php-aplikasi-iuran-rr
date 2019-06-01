<?php 
	include ('koneksi.php');
	include ('cek_login.php');
	$id = $_GET['id'];
 ?>

 	<?php 
 		$ambil = $koneksi->query("SELECT * FROM anggota WHERE id_anggota='$id'");
 		$data = $ambil->fetch_assoc();
 		$nama = $data['nama_anggota'];
 	?>
 	<h3>Input Iuran <font color="red"><?php echo $nama; ?></font></h3>
 	<hr>
 	<form method="POST">
 		<div class="form-group col-sm-8">
 			<label for="jumlah">Jumlah Setoran</label>
 			<input type="text" class="form-control" id="jumlah" name="jumlah_iuran" placeholder="Masukkan jumlah setoran (tanpa Rp.)">
 		</div>
 		<div class="form-group col-sm-8">
 			<button class="btn btn-md btn-success" name="simpan"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button> 
 			<a href="index.php?halaman=anggota" class="btn btn-md btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
 		</div>
 	</form>
 	<hr>
 	<!-- Proses simpan -->
 	<?php 
 		if (isset($_POST['simpan'])) {
 			// ambil data dari form
 			$jumlah_iuran = $_POST['jumlah_iuran'];
 			// simpan ke tbl iuran
 			$koneksi->query("INSERT INTO iuran (id_anggota, jumlah_iuran)
 								VALUES ('$id','$jumlah_iuran')");
 			// simpan ke tbl setor
 			$tanggal_setor = date("d-m-Y");
 	 		$koneksi->query("INSERT INTO setor (nama_penyetor, jumlah_setor, tanggal_setor)
 	 					VALUES ('$nama', '$jumlah_iuran', '$tanggal_setor')");
 			// update status iuran anggota
 			$status_iuran = "Sudah";
 			$koneksi->query("UPDATE anggota SET status_iuran='$status_iuran' WHERE id_anggota='$id'");
 			// alihkan
 			echo "<script>alert('Iuran berhasil disimpan');</script>";
 			echo "<script>location='index.php?halaman=iuran';</script>";
 		}
 	 ?>
