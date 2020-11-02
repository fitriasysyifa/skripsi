<?php

require_once'../../function/koneksi.php';

if (isset($_POST['submit'])) {
	$kode_jurusan = $_POST['kode_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];

	$sql = "INSERT INTO jurusan(kode_jurusan, nama_jurusan) VALUES('$kode_jurusan', '$nama_jurusan')";
	$query = mysqli_query($koneksi, $sql);

	header("location: daftar_jurusan.php");
}

require_once'../header.php';
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        	<div class="col-md-2"></div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">Data Jurusan</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Input Jurusan</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Kode Jurusan</label>
                                                        <input name="kode_jurusan" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Nama Jurusan</label>
                                                    <div class="input-group">
                                                        <input name="nama_jurusan" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php require_once'../footer.html'; ?>