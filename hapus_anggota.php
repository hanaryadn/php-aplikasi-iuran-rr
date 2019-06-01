<?php 
	
	include ('koneksi.php');
	
	$id = $_GET[id];

	$ambil = $koneksi->query("SELECT * FROM anggota WHERE id_anggota='$id'");
	$data = $ambil->fetch_assoc();
	$nama = $data['nama_anggota'];

	// hapus
	$koneksi->query("DELETE FROM anggota WHERE id_anggota='$id'");
	$koneksi->query("DELETE FROM iuran WHERE id_anggota='$id'");
	$koneksi->query("DELETE FROM setor WHERE nama_penyetor='$nama'");
	echo "<script>alert('Anggota dan Iurannya Berhasil dihapus');</script>";
	echo "<script>location='index.php?halaman=anggota';</script>";
	
 ?>