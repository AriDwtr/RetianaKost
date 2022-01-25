<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Daftar Kota</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <?php
            include "koneksi.php";
            $id= $_GET['id'];
            $replace = array("KOTA", "ADM.", "KAB.");
            $query = mysqli_query($conn,"SELECT * FROM lokasi WHERE kota != '$id'");
            ?>
            <ul>
                <li class="active"><a style="font-size: 14px;"><?= str_replace($replace,"",$id) ?></a></li>
                <?php
                while ($kota = mysqli_fetch_array($query)) { ?>
                <li><a href="index.php?page=Wilayah&id=<?= $kota['kota']?>" style="font-size: 14px;"><?= str_replace($replace,"",$kota['kota']) ?></a></li>
                <?php 
                } ?>
            </ul>
        </div>
    </div>
</div>

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <div class="row">
            <?php
            $query_product = mysqli_query($conn,"SELECT * FROM kosan WHERE wilayah='$id'");
            $cek = mysqli_num_rows($query_product);
            if ($cek == 0) {
                echo '<div class="col-12 col-sm-12 col-md-12 col-xl-12">';
                echo '<div class="alert alert-danger" role="alert">
                <center>MAAF KOSAN UNTUK WILIAYAH '.str_replace($replace,"",$id).' BELUM TERSEDIA !!!</center>
              </div>';
                echo '</div>';
            }else{
            while ($kosan = mysqli_fetch_array($query_product)) {
            ?>
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="admin/img/db_images/<?= $kosan['foto_utama'] ?>" style="height:300px;" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="css/Logo/PNG/logojpg.jpg" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price"><?= $kosan['tarif_bulan'] ?> / bln </p>
                            <a href="index.php?page=Detail&id=<?= $kosan['id_kosan'] ?>">
                                <h6><?= strtoupper($kosan['nama_kosan']) ?></h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                            <a href="#">
                                <small><?= str_replace($replace,"",$kosan['wilayah']) ?></small>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>