<section class="content">
    <div class="container-fluid">
    <?php
        if (isset($_POST['submit'])) {
            include "koneksi.php";
            $nik = $_POST['ktp'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $kosan = $_POST['kosan'];
            $nomor_kosan = $_POST['nomor'];
            $hp = $_POST['hp'];
            mysqli_query($conn, "INSERT INTO penghuni (id_penghuni,nik,nama,jk,tlp,kosan,nomor_kosan)
            VALUES ('','$nik','$nama','$jk','$hp','$kosan','$nomor_kosan')");
                echo '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Penghuni Baru
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=penghuni';
                }, 1500);</script>";
        };
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="margin-top: 10px;">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nik</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="ktp" placeholder="Masukan Nomor NIK KTP" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Lengkap</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Jenis Kelamin</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" value="Laki - Laki" id="customRadio1" name="jk" checked>
                                            <label for="customRadio1" class="custom-control-label">Laki - Laki</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" value="Perempuan" id="customRadio2" name="jk">
                                            <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kosan</label>
                                <select class="form-control select2" name="kosan" style="width: 100%;">
                                    <?php
                                    include "koneksi.php";
                                    $query = mysqli_query($conn, "SELECT * FROM kosan");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<option value = "' . $row['nama_kosan'] . '">' . $row['nama_kosan'] . ' - ' . $row['wilayah'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                    <label for="exampleInputPassword1">Nomor Kamar</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nomor" placeholder="A1, A12" required>
                                    </div>
                                    <div class="col-md-9">
                                    <label for="exampleInputPassword1">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" name="hp" placeholder="08122589085" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>