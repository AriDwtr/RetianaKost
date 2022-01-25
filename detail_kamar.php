<br>
<?php
include "koneksi.php";
$id = $_GET['id_kamar'];
$query = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '$id'");
$data = mysqli_fetch_assoc($query);
?>
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="room-details-item">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_option1'] ?>" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_option2'] ?>" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_option3'] ?>" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_option4'] ?>" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="admin/img/db_images/<?= $data['foto_option5'] ?>" style="height: 500px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3><?= ucwords($data['nama_kamar']) ?></h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <?php
                                include "koneksi.php";
                                $id_kosan = $data['id_kosan'];
                                $query_kosan = mysqli_query($conn, "SELECT * FROM kosan WHERE id_kosan = '$id_kosan'");
                                $data_kosan = mysqli_fetch_assoc($query_kosan);
                                ?>
                                <a href="https://wa.me/<?= preg_replace('/^0/', '62',$data_kosan['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $data_kosan['nama_kosan'] ?>%20beralamat%20di%20<?= $data_kosan['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" name="addtocart" value="5" class="btn amado-btn" target="_blank"><i class="fa fa-whatsapp"> </i> PESAN SEKARANG</a>
                            </div>
                        </div>
                        <h2><?= $data['tarif_perbulan'] ?><span>/PerBulan - </span><?= $data['tarif_pertahun'] ?><span>/PerTahun</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        $fasilitas = $data['fasilitas'];
                                        $datafasilitas = explode(',', $fasilitas);
                                        foreach ($datafasilitas as $value) {
                                            echo '<span class="badge badge-primary" style=font-size:14px;>' . $value . '</span> ';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">
                        Retania Kos adalah sebuah jasa yang menawarkan sebuah kamar atau tempat untuk ditinggali dengan sejumlah pembayaran tertentu untuk setiap 
                        periode tertentu (umumnya pembayaran per bulan / per tahun). hunian tersebut sangat cocok bagi mahasiswa, dan pegawai kantor karena di wilayah yang strategis dan lingkungan yang aman dan 
                        nyaman
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>