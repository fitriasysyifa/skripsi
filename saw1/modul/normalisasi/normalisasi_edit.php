<?php

require_once'../../function/koneksi.php';

$normalisasi_id = $_GET['normalisasi_id'];


//Query Penilaian
$sql = "SELECT * FROM normalisasi WHERE normalisasi_id='$normalisasi_id'";
$queryNormalisasi = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($queryNormalisasi);

$nilai_raport = $row['nilai_raport'];
$tes_psikotes = $row['tes_psikotes'];
$angket_peminatan = $row['angket_peminatan'];
$tes_akademik = $row['tes_akademik'];
$nis = $row['nis'];
$nama_lengkap = $row['nama_lengkap'];
$nama_jurusan = $row['nama_jurusan'];

$sql = "SELECT  max(nilai_raport) as max1, 
                max(tes_psikotes) as max2, 
                max(angket_peminatan) as max3, 
                max(tes_akademik) as max4 FROM penilaian";

$queryPenilaian = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($queryPenilaian);

$max_nilai_raport = $row['max1'];
$max_tes_psikotes = $row['max2'];
$max_angket_peminatan = $row['max3'];
$max_tes_akademik = $row['max4'];


// Query Bobot
$sqlBobot = "SELECT * FROM bobot";
$queryBobot = mysqli_query($koneksi, $sqlBobot);
$rowBobot = mysqli_fetch_assoc($queryBobot);

$bobot_nilai_raport = $rowBobot['nilai_raport_kelas'];
$bobot_psikotes = $rowBobot['psikotes'];
$bobot_angket_peminatan = $rowBobot['angket_peminatan'];
$bobot_tes_akademik = $rowBobot['tes_akademik'];

//Nilai Penilaian Siswa


	if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$kode_jurusan = $_POST['kode_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];

	$update = mysqli_query($koneksi, "UPDATE normalisasi SET nis='$nis',
														nama_lengkap='$nama_lengkap',
														kode_jurusan='$kode_jurusan',
														nama_jurusan='$nama_jurusan'
														 WHERE normalisasi_id='$normalisasi_id'");
	header("location: daftar_normalisasi.php");
}

require_once'../header.php';
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Normalisasi</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Perhitungan Normalisasi</h3>
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
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Kode Jurusan</label>
                                                        <select name="kode_jurusan" class="form-control">
															<option disable selection>Pilih</option>
												          <?php 
												            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
												            while($rowJurusan = mysqli_fetch_assoc($queryJurusan)){
												          ?> 
												            <option value="<?php echo $rowJurusan['kode_jurusan']; ?>" ><?php echo $rowJurusan['kode_jurusan']; ?></option>
												          <?php } ?>
												      	</select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Lengkap</label>
                                                        <input name="nama_lengkap" type="text" class="form-control cc-exp" value="<?= $nama_lengkap; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Nama Jurusan</label>
                                                    <div class="input-group">
                                                        <input name="nama_jurusan" type="text" class="form-control cc-cvc" value="<?= $nama_jurusan; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <p>** Keterangan</p>
                                            <P>C1 = Nilai Raport, C2 = Nilai Tes Psikotes, C3 = Angket Peminatan, C4 = Nilai Tes Akademik</P>
                                            <hr>
                                          	<div class="row">
	                                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header">C1</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text"value="<?= $bobot_nilai_raport; ?>" class="form-control" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" value="<?= $nilai_raport; ?>" class="form-control" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c1" value="<?= $nilai_raport; ?>" class="form-control" readonly>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header">C2</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="" class="form-control" value="<?= $bobot_psikotes; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" name="" class="form-control" value="<?= $tes_psikotes; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c2" class="form-control" value="<?= $tes_psikotes; ?>" readonly>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header">C3</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="" class="form-control" value="<?= $bobot_angket_peminatan; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" name="" class="form-control" value="<?= $angket_peminatan; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c3" class="form-control"  value="<?= $angket_peminatan; ?>" readonly>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header">C4</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="" class="form-control" value="<?= $bobot_tes_akademik; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text"  name="" class="form-control" value="<?= $tes_akademik; ?>" readonly>
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c4" class="form-control" value="<?= $tes_akademik; ?>" readonly>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
				                            </div>
                                            <div>
                                                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    Update
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
