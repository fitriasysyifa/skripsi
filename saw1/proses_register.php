<?php  
	
	require_once'function/koneksi.php';

	if (isset($_POST['register'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
		$query = mysqli_query($koneksi, $sql);

		header("location: login.php");
	}

?>