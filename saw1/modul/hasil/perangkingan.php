<?php

require_once'../../function/koneksi.php';

$normalisasi_id = $_GET['normalisasi_id'];


//Query Tabel Analisa Normalisasi
$sqlNormalisasi = "SELECT * FROM normalisasi WHERE normalisasi_id='$normalisasi_id'";
$queryNormalisasi = mysqli_query($koneksi, $sqlNormalisasi);
$rowNormalisasi = mysqli_fetch_assoc($queryNormalisasi);

$nis = $rowNormalisasi['nis'];
$nama_lengkap = $rowNormalisasi['nama_lengkap'];
$kode_jurusan = $rowNormalisasi['kode_jurusan'];
$nama_jurusan = $rowNormalisasi['nama_jurusan'];

$r1 = $rowNormalisasi['nilai_raport'];
$r2 = $rowNormalisasi['tes_psikotes'];
$r3 = $rowNormalisasi['angket_peminatan'];
$r4 = $rowNormalisasi['tes_akademik'];

//Query Tabel Bobot
$sqlBobot = "SELECT * FROM bobot";
$queryBobot = mysqli_query($koneksi, $sqlBobot);
$rowBobot = mysqli_fetch_assoc($queryBobot);

$w1 = $rowBobot['nilai_raport_kelas'];
$w2 = $rowBobot['psikotes'];
$w3 = $rowBobot['angket_peminatan'];
$w4 = $rowBobot['tes_akademik'];

if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$kode_jurusan = $_POST['kode_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];
	$hasil = $_POST['hasil'];
	$ketentuan = $_POST['ketentuan'];

	$sqlHasil = "INSERT INTO hasil(nis, nama_siswa, kode_jurusan, nama_jurusan, hasil, ketentuan) VALUES('$nis', '$nama_lengkap', '$kode_jurusan', '$nama_jurusan', '$hasil', '$ketentuan')";
	$queryHasil = mysqli_query($koneksi, $sqlHasil);

	header("location: daftar_ketentuan.php");

}

?>

<?php require_once'../header.php'; ?>

 	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Data Ketentuan</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Perhitungan Akhir / Ketentuan</h3>
                                        </div>
                                        <hr>
                                        <?php  

											$v = ($w1*$r1) + ($w2*$r2) + ($w3*$r3) + ($w4*$r4);

											if ($v <= 9) {
												$ketentuan = "Masuk IPS";
												$kode_jurusan = "IPS";
												$nama_jurusan = "IPS";
											}else if ($v >= 9){
												$ketentuan = "MASUK IPA";
												$nama_jurusan = "IPA";
												$kode_jurusan = "IPA";
											}


										?>
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
                                                    <select name="nama_jurusan" class="form-control">
															<option disable selection>Pilih</option>
												          <?php 
												            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
												            while($rowJurusan = mysqli_fetch_assoc($queryJurusan)){
												          ?> 
												            <option value="<?php echo $rowJurusan['nama_jurusan']; ?>" ><?php echo $rowJurusan['nama_jurusan']; ?></option>
												          <?php } ?>
												      	</select>
                                                </div>
                                            </div>
                                            <hr>
                                            <p>** Keterangan</p>
                                            <P>R = MATRIX dari hasil Normalisasi penilaian</P>
                                            <p>W = Nilai bobot mata pelajaran</p>
                                            <hr>
                                          	<div class="row">
	                                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header center">R</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="" class="form-control center" value="<?= $r1; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="" class="form-control center" value="<?= $r2; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="hasil_analisis_c2" class="form-control center" value="<?= $r3; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="hasil_analisis_c2" class="form-control center" value="<?= $r4; ?>">
					                                            </div>
					                                        </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header center">W</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="" class="form-control center" value="<?= $w1; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="" class="form-control center" value="<?= $w2; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="hasil_analisis_c2" class="form-control center" value="<?= $w3; ?>">&nbsp;&nbsp;&nbsp;
					                                                <input type="text" name="hasil_analisis_c2" class="form-control center" value="<?= $w4; ?>">
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header center">Hasil Penilaian</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="hasil" class="form-control center" value="<?= $v; ?>">
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-lg-6">
					                                <div class="card">
					                                    <div class="card-header center">Hasil Akhir / Ketentuan</div>
					                                    <div class="card-body card-block">
					                                        <div class="form-group">
					                                            <div class="input-group col-12">
					                                                <input type="text" name="ketentuan" class="form-control center" value="<?= $ketentuan; ?>">
					                                            </div>
					                                        </div>
					                                    </div>
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