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

            $tlp = $_POST['notlp'];
            $latlong = $_POST['latlong'];
            $alamat = $_POST['alamat'];

            $folder = "img/db_images/";

            mysqli_query($conn, "INSERT INTO kosan (id_kosan,nama_kosan,wilayah,layanan,foto_utama,foto_kamar,foto_toilet,tlp,map,alamat) 
            VALUES ('','$nama_kosan','$wilayah','$layanan','$foto_utama','$foto_kamar','$foto_toilet','$tlp','$latlong','$alamat')");

            move_uploaded_file($tempname_fotoUtama, $folder . $foto_utama);
            move_uploaded_file($tempname_fotoKamar, $folder . $foto_kamar);
            move_uploaded_file($tempname_fotoToilet, $folder . $foto_toilet);

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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="rupiahbulan" name="tarif_bulan" class="form-control" placeholder="Rp. 300.000" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="rupiahtahun" name="tarif_tahun" class="form-control" placeholder="Rp. 5.000.000" hidden>
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
                                        <i class="fas fa-photo-video"></i> Foto Optional
                                    </label>
                                    <input id="file-upload-kamar" name="foto_kamar" type="file" onchange="previewImageKamar();" hidden />
                                </div>
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-toilet" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Optional
                                    </label>
                                    <input id="file-upload-toilet" name="foto_toilet" type="file" onchange="previewImageToilet();" hidden />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
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
                    <div class="form-group">
                        <label for="inputName">Alamat Lengkap</label>
                        <input type="text" name="alamat" autocomplete="FALSE" class="form-control" placeholder="Jl. Sukabangun 2 No.245" required oninvalid="this.setCustomValidity('Alamat Wajib di Isi')" oninput="this.setCustomValidity('')">
                    </div>
                    <label for="inputName">Buat Pin Map</label>
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