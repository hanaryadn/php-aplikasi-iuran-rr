<?php 
	include ('koneksi.php');
	include ('cek_login.php');
 ?>
<h3>Selamat Datang <?php if (isset($_SESSION['admin'])) {
	echo "<u>Admin</u>";
} ?>
 !!!</h3>
<hr>
<h6>Ringkasan :</h6>
<div class="row">
	<div class="col-sm-6 mt-3">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<i class="glyphicon glyphicon-user"></i> Jumlah Anggota
			</div>
			<div class="card-body">
				<?php 
					$ambil = $koneksi->query('SELECT * FROM anggota');
					$jumlah = $ambil->num_rows;
				 ?>
				 <font color="red"><?php echo $jumlah; ?></font> Orang
			</div>
		</div>
		<p>
		<div class="card">
			<div class="card-header bg-dark text-white">
				<i class="glyphicon glyphicon-list-alt"></i> Sudah membayar Iuran
			</div>
			<div class="card-body">
				<?php 
					$ambil = $koneksi->query('SELECT * FROM iuran');
					$jumlah = $ambil->num_rows;
				 ?>
				 <font color="red"><?php echo $jumlah; ?></font> Orang
			</div>
		</div>

	</div>
	<div class="col-sm-6 mt-3">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<i class="glyphicon glyphicon-check"></i> Sudah lunas
			</div>
			<div class="card-body">
				<?php 
					$ambil_batas = $koneksi->query("SELECT * FROM batas");
					$batas = $ambil_batas->fetch_assoc();
					$lunas = $batas['jumlah_batas'];
					$ambil_iuran = $koneksi->query("SELECT * FROM iuran WHERE jumlah_iuran='$lunas'");
					$iuran = $ambil_iuran->num_rows;
				 ?>
				 <font color="red"><?php echo $iuran; ?></font> Orang				
			</div>
		</div>		
		<p>
		<div class="card">
			<div class="card-header bg-dark text-white">
				<i class="glyphicon glyphicon-usd"></i> Total Iuran
			</div>
			<div class="card-body">
				<?php 
					$semuaData = array();
					$ambil = $koneksi->query("SELECT * FROM iuran");
					while ($data = $ambil->fetch_assoc()) {
						$semuaData[] = $data;
					}
					$total = 0;
				 ?>
			 <?php foreach ($semuaData as $key => $value): ?>
				 	<?php $total+=$value['jumlah_iuran']; ?>
				 <?php endforeach; ?>
				
				Rp. <font color="red"><?php echo number_format($total); ?></font>
			</div>
		</div>		
	</div>
</div>