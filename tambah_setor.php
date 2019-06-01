<?php 
	include ('koneksi.php');
	include ('cek_login.php');
	$id = $_GET['id'];
 ?>

 	<?php 
			$ambil = $koneksi->query("SELECT * FROM anggota WHERE id_anggota='$id'");
			$data  = $ambil->fetch_assoc();
 	 ?>
 	 <h3>Setor Iuran <font color="red"><?php echo $data['nama_anggota']; ?></font></h3>
 	 <hr>
	 
 	 <form method="POST" class="mt-3">
 	 	<div class="form-group">
 	 		<label for="jumlah">Jumlah Setoran</label>
 	 		<input type="number" class="form-control" name="jumlah_setoran" id="jumlah" placeholder="Masukkan Jumlah Setoran (tanpa Rp.)">
 	 	</div>
		<div class="form-group">
			<button class="btn btn-md btn-success" name="setor"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
			<a href="index.php?halaman=iuran" class="btn btn-md btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
 	 </form>
	<hr>
 	 <!-- Fungsi Simpan Iuran -->
 	 <?php if (isset($_POST['setor'])) {
 	 	// ambil jumlah setoran dari form
 	 	$jumlah_setoran = $_POST['jumlah_setoran'];
 	 	
 	 	// insert ke db iuran
 	 	$koneksi->query("UPDATE iuran SET jumlah_iuran=jumlah_iuran+$jumlah_setoran
 	 					WHERE id_anggota=$id");

 	 	// insert ke db setor
 	 	$tanggal_setor = date("d-m-Y");
 	 	$nama_penyetor = $data['nama_anggota'];
 	 	$koneksi->query("INSERT INTO setor (nama_penyetor, jumlah_setor, tanggal_setor)
 	 					VALUES ('$nama_penyetor', '$jumlah_setoran', '$tanggal_setor')");

 	 	// 
 	 	echo "<script>alert('Setoran Berhasil');</script>";
 	 	echo "<script>location='index.php?halaman=iuran';</script>";
 	 } ?>