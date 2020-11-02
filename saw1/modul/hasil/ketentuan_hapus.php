<?php 
	
	require_once'../../function/koneksi.php';
	
	$hasil_id = $_GET['hasil_id'];

	$delete = mysqli_query($koneksi, "DELETE FROM hasil WHERE hasil_id='$hasil_id'");
	if($delete){
		header("location: daftar_ketentuan.php");
	}
 ?>