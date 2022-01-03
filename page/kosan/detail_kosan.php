<div class="single-product-area section-padding-100 clearfix">
    <?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM kosan WHERE id_kosan = '$id'");
    $data = mysqli_fetch_assoc($query);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['wilayah']; ?> / <?= $data['nama_kosan']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(admin/img/db_images/<?= $data['foto_utama'] ?>);">
                            </li>
                            <?php
                            if ($data['foto_kamar'] == null) {
                                echo '<li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(css/img/defaultimages.png);"></li>';
                            } else {
                                echo '<li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(admin/img/db_images/' . $data['foto_kamar'] . ');">
                                </li>';
                            }
                            ?>
                            <?php
                            if ($data['foto_toilet'] == null) {
                                echo '<li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(css/img/defaultimages.png);"></li>';
                            } else {
                                echo '<li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(admin/img/db_images/' . $data['foto_toilet'] . ');">
                                </li>';
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="admin/img/db_images/<?= $data['foto_utama'] ?>">
                                    <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_utama'] ?>" alt="First slide">
                                </a>
                            </div>
                            <?php
                            if ($data['foto_kamar'] == null) {
                                echo '<div class="carousel-item">
                                <a class="gallery_img" href="css/img/defaultimages.png">
                                    <img class="d-block w-100" src="css/img/defaultimages.png" alt="Second slide">
                                </a>
                            </div>';
                            } else {
                                echo '<div class="carousel-item">
                                <a class="gallery_img" href="admin/img/db_images/' . $data['foto_kamar'] . '">
                                    <img class="d-block w-100" src="admin/img/db_images/' . $data['foto_kamar'] . '" alt="Second slide">
                                </a>
                            </div>';
                            }
                            ?>
                            <?php
                            if ($data['foto_toilet'] == null) {
                                echo '<div class="carousel-item">
                                <a class="gallery_img" href="css/img/defaultimages.png">
                                    <img class="d-block w-100" src="css/img/defaultimages.png" alt="Third slide">
                                </a>
                            </div>';
                            } else {
                                echo '<div class="carousel-item">
                                <a class="gallery_img" href="admin/img/db_images/' . $data['foto_toilet'] . '">
                                    <img class="d-block w-100" src="admin/img/db_images/' . $data['foto_toilet'] . '" alt="Third slide">
                                </a>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price"><?= $data['nama_kosan']; ?></p>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <?php
                                $replace = array("LatLng", "(", ")");
                                $fasilitas = $data['fasilitas'];
                                $datafasilitas = explode(',', $fasilitas);
                                foreach ($datafasilitas as $value) {
                                    echo '<span class="badge badge-primary" style=font-size:14px;>' . $value . '</span> ';
                                }
                                ?>
                            </div>
                        </div>
                        <p style="color:green"><i class="fa fa-money"> </i> <?= $data['tarif_bulan'] ?> / Bulan </p>
                        <p style="color:green"><i class="fa fa-money"> </i> <?= $data['tarif_tahun'] ?> / Tahun </p>
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa fa-users"> </i> Kosan <?= $data['layanan'] ?>
                        </div>
                    </div>

                    <div class="short_overview my-2">
                        <p style="text-align: justify;"><?= ucwords($data['nama_kosan']); ?>, Merupakan sewa hunian yang terletak di <?= ucwords($data['wilayah']) ?>
                            lebih tepatnya di alamat <?= ucwords($data['alamat']) ?>. Sangat cocok bagi Mahasiswa, Pekerja, Maupun Pasangan Suami Istri</p>
                        <p><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <u>Detail Lokasi</u>
                            </button></p>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= str_replace($replace, "", $data['map']) ?>&hl=es;z=14&amp;output=embed">
                            </iframe>
                            <br />
                            <small>
                                <a style="color:#0000FF;text-align:left">
                                    <?= $data['alamat'] ?><br><br>
                                </a>
                            </small>
                        </div>
                        <a href="https://wa.me/<?= preg_replace('/^0/', '62',$data['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $data['nama_kosan'] ?>%20beralamat%20di%20<?= $data['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" name="addtocart" value="5" class="btn amado-btn btn-block" target="_blank"><i class="fa fa-whatsapp"> </i> PESAN SEKARANG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>