<?php

require_once'../../function/koneksi.php';

$penilaian_id = $_GET['penilaian_id'];

$sql = "SELECT * FROM penilaian WHERE penilaian_id='$penilaian_id'";
$querypenilaian = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($querypenilaian);

$nis = $row['nis'];
$nama_lengkap = $row['nama_lengkap'];
$nama_jurusan = $row['nama_jurusan'];
$nilai_raport = $row['nilai_raport'];
$tes_psikotes = $row['tes_psikotes'];
$angket_peminatan = $row['angket_peminatan'];
$tes_akademik = $row['tes_akademik'];

	if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$kode_jurusan = $_POST['kode_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];
	$nilai_raport = $_POST['nilai_raport'];
	$tes_psikotes = $_POST['tes_psikotes'];
	$angket_peminatan = $_POST['angket_peminatan'];
	$tes_akademik = $_POST['tes_akademik'];

       if ($angket_peminatan == "IPA") {
        $angket_peminatan = 3;
        }else if($angket_peminatan == "IPS"){
            $angket_peminatan = 3;
        }

	$update = mysqli_query($koneksi, "UPDATE penilaian SET 	nis='$nis',
															nama_lengkap='$nama_lengkap',
															nama_jurusan='$nama_jurusan',
															nilai_raport='$nilai_raport',
															tes_psikotes='$tes_psikotes',
															angket_peminatan='$angket_peminatan',
															tes_akademik='$tes_akademik' WHERE penilaian_id='$penilaian_id'");
	header("location: data_penilaian.php");
}

require_once'../header.php';
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Data Penilaian</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Penilaian</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">NIS</label>
                                                        <input name="nis" type="text" class="form-control cc-exp" value="<?= $nis; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Nilai Raport</label>
                                                    <div class="input-group">
                                                        <input name="nilai_raport" type="text" class="form-control cc-cvc" value="<?= $nilai_raport; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Lengkap</label>
                                                        <input name="nama_lengkap" type="text" class="form-control cc-exp" value="<?= $nama_lengkap; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Psikotes</label>
                                                    <div class="input-group">
                                                        <input name="tes_psikotes" type="text" class="form-control cc-cvc " value="<?= $tes_psikotes; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Jurusan</label>
                                                        <select name="nama_jurusan" class="form-control">
                                                            <option disable selection>Pilih</option>
                                                          <?php 
                                                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                            while($row = mysqli_fetch_assoc($query)){
                                                          ?> 
                                                            <option value="<?php echo $row['nama_jurusan']; ?>" ><?php echo $row['nama_jurusan']; ?></option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Angket Peminatan</label>
                                                    <div class="input-group">
                                                        <select name="angket_peminatan" class="form-control">
                                                            <option disable selection>Pilih</option>
                                                          <?php 
                                                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                            while($row = mysqli_fetch_assoc($query)){
                                                          ?> 
                                                            <option value="<?php echo $row['nama_jurusan']; ?>" ><?php echo $row['nama_jurusan']; ?></option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Akademik</label>
                                                    <div class="input-group">
                                                        <input name="tes_akademik" type="text" class="form-control cc-cvc" value="<?= $tes_akademik; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
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
