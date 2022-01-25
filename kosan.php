<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Daftar Kosan</h2>
                    <div class="bt-option">
                        <a href="index.php">Home</a>
                        <span>Kosan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php
            include "koneksi.php";
            $query_product = mysqli_query($conn, "SELECT * FROM kosan");
            $replace = array("KOTA", "ADM.", "KAB.");
            while ($kosan = mysqli_fetch_array($query_product)) {
            ?>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="admin/img/db_images/<?= $kosan['foto_utama'] ?>">
                        <div class="bi-text">
                            <span class="b-tag"><?= str_replace($replace, "", $kosan['wilayah']) ?> / <i class="icon_profile"></i> <?= $kosan['layanan']?></span>
                            <h4><a href="index.php?page=detail&id=<?= $kosan['id_kosan'] ?>"><?= ucwords($kosan['nama_kosan']) ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>