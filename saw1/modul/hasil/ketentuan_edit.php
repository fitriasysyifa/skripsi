<?php

require_once'../../function/koneksi.php';

$hasil_id = $_GET['hasil_id'];

$sql = "SELECT * FROM hasil WHERE hasil_id='$hasil_id'";
$queryhasil = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($queryhasil);

$nis = $row['nis'];
$nama_siswa = $row['nama_siswa'];
$kode_jurusan = $row['kode_jurusan'];
$nama_jurusan = $row['nama_jurusan'];
$hasil = $row['hasil'];
$ketentuan = $row['ketentuan'];

    if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $hasil = $_POST['hasil'];
    $ketentuan = $_POST['ketentuan'];

    $update = mysqli_query($koneksi, "UPDATE hasil SET  nis='$nis',
                                                        nama_siswa='$nama_siswa',
                                                        kode_jurusan='$kode_jurusan',
                                                        nama_jurusan='$nama_jurusan',
                                                        hasil='$hasil',
                                                        ketentuan='$ketentuan'
                                                        WHERE hasil_id='$hasil_id'");
    header("location: daftar_ketentuan.php");
}


require_once'../header.php';
?>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Data Keputusan</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Data Keputusan</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">NIS</label>
                                                        <input name="nis" type="text" class="form-control cc-cvc center" value="<?= $nis; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama</label>
                                                        <input name="nama_siswa" type="text" class="form-control cc-cvc center" value="<?= $nama_siswa; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Kode Jurusan</label>
                                                        <select name="kode_jurusan" class="form-control">
                                                            <option disable selection>Pilih</option>
                                                          <?php 
                                                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                            while($row = mysqli_fetch_assoc($query)){
                                                          ?> 
                                                            <option value="<?php echo $row['kode_jurusan']; ?>" ><?php echo $row['kode_jurusan']; ?></option>
                                                          <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
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
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nilai Hasil Ketentuan</label>
                                                        <input name="hasil" type="text" class="form-control cc-cvc center" value="<?= $hasil; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Ketentuan</label>
                                                        <input name="ketentuan" type="text" class="form-control cc-cvc center" value="<?= $ketentuan; ?>">
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
