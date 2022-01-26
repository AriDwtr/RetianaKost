<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title  -->
    <title>Retania | KOST</title>

    <!-- Favicon  -->
    <link href="Logo/SVG/Logo V!-1.svg" rel="icon">
    <link href="Logo/SVG/Logo V!-1.svg" rel="apple-touch-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="sona/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="sona/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="sona/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="sona/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="sona/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="sona/css/style.css" type="text/css">
</head>

<body>
    <?php
    include "koneksi.php";
    $ig = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='1'"));
    $fb = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='2'"));
    $hp = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM social_media WHERE id_sosmed='3'"));
    ?>
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=Kosan">Kosan</a></li>
                <li><a href="./about-us.html">About Us</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="https://www.facebook.com/<?= $fb['link'] ?>" target="_blank"><i class="fa fa-facebook fa-lg"> </i></a>
            <a href="https://www.instagram.com/<?= $ig['link'] ?>" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
        </div>
        <ul class="top-widget">
                <li><i class="fa fa-phone"></i> <?= $hp['link'] ?> </li>
                <li><i class="fa fa-envelope"></i> RetaniaKost@gmail.com</li>
        </ul>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> <?= $hp['link'] ?> </li>
                            <li><i class="fa fa-envelope"></i> RetaniaKost@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="https://www.facebook.com/<?= $fb['link'] ?>" target="_blank"><i class="fa fa-facebook fa-lg"> </i></a>
                                <a href="https://www.instagram.com/<?= $ig['link'] ?>" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="logo/PNG/3xlogonew.png" width="200px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="index.php?page=Kosan">Kosan</a></li>
                                    <li><a href="./about-us.html">About Us</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'Kosan':
                include "kosan.php";
                break;
            case 'detail':
                include "detail.php";
                break;
            case 'detail_kamar':
                include "detail_kamar.php";
                break;
            case 'cari':
                include "cari.php";
                break;
        }
    } else {
        include "home.php";
    }

    ?>



    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="index.php?page=Kosan">Kosan</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text">
                            <p>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | template <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#">RetaniaKost</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form action="index.php?page=cari" class="search-model-form" method="POST">
                <input type="text" name="search" placeholder="Nama Kosan, Wilayah">
            </form>
        </div>
    </div>

    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="sona/js/jquery-3.3.1.min.js"></script>
    <script src="sona/js/bootstrap.min.js"></script>
    <script src="sona/js/jquery.magnific-popup.min.js"></script>
    <script src="sona/js/jquery.nice-select.min.js"></script>
    <script src="sona/js/jquery-ui.min.js"></script>
    <script src="sona/js/jquery.slicknav.js"></script>
    <script src="sona/js/owl.carousel.min.js"></script>
    <script src="sona/js/main.js"></script>
</body>

</html>