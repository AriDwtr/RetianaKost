<?php error_reporting(0) ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-6">
                <?php
                include "koneksi.php";
                $result_kosan = mysqli_query($conn, "SELECT COUNT(*) AS kosan FROM kosan");
                $data_kosan = mysqli_fetch_assoc($result_kosan);
                ?>
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $data_kosan['kosan'] ?></h3>
                        <p>Titik Kosan / Kontrakan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <a href="index.php?page=kosan" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <?php
                $result_lokasi = mysqli_query($conn, "SELECT COUNT(*) AS lokasi FROM lokasi");
                $data_lokasi = mysqli_fetch_assoc($result_lokasi);
                ?>
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $data_lokasi['lokasi'] ?></h3>
                        <p>Wilayah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <a href="index.php?page=tambahlokasi" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>