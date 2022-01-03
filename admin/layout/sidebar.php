<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="img/SVG/Logo V!-1.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Retania-Kost Sistem</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['username']) ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color:#ff3d51"></i>
                        <p style="color:#ff3d51">
                        Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=tambahlokasi" class="nav-link">
                        <i class="nav-icon fas fa-map" style="color:#ff3d51"></i>
                        <p style="color:#ff3d51">
                        Data Lokasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=kosan" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Data Kosan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=penghuni" class="nav-link">
                        <i class="nav-icon fas fa-user" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Data Penghuni
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=sosmed" class="nav-link">
                        <i class="nav-icon fas fa-comment-alt" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Sosial Media
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-door-open" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>