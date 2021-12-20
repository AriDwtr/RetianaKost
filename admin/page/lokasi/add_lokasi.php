<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <?php
        if (isset($_POST['add'])) {
            include "koneksi.php";
            // pemecahan id dan nama provinsi
            $prov = $_POST['provinsi'];
            if ($prov == 0) {
                echo '<div class="alert alert-warning" role="alert">
            Oppss!!! Anda Belum Memasukan Provinsi Lokasi
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=tambahlokasi';
                }, 1000);</script>";
            } else {
                $result_prov = explode('|', $prov);
                $id_prov = $result_prov[0];
                $nama_prov = $result_prov[1];
                // end pemecahan id dan nama provinsi     
                // pemecahan id dan nama provinsi       
                $kota = $_POST['kota'];
                $result_kota = explode('|', $kota);
                $id_kota = $result_kota[0];
                $nama_kota = $result_kota[1];
                // end pemecahan id dan nama provinsi
                $ket = $_POST['keterangan'];
                mysqli_query($conn, "INSERT INTO lokasi (id_lokasi,id_provinsi,provinsi,id_kota,kota,ket_lokasi)
            VALUES ('','$id_prov','$nama_prov','$id_kota','$nama_kota','$ket')");
                echo '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Lokasi Baru
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=tambahlokasi';
                }, 1500);</script>";
            }
        };
        ?>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LOKASI</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Lokasi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- list tambah lokasi -->
            <div class="col-md-6">
                <div class="card card-purple card-outline">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Lokasi Baru</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pilih Kota</label>
                                <select id="form_prov" class="form-control" name="provinsi">
                                    <option value="0">Pilih Provinsi</option>
                                    <?php
                                    include "koneksi.php";
                                    $daerah = mysqli_query($conn, "SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                                    while ($d = mysqli_fetch_array($daerah)) {
                                    ?>
                                        <option value="<?php echo $d['kode'] . "|" . $d['nama']; ?>"><?php echo $d['nama']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="form_kab" class="form-control" name="kota"></select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="5" placeholder="Masukan Keterangan [optional]"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="add" class="btn btn-success btn-block">Tambah Lokasi</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end tambah lokasi -->
            <!-- list lokasi -->
            <div class="col-md-6">
                <div class="card card-purple card-outline">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5px;">No</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th style="width: 50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $batas = 4;
                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                $data = mysqli_query($conn, "SELECT * FROM lokasi");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                $data_lokasi = mysqli_query($conn, "SELECT * FROM lokasi limit $halaman_awal, $batas");
                                $nomor = $halaman_awal + 1;
                                while ($data = mysqli_fetch_array($data_lokasi)) {
                                ?>
                                    <tr>
                                        <td>
                                            <center><?= $nomor++ ?></center>
                                        </td>
                                        <td><?= $data['provinsi'] . ' | ' . $data['kota']  ?></< /td>
                                        <td>
                                            <center><span class="badge bg-success">Aktif</span></center>
                                        </td>
                                        <td>
                                            <a href="http://"><span class="badge bg-primary">Edit <i class="fas fa-pen"></i></span></a>
                                            <a href="index.php?page=hapuslokasi&id=<?php echo $data['id_lokasi']; ?>" onClick="return confirm('Hapus Lokasi Yang Anda Pilih ?')" title="Hapus Pasien"><span class="badge bg-danger">Hapus <i class="fas fa-trash"></i></span></a>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                                            echo "href='index.php?page=tambahlokasi&halaman=$previous'";
                                                        } ?>>&laquo;</a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=tambahlokasi&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                            echo "href='index.php?page=tambahlokasi&halaman=$next'";
                                                        } ?>>&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end list lokasi -->
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->