 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">MANAGEMENT KOSAN</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="index.php" style="color:#ff3d51;">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard Kosan</li>
                 </ol>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <a href="index.php?page=tambahroom" class="btn btn-success mb-3" style="background-color: #ff3d51; border-color: #ff3d51;" onmouseover="this.style.backgroundColor='#E63345'" onmouseout="this.style.backgroundColor='#ff3d51';"><i class="fas fa-plus"></i> Tambah Kosan</a>
         <div class="card card-solid">
             <div class="card-body pb-0">
                 <div class="row">
                     <?php
                        include "koneksi.php";
                        $query = mysqli_query($conn, "SELECT * FROM kosan");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
                         <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                             <div class="card bg-light d-flex flex-fill">
                                 <div class="card-header text-muted border-bottom-0">
                                     <?= $row['wilayah'] ?>
                                 </div>
                                 <div class="card-body pt-0">
                                     <div class="row">
                                         <div class="col-7">
                                             <h2 class="lead"><b><?= $row['nama_kosan'] ?></b></h2>
                                             <ul class="ml-4 mb-0 fa-ul text-muted">
                                                 <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= implode(' ', array_slice(str_word_count($row['alamat'], 2), 0, 4)); ?> ...</li>
                                                 <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $row['tlp'] ?></li>
                                             </ul>
                                         </div>
                                         <div class="col-5 text-center">
                                             <img src="img/db_images/<?= $row['foto_utama'] ?>" alt="user-avatar" class="img-circle img-fluid">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-footer">
                                     <div class="text-right">
                                         <a href="index.php?page=lihatkamar&id=<?= $row['id_kosan'] ?>" class="btn btn-sm bg-secondary">
                                             <i class="fas fa-eye"></i> Lihat Kamar
                                         </a>
                                         <a href="index.php?page=editroom&id=<?= $row['id_kosan'] ?>" class="btn btn-sm bg-teal">
                                             <i class="fas fa-pen"></i> Edit Kosan
                                         </a>
                                         <a href="index.php?page=deleteroom&id=<?= $row['id_kosan'] ?>" onClick="return confirm('Hapus Kosan Yang Anda Pilih ?')" class="btn btn-sm btn-danger">
                                             <i class="fas fa-trash"></i> Delete
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>

                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->