<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Retania | KOST</title>

    <!-- Favicon  -->
    <link href="css/Logo/SVG/Logo V!-1.svg" rel="icon">
    <link href="css/Logo/SVG/Logo V!-1.svg" rel="apple-touch-icon">


    <!-- Core Style CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="index.php?page=Cari" method="POST">
                            <input type="search" name="search" id="search" placeholder="Tulis Kata Kunci..." required>
                            <button type="submit"><img src="css/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="css/Logo/SVG/3xlogo icon.svg" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start / side bar -->
        <?php include "page/layout/sidebar.php" ?>
        <!-- Header Area End / sidebar -->
     
        <!-- content  -->
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'MenuKosan':
                    include "page/kosan/menu_kosan.php";
                    break;
                case 'Wilayah':
                    include "page/kosan/detail_daerah.php";
                    break;
                case 'Detail':
                    include "page/kosan/detail_kosan.php";
                    break;
                case 'Cari':
                    include "page/kosan/cari.php";
                    break;
            }
        } else {
            include "page/home/home.php";
        }

        ?>
        <!-- content-->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <?php include "page/layout/footer.php" ?>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="css/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="css/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="css/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="css/js/plugins.js"></script>
    <!-- Active js -->
    <script src="css/js/active.js"></script>

</body>

</html>