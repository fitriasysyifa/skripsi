<?php 
	
	require_once'../../function/koneksi.php';
	
	$normalisasi_id = $_GET['normalisasi_id'];

	$delete = mysqli_query($koneksi, "DELETE FROM normalisasi WHERE normalisasi_id='$normalisasi_id'");
	if($delete){
		header("location: daftar_normalisasi.php");
	}
 ?>