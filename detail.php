<?php
include "koneksi.php";
$id = $_GET['id'];
$replace = array("LatLng", "(", ")");
$query = mysqli_query($conn, "SELECT * FROM kosan WHERE id_kosan = '$id'");
$data = mysqli_fetch_assoc($query);
?>
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2><?= ucwords($data['nama_kosan']) ?></h2>
                    <p><b><?= ucwords($data['nama_kosan']) ?></b> Merupakan tempat tinggal yang nyaman, aman dan di tempatkan di posisi yang strategis, berlokasi di
                        <?= $data['alamat'] ?></p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Alamat:</td>
                                <td><?= ucwords($data['alamat']) ?></td>
                            </tr>
                            <tr>
                                <td class="c-o">Telpon:</td>
                                <td><?= $data['tlp'] ?></td>
                            </tr>
                            <tr>
                                <td class="c-o">Layanan:</td>
                                <td><?= ucwords($data['layanan']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="" class="contact-form">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_utama'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_kamar'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_toilet'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option1'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option2'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option3'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option4'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option5'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <img src="admin/img/db_images/<?= $data['foto_option6'] ?>" alt="">
                        </div>
                        <div class="col-lg-12">
                            <img src="admin/img/db_images/<?= $data['foto_option7'] ?>" alt="">
                            <a target="_blank" href="https://wa.me/<?= preg_replace('/^0/', '62', $data['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $data['nama_kosan'] ?>%20beralamat%20di%20<?= $data['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" class="btn btn-primary btn-block" style="background-color:#ff3d51;border: 1px solid #ff3d51;"><i class="fa fa-whatsapp fa-lg"> </i> Hubungi Pemilik</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe src="https://maps.google.com/maps?q=<?= str_replace($replace, "", $data['map']) ?>&hl=es;z=14&amp;output=embed" height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>List Kamar</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="rooms-section spad">
        <div class="container">
            <div class="row">
            <?php 
            $query_kamar = mysqli_query($conn,"SELECT * FROM kamar WHERE id_kosan = '$id'");
            while ($kamar = mysqli_fetch_array($query_kamar)) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="admin/img/db_images/<?= $kamar['foto_option1'] ?>" alt="" style="height:200px;">
                        <div class="ri-text">
                            <h4><?= ucwords($kamar['nama_kamar']) ?></h4>
                            <h3><?= $kamar['tarif_perbulan'] ?><span>/ PerBulan</span></h3>
                            <a href="index.php?page=detail_kamar&id_kamar=<?= $kamar['id_kamar']?>" class="primary-btn">Lihat Details</a><br><br>
                            <a target="_blank" href="https://wa.me/<?= preg_replace('/^0/', '62', $data['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $data['nama_kosan'] ?>%20beralamat%20di%20<?= $data['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" class="btn btn-primary btn-block" style="background-color:#ff3d51;border: 1px solid #ff3d51;"><i class="fa fa-whatsapp fa-lg"> </i> Hubungi Pemilik</a>
                        </div>
                    </div>
                </div>
                <?php
            } 
            ?>
            </div>
        </div>
    </section>