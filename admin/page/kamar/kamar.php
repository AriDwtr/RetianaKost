<?php error_reporting(0); ?>
<?php 
$id = $_GET['id'];
?>
 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">LIST KAMAR</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard Kamar</li>
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
     <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <a href="index.php?page=addkamar&id=<?= $id ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Jenis Kamar Baru</a>
                            <thead>
                                <tr>
                                    <th>Tipe Kamar</th>
                                    <th>Tarif Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            include "koneksi.php";
                            $query = mysqli_query($conn,"SELECT * FROM kamar WHERE id_kosan = '$id'");
                            while ($penghuni = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= ucwords($penghuni['nama_kamar'])?></td>
                                    <td><?= $penghuni['tarif_perbulan'].'/bln - '.$penghuni['tarif_pertahun'].'/thn'?></td>
                                    <td>
                                    <a href="index.php?page=editkamar&id=<?= $penghuni['id_kamar']?>&id_kosan=<?= $penghuni['id_kosan']?>" class="btn btn-sm bg-teal">
                                         <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="index.php?page=deletekamar&id=<?= $penghuni['id_kamar']?>&id_kosan=<?= $penghuni['id_kosan']?>" class="btn btn-sm bg-red">
                                         <i class="fas fa-trash"></i> Delete
                                    </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tipe Kamar</th>
                                    <th>Tarif Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->