<?php
include "koneksi.php";
$id = $_GET['id'];
$query_edit = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '$id'");
$data_edit = mysqli_fetch_array($query_edit);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>KOSAN BARU</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Kamar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="container-fluid">
        <?php
        include "koneksi.php";
        error_reporting(0);
        $id_kosan = $_GET['id_kosan'];
        $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kosan WHERE id_kosan='$id_kosan'"));
        if (isset($_POST['add'])) {
            $nama_kosan = $_POST['namakosan'];
            $nama_kamar = $_POST['namakamar'];
            $tarif_bulan = $_POST['tarif_bulan'];
            $tarif_tahun = $_POST['tarif_tahun'];
            //---- foto utama ---
            $foto_utama = $_FILES['foto_utama']['name'];
            $tempname_fotoUtama = $_FILES['foto_utama']['tmp_name'];
            //---- foto kamar ------
            $foto_kamar = $_FILES['foto_kamar']['name'];
            $tempname_fotoKamar = $_FILES['foto_kamar']['tmp_name'];
            //---- foto toilet -----
            $foto_toilet = $_FILES['foto_toilet']['name'];
            $tempname_fotoToilet = $_FILES['foto_toilet']['tmp_name'];
            //---- foto option1 -----
            $foto_option1 = $_FILES['foto_option1']['name'];
            $tempname_fotoOption1 = $_FILES['foto_option1']['tmp_name'];
            //---- foto option2 -----
            $foto_option2 = $_FILES['foto_option2']['name'];
            $tempname_fotoOption2 = $_FILES['foto_option2']['tmp_name'];

            $fasilitas = $_POST['fasilitas'];
            $data_fasilitas = implode(',', $fasilitas);

            $folder = "img/db_images/";

            mysqli_query($conn, "UPDATE kamar SET id_kosan = '$id_kosan' ,nama_kosan = '$nama_kosan',nama_kamar = '$nama_kamar', tarif_perbulan = '$tarif_bulan',
            tarif_pertahun = '$tarif_tahun', foto_option1 = '$foto_utama',foto_option2 = '$foto_kamar',foto_option3 = '$foto_toilet',foto_option4 = '$foto_option1',foto_option5 = '$foto_option2',fasilitas = '$data_fasilitas'
            WHERE id_kamar = '$id'");

            move_uploaded_file($tempname_fotoUtama, $folder . $foto_utama);
            move_uploaded_file($tempname_fotoKamar, $folder . $foto_kamar);
            move_uploaded_file($tempname_fotoToilet, $folder . $foto_toilet);
            move_uploaded_file($tempname_fotoOption1, $folder . $foto_option1);
            move_uploaded_file($tempname_fotoOption2, $folder . $foto_option2);

            echo '<div class="alert alert-success" role="alert">
            Berhasil Memperbaharui Kamar
            </div>';
            echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=lihatkamar&id=".$id_kosan."';
                }, 1500);</script>";
        };
        ?>
        <div class="card  card-purple card-outline">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="img/db_images/<?= $data_edit['foto_option1']?>" id="image-preview-utama" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="img/db_images/<?= $data_edit['foto_option1']?>" id="image-preview" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/db_images/<?= $data_edit['foto_option2']?>" id="image-preview-kamar" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/db_images/<?= $data_edit['foto_option3']?>" id="image-preview-toilet" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/db_images/<?= $data_edit['foto_option4']?>" id="image-preview-option1" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/db_images/<?= $data_edit['foto_option5']?>" id="image-preview-option2" alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="my-3">
                                <div class="form-group">
                                    <label for="inputName">Nama Kosan / Kontrakan</label>
                                    <input type="text" name="" class="form-control" value="<?= $row['nama_kosan'] . ' - ' . $row['wilayah'] ?>" readonly>
                                    <input type="text" name="namakosan" class="form-control" value="<?= $data_edit['nama_kosan'] ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Tipe Kamar</label>
                                    <input type="text" name="namakamar" value="<?= $data_edit['nama_kamar'] ?>" class="form-control" placeholder="Deluxe, Premium, dll" required oninvalid="this.setCustomValidity('Nama Kamar Masih Kosong')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Bulan</label>
                                        <input type="text" value="<?= $data_edit['tarif_perbulan'] ?>" id="rupiahbulan" name="tarif_bulan" class="form-control" placeholder="Rp. 300.000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Tahun</label>
                                        <input type="text" value="<?= $data_edit['tarif_pertahun'] ?>" id="rupiahtahun" name="tarif_tahun" class="form-control" placeholder="Rp. 5.000.000">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p><b><i><u>Upload Foto Kamar</u></i></b></p>
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-utama" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 1
                                    </label>
                                    <input id="file-upload-utama" name="foto_utama" type="file" value="<?= $data_edit['foto_option1'] ?>" onchange="previewImageUtama();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-kamar" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 2
                                    </label>
                                    <input id="file-upload-kamar" name="foto_kamar" type="file" value="<?= $data_edit['foto_option2'] ?>" onchange="previewImageKamar();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-toilet" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 3
                                    </label>
                                    <input id="file-upload-toilet" name="foto_toilet" type="file" value="<?= $data_edit['foto_option3'] ?>" onchange="previewImageToilet();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-option1" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 4
                                    </label>
                                    <input id="file-upload-option1" name="foto_option1" type="file" value="<?= $data_edit['foto_option4'] ?>" onchange="previewImageOption1();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-option2" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 5
                                    </label>
                                    <input id="file-upload-option2" name="foto_option2" type="file" value="<?= $data_edit['foto_option5'] ?>" onchange="previewImageOption2();" hidden />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fasilitas Kamar</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="fasilitas[]" data-placeholder="Pilih Fasilitas" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                        <?php
                                        $fasilitas = $data_edit['fasilitas'];
                                        $datafasilitas = explode(',', $fasilitas);
                                        foreach ($datafasilitas as $value) {
                                            echo '<option value="'.$value.'" selected>'.$value.'</option>';
                                        }
                                        ?>
                                        <option value="Free Wifi 24 jam">Free Wifi 24 jam</option>
                                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                                        <option value="Kamar Mandi Luar">Kamar Mandi Luar</option>
                                        <option value="Listrik Token">Listrik Token</option>
                                        <option value="AC">AC</option>
                                        <option value="Kipas Angin">Kipas Angin</option>
                                        <option value="Lemari Pakaian">Lemari Pakaian</option>
                                        <option value="Dapur Umum">Dapur Umum</option>
                                        <option value="Air 24 Jam">Air Bersih 24 Jam</option>
                                        <option value="Meja Belajar">Meja Belajar</option>
                                        <option value="Tempat Tidur Spring Bed">Tempat Tidur Spring Bed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="add" class="btn btn-success btn-block"><b>PERBAHARUI KAMAR</b></button>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->

</section>