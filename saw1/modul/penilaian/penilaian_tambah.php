<?php

require_once'../../function/koneksi.php';

if (isset($_POST['submit'])) {
    $nis    = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $nilai_raport = $_POST['nilai_raport'];
    $tes_psikotes = $_POST['tes_psikotes'];
    $angket_peminatan = $_POST['angket_peminatan'];
    $tes_akademik = $_POST['tes_akademik'];

    if ($nilai_raport <= 50) {
        $nilai_raport = 1;
    }else if($nilai_raport <= 65){
        $nilai_raport = 2;
    }else if($nilai_raport <= 75){
        $nilai_raport = 3;
    }else if($nilai_raport <= 85){
        $nilai_raport = 4;
    }else if($nilai_raport <= 100){
        $nilai_raport = 5;
    }


    if ($tes_psikotes <= 50) {
        $tes_psikotes = 1;
    }else if($tes_psikotes <= 65){
        $tes_psikotes = 2;
    }else if($tes_psikotes <= 75){
        $tes_psikotes = 3;
    }else if($tes_psikotes <= 85){
        $tes_psikotes = 4;
    }else if($tes_psikotes <= 100){
        $tes_psikotes = 5;
    }

    
    if ($angket_peminatan == "IPA") {
        $angket_peminatan = 3;
    }else if($angket_peminatan == "IPS"){
        $angket_peminatan = 3;
    }

    if ($tes_akademik <= 50) {
        $tes_akademik = 1;
    }else if($tes_akademik <= 65){
        $tes_akademik = 2;
    }else if($tes_akademik <= 75){
        $tes_akademik = 3;
    }else if($tes_akademik <= 85){
        $tes_akademik = 4;
    }else if($tes_akademik <= 100){
        $tes_akademik = 5;
    }

    $sql = "INSERT INTO penilaian(nis, nama_lengkap, nama_jurusan, nilai_raport, tes_psikotes, angket_peminatan, tes_akademik) VALUES('$nis', '$nama_lengkap', '$nama_jurusan', '$nilai_raport', '$tes_psikotes', '$angket_peminatan', '$tes_akademik')";
    $query = mysqli_query($koneksi, $sql);

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
                                            <h3 class="text-center title-2">Input Penilaian</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">NIS</label>
                                                        <input name="nis" type="text" class="form-control cc-exp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Nilai Raport</label>
                                                    <div class="input-group">
                                                        <input name="nilai_raport" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Lengkap</label>
                                                        <input name="nama_lengkap" type="text" class="form-control cc-exp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Psikotes</label>
                                                    <div class="input-group">
                                                        <input name="tes_psikotes" type="text" class="form-control cc-cvc">

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
                                                        <input name="tes_akademik" type="text" class="form-control cc-cvc">

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
