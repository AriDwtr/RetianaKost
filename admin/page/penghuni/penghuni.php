<?php error_reporting(0); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Penghuni</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Data Penghuni</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <a href="index.php?page=addpenghuni" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Data Penghuni</a>
                            <thead>
                                <tr>
                                    <th>Nama Kosan</th>
                                    <th>Nama Penghuni</th>
                                    <th>Nomor HP</th>
                                    <th>Nomor Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            include "koneksi.php";
                            $query = mysqli_query($conn,"SELECT * FROM penghuni");
                            while ($penghuni = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= ucwords($penghuni['kosan'])?></td>
                                    <td><?= strtoupper($penghuni['nama'])?></td>
                                    <td><?= $penghuni['tlp']?></td>
                                    <td><?= $penghuni['nomor_kosan']?></td>
                                    <td>
                                    <a href="index.php?page=editpenghuni&id=<?= $penghuni['id_penghuni']?>" class="btn btn-sm bg-teal">
                                         <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="index.php?page=deletepenghuni&id=<?= $penghuni['id_penghuni']?>" class="btn btn-sm bg-red">
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
                                    <th>Nama Kosan</th>
                                    <th>Nama Penghuni</th>
                                    <th>Nomor HP</th>
                                    <th>Nomor Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>