<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location:login.php");
}
?>
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
    <!-- Select2 -->
    <link rel="stylesheet" href="AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- leaflet geocoder css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        input[type=text]:focus {
            border: 1px solid #760d9d;
        }

        input[type=number]:focus {
            border: 1px solid #760d9d;
        }
    </style>
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
                        //kosan
                    case 'kosan':
                        include "page/room/room.php";
                        $status = "active";
                        break;
                    case 'tambahroom':
                        include "page/room/add_room.php";
                        $status = "active";
                        break;
                    case 'deleteroom':
                        include "page/room/delete_room.php";
                        $status = "active";
                        break;
                    case 'editroom':
                        include "page/room/edit_room.php";
                        $status = "active";
                        break;
                        //end kosan
                        //kamar
                    case 'lihatkamar':
                        include "page/kamar/kamar.php";
                        $status = "active";
                        break;
                    case 'addkamar':
                        include "page/kamar/add_kamar.php";
                        $status = "active";
                        break;
                    case 'deletekamar':
                        include "page/kamar/delete_kamar.php";
                        $status = "active";
                        break;
                    case 'editkamar':
                        include "page/kamar/edit_kamar.php";
                        $status = "active";
                        break;
                        //endkamar
                        //sosmed
                    case 'sosmed':
                        include "page/sosmed/sosmed.php";
                        break;
                        //end sosmed
                        //penghuni
                    case 'penghuni':
                        include "page/penghuni/penghuni.php";
                        break;
                    case 'addpenghuni':
                        include "page/penghuni/add_penghuni.php";
                        break;
                    case 'deletepenghuni':
                        include "page/penghuni/delete_penghuni.php";
                        break;
                    case 'editpenghuni':
                        include "page/penghuni/edit_penghuni.php";
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
    <!-- Select2 -->
    <script src="AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- leaflet geocoder js  -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })


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

        function previewImageUtama() {
            document.getElementById("file-upload-utama").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-utama").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
                document.getElementById("image-preview-utama").src = oFREvent.target.result;
            };
        };

        function previewImageKamar() {
            document.getElementById("file-upload-kamar").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-kamar").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-kamar").src = oFREvent.target.result;
            };
        };

        function previewImageToilet() {
            document.getElementById("file-upload-toilet").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-toilet").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-toilet").src = oFREvent.target.result;
            };
        };

        function previewImageOption1() {
            document.getElementById("file-upload-option1").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option1").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option1").src = oFREvent.target.result;
            };
        };

        function previewImageOption2() {
            document.getElementById("file-upload-option2").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option2").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option2").src = oFREvent.target.result;
            };
        };

        //maps
        // set lokasi latitude dan longitude, lokasinya kota palembang 
        var mymap = L.map('mapid').setView([-2.9547949, 104.6929233], 5);
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmV0YW5pYWtvc3QiLCJhIjoiY2t4ZTA0eXpiMW85NjMwcGY3N2VjcjE4eiJ9.RYHIYy7B60p7_rgE-GGL1Q', {
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicmV0YW5pYWtvc3QiLCJhIjoiY2t4ZTA0eXpiMW85NjMwcGY3N2VjcjE4eiJ9.RYHIYy7B60p7_rgE-GGL1Q'
            }).addTo(mymap);

        L.Control.geocoder().addTo(mymap);

        // buat variabel berisi fugnsi L.popup 
        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Titik Di Terapkan"
                    .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(mymap);

            document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $data_edit['map']); ?>]).addTo(mymap);
    </script>
</body>

</html>