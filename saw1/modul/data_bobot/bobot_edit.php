<?php

require_once'../../function/koneksi.php';

$bobot_id = $_GET['bobot_id'];

$sql = "SELECT * FROM bobot WHERE bobot_id='$bobot_id'";
$querybobot = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($querybobot);

$nama_jurusan = $row['nama_jurusan'];
$nilai_raport_kelas = $row['nilai_raport_kelas'];
$psikotes = $row['psikotes'];
$angket_peminatan = $row['angket_peminatan'];
$tes_akademik = $row['tes_akademik'];

	if (isset($_POST['submit'])) {
	$nama_jurusan = $_POST['nama_jurusan'];
	$nilai_raport_kelas = $_POST['nilai_raport_kelas'];
	$psikotes = $_POST['psikotes'];
	$angket_peminatan = $_POST['angket_peminatan'];
	$tes_akademik = $_POST['tes_akademik'];

	$update = mysqli_query($koneksi, "UPDATE bobot SET 	nama_jurusan='$nama_jurusan',
														nilai_raport_kelas='$nilai_raport_kelas',
														psikotes='$psikotes',
														angket_peminatan='$angket_peminatan',
														tes_akademik='$tes_akademik'
														WHERE bobot_id='$bobot_id'");
	header("location: data.php");
}


require_once'../header.php';
?>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Data Bobot Nilai</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Bobot Nilai</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Jurusan</label>
                                                        <input name="nama_jurusan" type="text" class="form-control cc-cvc" value="<?= $nama_jurusan; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nilai Raport</label>
                                                        <input name="nilai_raport_kelas" type="text" class="form-control cc-cvc center" value="<?= $nilai_raport_kelas; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Psikotes</label>
                                                    <div class="input-group">
                                                        <input name="psikotes" type="text" class="form-control cc-cvc center" value="<?= $psikotes; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Angket Penilaian</label>
                                                        <input name="angket_peminatan" type="text" class="form-control cc-cvc center" value="<?= $angket_peminatan; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Akademik</label>
                                                    <div class="input-group">
                                                        <input name="tes_akademik" type="text" class="form-control cc-cvc center" value="<?= $tes_akademik; ?>">

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
