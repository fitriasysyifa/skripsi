<?php

require_once'../../function/koneksi.php';

$penilaian_id = $_GET['penilaian_id'];

//Query Jurusan
$sqlJurusan = "SELECT * FROM jurusan";
$queryJurusan = mysqli_query($koneksi, $sqlJurusan);
$rowJurusan = mysqli_fetch_assoc($queryJurusan);

$nama_jurusan = $rowJurusan['nama_jurusan'];

//Query Penilaian
$sqlPenelitian = "SELECT * FROM penilaian WHERE penilaian_id='$penilaian_id'";
$queryPenilaian = mysqli_query($koneksi, $sqlPenelitian);
$rows = mysqli_fetch_assoc($queryPenilaian);


$nis = $rows['nis'];
$nama_lengkap = $rows['nama_lengkap'];
$nilai_raport = $rows['nilai_raport'];
$tes_psikotes = $rows['tes_psikotes'];
$angket_peminatan = $rows['angket_peminatan'];
$tes_akademik = $rows['tes_akademik'];


$sql = "SELECT 	max(nilai_raport) as max1, 
				max(tes_psikotes) as max2, 
				max(angket_peminatan) as max3, 
				max(tes_akademik) as max4 FROM penilaian";

$queryPenilaian = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($queryPenilaian);

$max_nilai_raport = $row['max1'];
$max_tes_psikotes = $row['max2'];
$max_angket_peminatan = $row['max3'];
$max_tes_akademik = $row['max4'];


	if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$kode_jurusan = $_POST['kode_jurusan'];
	$nama_jurusan = $_POST['nama_jurusan'];
	$hasil_analisis_c1 = $_POST['hasil_analisis_c1'];
	$hasil_analisis_c2 = $_POST['hasil_analisis_c2'];
	$hasil_analisis_c3 = $_POST['hasil_analisis_c3'];
	$hasil_analisis_c4 = $_POST['hasil_analisis_c4'];

	$update = mysqli_query($koneksi, "INSERT INTO normalisasi (nis, nama_lengkap, kode_jurusan, nama_jurusan, nilai_raport, tes_psikotes, angket_peminatan, tes_akademik) VALUES ('$nis', '$nama_lengkap', '$kode_jurusan', '$nama_jurusan', '$hasil_analisis_c1', '$hasil_analisis_c2', '$hasil_analisis_c3', '$hasil_analisis_c4')");
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
                                      <?php  

											$c1 = $nilai_raport/$max_nilai_raport;
											$c2 = $tes_psikotes/$max_tes_psikotes;
											$c3 = $angket_peminatan/$max_angket_peminatan;
											$c4 = $tes_akademik/$max_tes_akademik;

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
                                                    <div class="input-group">
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
					                                                <input type="text" value="<?= $nilai_raport; ?>" class="form-control" >
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" value="<?= $max_nilai_raport; ?>" class="form-control">
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c1" value="<?= $c1; ?>" class="form-control">
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
					                                                <input type="text" name="" class="form-control" value="<?= $tes_psikotes; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" name="" class="form-control" value="<?= $max_tes_psikotes; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c2" class="form-control" value="<?= $c2; ?>">
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
					                                                <input type="text" name="" class="form-control" value="<?= $angket_peminatan; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text" name="" class="form-control" value="<?= $max_angket_peminatan; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c3" class="form-control"  value="<?= $c3; ?>">
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
					                                                <input type="text" name="" class="form-control" value="<?= $tes_akademik; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">/</i>
					                                                </div>
					                                                <input type="text"  name="" class="form-control" value="<?= $max_tes_akademik; ?>">
					                                                <div class="input-group-addon">
					                                                    <i class="">=</i>
					                                                </div>
					                                                <input type="text" name="hasil_analisis_c4" class="form-control" value="<?= $c4; ?>">
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