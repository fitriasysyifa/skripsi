<?php 
	
	require_once'../../function/koneksi.php';
	
	$bobot_id = $_GET['bobot_id'];

	$delete = mysqli_query($koneksi, "DELETE FROM bobot WHERE bobot_id='$bobot_id'");
	if($delete){
		header("location: data.php");
	}
 ?>