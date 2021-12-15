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

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
                    case 'tambahroom':
                        include "page/room/add_room.php";
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

        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        });

        var rupiahbulan = document.getElementById('rupiahbulan');
        rupiahbulan.addEventListener('keyup', function(e) {
            rupiahbulan.value = formatRupiahbulan(this.value, 'Rp. ');
        });

        function formatRupiahbulan(angkabulan, prefix) {
            var number_string = angkabulan.replace(/[^,\d]/g, '').toString(),
                splitbulan = number_string.split(','),
                sisabulan = splitbulan[0].length % 3,
                rupiahbulan = splitbulan[0].substr(0, sisabulan),
                ribuanbulan = splitbulan[0].substr(sisabulan).match(/\d{3}/gi);
            if (ribuanbulan) {
                separatorbulan = sisabulan ? '.' : '';
                rupiahbulan += separatorbulan + ribuanbulan.join('.');
            }

            rupiahbulan = splitbulan[1] != undefined ? rupiahbulan + ',' + splitbulan[1] : rupiahbulan;
            return prefix == undefined ? rupiahbulan : (rupiahbulan ? 'Rp. ' + rupiahbulan : '');
        };

        var rupiahtahun = document.getElementById('rupiahtahun');
        rupiahtahun.addEventListener('keyup', function(e) {
            rupiahtahun.value = formatrupiahtahun(this.value, 'Rp. ');
        });

        function formatrupiahtahun(angka1, prefix) {
            var number_string = angka1.replace(/[^,\d]/g, '').toString(),
                split1 = number_string.split(','),
                sisa1 = split1[0].length % 3,
                rupiahtahun = split1[0].substr(0, sisa1),
                ribuan1 = split1[0].substr(sisa1).match(/\d{3}/gi);
            if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiahtahun += separator1 + ribuan1.join('.');
            }

            rupiahtahun = split1[1] != undefined ? rupiahtahun + ',' + split1[1] : rupiahtahun;
            return prefix == undefined ? rupiahtahun : (rupiahtahun ? 'Rp. ' + rupiahtahun : '');
        }
    </script>
</body>

</html>