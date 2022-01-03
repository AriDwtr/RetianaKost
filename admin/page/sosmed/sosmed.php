<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sosial Media</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Sosial Media</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <?php 
        include "koneksi.php";
        if (isset($_POST['submit_twitter'])) {
            $id_twitter = '3';
            $link_twitter = $_POST['link_twitter'];
            mysqli_query($conn, "UPDATE social_media SET link='$link_twitter' WHERE id_sosmed='$id_twitter'");
            echo '<div class="alert alert-success" role="alert">
            Berhasil Mengupdate Link Baru
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=sosmed';
                }, 1500);</script>";
        }
        if (isset($_POST['submit_facebook'])) {
            $id_facebook = '2';
            $link_facebook = $_POST['link_facebook'];
            mysqli_query($conn, "UPDATE social_media SET link='$link_facebook' WHERE id_sosmed='$id_facebook'");
            echo '<div class="alert alert-success" role="alert">
            Berhasil Mengupdate Link Baru
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=sosmed';
                }, 1500);</script>";
        }
        if (isset($_POST['submit_ig'])) {
            $id_ig = '1';
            $link_ig = $_POST['link_ig'];
            mysqli_query($conn, "UPDATE social_media SET link='$link_ig' WHERE id_sosmed='$id_ig'");
            echo '<div class="alert alert-success" role="alert">
            Berhasil Mengupdate Link Baru
            </div>';
                echo "<script>window.setTimeout(function() {
                window.location = 'index.php?page=sosmed';
                }, 1500);</script>";
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-purple card-outline">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 20%;">Sosial Media</th>
                                    <th>Link</th>
                                    <th style="width: 10%">Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td><i class="fab fa-instagram"></i> <b>Instagram</b></td>
                                    <td>
                                        <?php
                                        include "koneksi.php";
                                        $query_ig = mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='1'");
                                        $data_ig = mysqli_fetch_array($query_ig);
                                        ?>
                                        <a href="https://www.instagram.com/<?= $data_ig['link'] ?>" target="_blank">instagram.com/<?= $data_ig['link'] ?></a>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-ig">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td><i class="fab fa-facebook"></i> <b>Facebook</b></td>
                                    <td>
                                        <?php
                                        include "koneksi.php";
                                        $query_fb = mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='2'");
                                        $data_fb = mysqli_fetch_array($query_fb);
                                        ?>
                                        <a href="https://www.facebook.com/<?= $data_fb['link'] ?>" target="_blank">facebook.com/<?= $data_fb['link'] ?></a>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-facebook">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td><i class="fab fa-twitter"></i> <b>Twitter</b></td>
                                    <td>
                                        <?php
                                        include "koneksi.php";
                                        $query_twitter = mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='3'");
                                        $data_twitter = mysqli_fetch_array($query_twitter);
                                        ?>
                                        <a href="https://www.twitter.com/<?= $data_twitter['link'] ?>" target="_blank">twitter.com/<?= $data_twitter['link'] ?></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-twitter">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-sm-twitter">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Twitter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link_twitter" value="<?= $data_twitter['link'] ?>" id="" placeholder="Nama Account Twitter anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_twitter" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-sm-facebook">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Facebook</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link_facebook" value="<?= $data_fb['link'] ?>" id="" placeholder="Nama Account Facebook anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_facebook" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-sm-ig">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Facebook</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link_ig" value="<?= $data_ig['link'] ?>" id="" placeholder="Nama Account Instagram anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_ig" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>