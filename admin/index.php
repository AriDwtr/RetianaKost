<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retania | KOST</title>

    <link href="img/SVG/Logo V!-1.svg" rel="icon">
    <link href="img/SVG/Logo V!-1.svg" rel="apple-touch-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "layout/navbar.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "layout/sidebar.php" ?>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                switch ($page) {
                    // lokasi
                    case 'tambahlokasi':
                        include "page/lokasi/add_lokasi.php";
                        $status = "active";
                        break;
                    case 'hapuslokasi':
                        include "page/lokasi/delete_lokasi.php";
                        $status = "active";
                        break;
                    // end lokasi
                    case 'kosan':
                        include "page/room/room.php";
                        $status = "active";
                        break;
                }
            } else {
                include "page/dashboard/dasboard.php";
            }

            ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include "layout/footer.php" ?>
        <!-- /.footer -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // sembunyikan form kabupaten, kecamatan dan desa
            $("#form_kab").hide();

            // ambil data kabupaten ketika data memilih provinsi
            $('body').on("change", "#form_prov", function() {
                var id = $(this).val();
                var data = "id=" + id + "&data=kabupaten";
                $.ajax({
                    type: 'POST',
                    url: "page/lokasi/get_daerah.php",
                    data: data,
                    success: function(hasil) {
                        $("#form_kab").html(hasil);
                        $("#form_kab").show();
                    }
                });
            });
        });
    </script>
</body>

</html>