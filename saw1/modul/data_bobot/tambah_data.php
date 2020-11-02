<?php

require_once'../../function/koneksi.php';


if (isset($_POST['submit'])) {

    $nama_jurusan = $_POST['jurusan'];
    $nilai_raport_kelas = $_POST['nilai_raport_kelas'];
    $psikotes = $_POST['psikotes'];
    $angket_peminatan = $_POST['angket_peminatan'];
    $tes_akademik = $_POST['tes_akademik'];

    if ($nilai_raport_kelas <= 50) {
        $nilai_raport_kelas = 1;
    }else if($nilai_raport_kelas <= 65){
        $nilai_raport_kelas = 2;
    }else if($nilai_raport_kelas <= 75){
        $nilai_raport_kelas = 3;
    }else if($nilai_raport_kelas <= 85){
        $nilai_raport_kelas = 4;
    }else if($nilai_raport_kelas <= 100){
        $nilai_raport_kelas = 5;
    }


    if ($psikotes <= 50) {
        $psikotes = 1;
    }else if($psikotes <= 65){
        $psikotes = 2;
    }else if($psikotes <= 75){
        $psikotes = 3;
    }else if($psikotes <= 85){
        $psikotes = 4;
    }else if($tes_psikotes <= 100){
        $psikotes = 5;
    }

    
    if ($angket_peminatan <= 50) {
        $angket_peminatan = 1;
    }else if($angket_peminatan <= 65){
        $angket_peminatan = 2;
    }else if($angket_peminatan <= 75){
        $angket_peminatan = 3;
    }else if($angket_peminatan <= 85){
        $angket_peminatan = 4;
    }else if($angket_peminatan <= 100){
        $angket_peminatan = 5;
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

    $sql = "INSERT INTO bobot(nama_jurusan, nilai_raport_kelas, psikotes, angket_peminatan, tes_akademik) VALUES('$nama_jurusan', '$nilai_raport_kelas', '$psikotes', '$angket_peminatan', '$tes_akademik')";
    $query = mysqli_query($koneksi, $sql);

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
                                            <h3 class="text-center title-2">Input Nilai Bobot</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Nama Jurusan</label>
                                                        <select name="jurusan" class="form-control">
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
                                                        <label class="control-label mb-1">Nilai Raport</label>
                                                        <input name="nilai_raport_kelas" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Psikotes</label>
                                                    <div class="input-group">
                                                        <input name="psikotes" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Angket Penilaian</label>
                                                        <input name="angket_peminatan" type="text" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label mb-1">Tes Akademik</label>
                                                    <div class="input-group">
                                                        <input name="tes_akademik" type="text" class="form-control cc-cvc">

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
