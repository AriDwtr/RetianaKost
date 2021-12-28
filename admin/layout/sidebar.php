<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?page=tambahlokasi" class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'index.php?page=tambahlokasi' ? 'active' : '';?>">
                        <i class="nav-icon fas fa-map" style="color:#ff3d51"></i>
                        <p style="color:#ff3d51">
                        Lokasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=kosan" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Kosan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>