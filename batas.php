<?php 
	include ('koneksi.php');
	include ('cek_login.php');
 ?>
 <h3>Atur Batas Iuran</h3>
 <hr>
 <div class="alert alert-warning">
 	Batas ini digunakan untuk menentukan Lunas atau tidaknya Iuran yang sudah dikeluarkan
 </div>
 <?php 
 	$ambil = $koneksi->query("SELECT * FROM batas");
 	$data = $ambil->fetch_assoc();
  ?>
  <form method="POST">
  	<div class="form-group col-sm-8">
	  	<label for="batas">Jumlah Batas (Rp.)</label>
	  	<input type="number" class="form-control" id="batas" name="batas" value="<?php echo $data['jumlah_batas']; ?>" placeholder="Masukkan Jumlah Batas Iuran (tanpa Rp.)">
	</div>
	<div class="form-group col-sm-8">
		<button class="btn btn-md btn-success" name="simpan"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
		<a href="index.php?halaman=iuran" class="btn btn-md btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
	</div>
  </form>
  <hr>
  <!-- Simpan batas iuran -->
  <?php 
  		if (isset($_POST['simpan'])) {
  			$batas = $_POST['batas'];
  			$koneksi->query("UPDATE batas SET jumlah_batas='$batas'");
  			echo "<script>alert('Batas Iuran disimpan');</script>";
  			echo "<script>location='index.php?halaman=iuran';</script>";
  		}


   ?>