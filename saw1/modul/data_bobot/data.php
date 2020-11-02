<?php  
    
    require_once'../../function/koneksi.php';
    require_once'../header.php';

?>

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Data Bobot Nilai</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--sm">
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <a href="tambah_data.php" class="link"><i class="zmdi zmdi-plus"></i>add item</a>
                                        </button>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <?php  
                                    $queryBobot = mysqli_query($koneksi, "SELECT * FROM bobot");
                                        if(mysqli_num_rows($queryBobot) == 0) {
                                            echo "gagal menampilkan data";
                                        }else{
                                ?>
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th class="center">No.</th>
                                            <th class="center">Nama Jurusan</th>
                                            <th class="center">nilai raport kelas</th>
                                            <th class="center">nilaipsikotes</th>
                                            <th class="center">angket peminatan</th>
                                            <th class="center">nilai akademik</th>
                                            <th class="center"></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($queryBobot)) {
                                    ?>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td class="center"><?php echo $no; ?></td>
                                            <td>
                                                <?php echo $row['nama_jurusan']; ?>
                                            </td>
                                            <td class="desc center"><?php echo $row['nilai_raport_kelas']; ?></td>
                                            <td class="desc center"><?php echo $row['psikotes']; ?></td>
                                            <td class="desc center"><?php echo $row['angket_peminatan']; ?></td>
                                            <td class="desc center"><?php echo $row['tes_akademik'] ?></td>
                                            <td class="desc center">
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a href="bobot_edit.php?bobot_id=<?= $row['bobot_id']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="bobot_hapus.php?bobot_id=<?= $row['bobot_id']; ?>"><i class="zmdi zmdi-delete"></i></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php $no++; }  ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->


<?php require_once'../footer.html'; ?>
