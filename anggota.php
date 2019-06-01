<?php 
	include ('koneksi.php');
	include ('cek_login.php');
 ?>
 	<h3>Daftar Anggota</h3>
 	<hr>

	<?php if (isset($_GET["aksi"])) { ?>	
		<?php if ($_GET["aksi"]=="tambah_iuran") { ?>
			<a href="index.php?halaman=iuran" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>	
			<div class="alert alert-warning mt-2">
				Silahkan Pilih Anggota yang akan membayar Iuran
			</div>	
		 	
		 	<table class="table table-bordered table-responsive-lg mt-3">
		 		<thead class="thead-dark">
		 			<tr>
		 				<th>#</th>
		 				<th>Nama</th>
		 				<th>Status Iuran</th>
		 				<th>Aksi</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php 
		 			$nomor = 1;
		 			$ambil = $koneksi->query("SELECT * FROM anggota ORDER BY id_anggota DESC"); 
		 		?>
		 		<?php while ($data = $ambil->fetch_assoc()) { ?>
		 			<tr>
		 				<td><?php echo $nomor; ?></td>
		 				<td><strong><?php echo $data['nama_anggota']; ?></strong></td>
		 				<td>
		 					<!-- cek jika sudah melakukan iuran -->
							<?php if ($data['status_iuran']!="Belum") { ?>
		 								<strong><font color="green">Sudah Membayar</font></strong>
		 					<?php }else{ ?>
		 								<strong><font color="red">Belum Membayar</font></strong>
		 					<?php } ?>
		 				</td>
		 				<td>
		 					<!-- cek jika sudah melakukan iuran -->
							<?php if ($data['status_iuran']=="Belum") { ?>
		 								<a href="index.php?halaman=setor&id=<?php echo $data['id_anggota']; ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-usd"></i> Setor</a>
		 					<?php } ?>
		 				</td>
		 			</tr>
		 			<?php $nomor++; ?>
		 		<?php } ?>
		 		</tbody>
		 	</table>
			<?php } ?>
	<?php }else{ ?>
		  	<a href="index.php?halaman=tambah_anggota" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
			<table class="table table-bordered mt-3">
		 		<thead class="thead-dark">
		 			<tr>
		 				<th>#</th>
		 				<th>Nama</th>
		 				<th>Aksi</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php 
		 			$nomor = 1;
		 			$ambil = $koneksi->query("SELECT * FROM anggota ORDER BY id_anggota DESC"); 
		 		?>
		 		<?php while ($data = $ambil->fetch_assoc()) { ?>
		 			<tr>
		 				<td><?php echo $nomor; ?></td>
		 				<td><strong><?php echo $data['nama_anggota']; ?></strong></td>
		 				<td>
		 					<a href="hapus_anggota.php?id=<?php echo $data['id_anggota'] ?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
		 				</td>
		 			</tr>
		 			<?php $nomor++; ?>
		 		<?php } ?>
		 		</tbody>
		 	</table>
 <?php } ?>