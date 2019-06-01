<?php 

	include ('koneksi.php');
	include ('cek_login.php');
	$nama_penyetor = $_GET['nama'];

 ?>

 	<h3>Detail Setoran <font color="red"><?php echo $nama_penyetor; ?></font></h3>
 	<hr>
	<a href="index.php?halaman=iuran" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
 	 <table class="table table-bordered table-responsive-lg mt-3">
 	 	<thead class="thead-dark">
 	 		<tr>
 	 			<th>#</th>
 	 			<th>Jumlah Setoran</th>
 	 			<th>Tanggal Setor</th>
 	 		</tr>
 	 	</thead>
 	 	<tbody>
	 	<?php 
	 		$nomor = 1;
	 		$ambil = $koneksi->query("SELECT * FROM setor WHERE nama_penyetor='$nama_penyetor' ORDER BY id_setor DESC");
	 	 ?> 	 		
 	 	<?php while ($data = $ambil->fetch_assoc()) { ?>
 	 		<tr>
 	 			<td><?php echo $nomor; ?></td>
 	 			<td>Rp. <?php echo number_format($data['jumlah_setor']); ?></td>
 	 			<td><?php echo $data['tanggal_setor']; ?></td>
 	 		</tr>
 	 	<?php $nomor++; ?>
 	 	<?php } ?>
 	 	</tbody>
 	 </table>