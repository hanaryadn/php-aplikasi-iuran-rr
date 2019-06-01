<?php 
	include ('koneksi.php');
	include ('cek_login.php');
 ?>
 
 	<h3>Iuran Anggota</h3>
 	<hr>
 	<a href="index.php?halaman=anggota&aksi=tambah_iuran" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Input Iuran</a>
 	<a href="index.php?halaman=batas" class="btn btn-sm btn-info text-white"><i class="glyphicon glyphicon-usd"></i> Atur Batas Iuran</a><p>
	<div class="alert alert-info">
		<?php 
			$ambil = $koneksi->query("SELECT * FROM batas");
			$batas = $ambil->fetch_assoc();
		?>
		Batas Iuran : <strong>Rp. <?php echo number_format($batas['jumlah_batas']); ?></strong>
	</div>
	
	<table class="table table-bordered table-responsive-lg mt-3">
		<tr>
			<thead class="thead-dark">
				<th>#</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Status</th>
				<th>Aksi</th>
			</thead>
		</tr>
			<tbody>
				<?php
					$nomor = 1;
					$ambil_batas = $koneksi->query("SELECT * FROM batas");
					$pecah_batas = $ambil_batas->fetch_assoc(); 
					$ambil = $koneksi->query("SELECT * FROM iuran 
												JOIN anggota
												ON iuran.id_anggota=anggota.id_anggota
												ORDER BY id_iuran DESC");
				?>
				<?php while ($data = $ambil->fetch_assoc()) { ?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $data['nama_anggota']; ?></td>
					<td>Rp. <?php echo number_format($data['jumlah_iuran']); ?></td>
					<td>
					<?php if ($data['jumlah_iuran'] >= $pecah_batas['jumlah_batas']) {
						echo "<font color='green'><strong>Lunas</strong></font>";
					}else{
						echo "<font color='red'><strong>Belum Lunas</strong></font>";
					}?>
						
					</td>
					<td>
						<?php if ($data['jumlah_iuran'] != $pecah_batas['jumlah_batas']): ?>
							<a href="index.php?halaman=tambah_setor&id=<?php echo $data['id_anggota']; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-usd"></i> Setor</a>
						<?php endif; ?>
							<a href="index.php?halaman=detail_setor&nama=<?php echo $data['nama_anggota']; ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-th-list"></i> Detail</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		    <tfoot>
		        <tr>
		            <th colspan="2">Total</th>
		            <th colspan="3">
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
		            </th>
		        </tr>
		    </tfoot>			
	</table>