<?php  
	
	require_once'../../function/koneksi.php';
	require_once'../header.php';

?>
<!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Data Keputusan</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--sm">
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
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
                                   $queryKetentuan = mysqli_query($koneksi, "SELECT * FROM hasil");
                                    if(mysqli_num_rows($queryKetentuan) == 0) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            Data masih kosong
                                        </div> 
                                <?php
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
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kode Jurusan</th>
                                            <th>Nama Jurusan</th>
                                            <th>Hasil</th>
                                            <th>Ketentuan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($queryKetentuan)) {
                                    ?>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['nis']; ?></td>
                                            <td><?php echo $row['nama_siswa']; ?></td>
                                            <td><?php echo $row['kode_jurusan']; ?></td>
                                            <td><?php echo $row['nama_jurusan']; ?></td>
                                            <td class="desc center"><?php echo $row['hasil']; ?></td>
                                            <td class="desc center"><?php echo $row['ketentuan']; ?></td>
                                            <td class="desc center">
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a href="ketentuan_edit.php?hasil_id=<?= $row['hasil_id']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                       <a href="ketentuan_hapus.php?hasil_id=<?= $row['hasil_id']; ?>"> <i class="zmdi zmdi-delete"></i></a>
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


<?php require_once'../footer.html' ?>