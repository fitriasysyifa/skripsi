<?php 
	
	require_once'../../function/koneksi.php';
	
	$jurusan_id = $_GET['jurusan_id'];

	$delete = mysqli_query($koneksi, "DELETE FROM jurusan WHERE jurusan_id='$jurusan_id'");
	if($delete){
		header("location: daftar_jurusan.php");
	}
 ?>