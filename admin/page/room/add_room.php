<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>KOSAN BARU</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">New Room</li>
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
        error_reporting(0);
        if (isset($_POST['add'])) {
            include "koneksi.php";
            $nama_kosan = $_POST['namakosan'];
            $wilayah = $_POST['wilayah'];
            $tarif_bulan = $_POST['tarif_bulan'];
            $tarif_tahun = $_POST['tarif_tahun'];
            $layanan = $_POST['layanan'];
            //---- foto utama ---
            $foto_utama = $_FILES['foto_utama']['name'];
            $tempname_fotoUtama = $_FILES['foto_utama']['tmp_name'];
            //---- foto kamar ------
            $foto_kamar = $_FILES['foto_kamar']['name'];
            $tempname_fotoKamar = $_FILES['foto_kamar']['tmp_name'];
            //---- foto toilet -----
            $foto_toilet = $_FILES['foto_toilet']['name'];
            $tempname_fotoToilet = $_FILES['foto_toilet']['tmp_name'];

            $fasilitas = $_POST['fasilitas'];
            $data_fasilitas = implode(',', $fasilitas);

            $tlp = $_POST['notlp'];
            $latlong = $_POST['latlong'];

            $folder = "img/db_images/";

            mysqli_query($conn, "INSERT INTO kosan (id_kosan,nama_kosan,wilayah,tarif_bulan,tarif_tahun,layanan,foto_utama,foto_kamar,foto_toilet,fasilitas,tlp,map) 
            VALUES ('','$nama_kosan','$wilayah','$tarif_bulan','$tarif_tahun','$layanan','$foto_utama','$foto_kamar','$foto_toilet','$data_fasilitas','$tlp','$latlong')");

            move_uploaded_file($tempname_fotoUtama,$folder.$foto_utama);
            move_uploaded_file($tempname_fotoKamar,$folder.$foto_kamar);
            move_uploaded_file($tempname_fotoToilet,$folder.$foto_toilet);

            echo '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Kosan Baru
            </div>';
            echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=kosan';
                }, 1500);</script>";
        };
        ?>
        <div class="card  card-purple card-outline">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="img/noimages/defaultimages.png" id="image-preview-utama" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="img/noimages/defaultimages.png" id="image-preview" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/noimages/defaultimages.png" id="image-preview-kamar" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="img/noimages/defaultimages.png" id="image-preview-toilet" alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="my-3">
                                <div class="form-group">
                                    <label for="inputName">Nama Kosan / Kontrakan</label>
                                    <input type="text" name="namakosan" class="form-control" placeholder="KOSAN RETANIA ABADI MAKASSAR" required oninvalid="this.setCustomValidity('Nama Kosan Masih Kosong')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <p>
                            <div class="form-group">
                                <div class="select2-purple">
                                    <label for="inputName">Pilih Wilayah Kosan</label>
                                    <select class="select2" name="wilayah" style="width: 100%;" data-dropdown-css-class="select2-purple">
                                        <?php
                                        include "koneksi.php";
                                        $query = mysqli_query($conn, "SELECT * FROM lokasi ORDER BY id_provinsi ASC");
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value = "' . $row['kota'] . '">' . $row['provinsi'] . ' - ' . $row['kota'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            </p>

                            <hr>
                            <p><b><i><u>Detail Info</u></i></b></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Bulan</label>
                                        <input type="text" id="rupiahbulan" name="tarif_bulan" class="form-control" placeholder="Rp. 300.000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Tahun</label>
                                        <input type="text" id="rupiahtahun" name="tarif_tahun" class="form-control" placeholder="Rp. 5.000.000">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Hanya Melayani Penghuni</label>
                                <div class="row">
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Khusus Pria" type="radio" id="customRadio1" name="layanan" checked>
                                            <label for="customRadio1" class="custom-control-label">Khusus Pria</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Khusus Wanita" type="radio" id="customRadio2" name="layanan">
                                            <label for="customRadio2" class="custom-control-label">Khusus Wanita</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Pria & Wanita" type="radio" id="customRadio3" name="layanan">
                                            <label for="customRadio3" class="custom-control-label">Pria & Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p><b><i><u>Upload Foto</u></i></b></p>
                            <div class="row">
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-utama" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Utama
                                    </label>
                                    <input id="file-upload-utama" name="foto_utama" type="file" onchange="previewImageUtama();" hidden />
                                </div>
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-kamar" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Kamar
                                    </label>
                                    <input id="file-upload-kamar" name="foto_kamar" type="file" onchange="previewImageKamar();" hidden />
                                </div>
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-toilet" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Toilet
                                    </label>
                                    <input id="file-upload-toilet" name="foto_toilet" type="file" onchange="previewImageToilet();" hidden />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fasilitas Tersedia</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="fasilitas[]" data-placeholder="Pilih Fasilitas" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
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
                        <div class="col-md-6">
                            <label>No Telp / Whatsapp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name="notlp" class="form-control" required oninvalid="this.setCustomValidity('No Telp Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="mapid" style="width:100%; height: 250px;"></div>
                    <input type="text" class="form-control" id="latlong" name="latlong" hidden>
                    <br>
                    <button type="submit" name="add" class="btn btn-success btn-block"><b>TAMBAH KOSAN BARU</b></button>

                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->

</section>