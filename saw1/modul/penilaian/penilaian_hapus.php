<?php 
	
	require_once'../../function/koneksi.php';
	
	$penilaian_id = $_GET['penilaian_id'];

	$delete = mysqli_query($koneksi, "DELETE FROM penilaian WHERE penilaian_id='$penilaian_id'");
	if($delete){
		header("location: data_penilaian.php");
	}
 ?>