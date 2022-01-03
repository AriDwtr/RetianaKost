<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="index.php"><img src="css/Logo/SVG/3xlogo circle.svg" style="height: 120px;" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="<?php echo basename($_SERVER['REQUEST_URI']) == 'retianaKost' ? 'active' : '';?>"><a href="index.php">Home</a></li>
            <li class="<?php echo basename($_SERVER['REQUEST_URI']) == 'index.php?page=MenuKosan' ? 'active' : '';?>"><a href="index.php?page=MenuKosan">Menu Kosan</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <hr>
        <a href="#" class="search-nav"><img src="css/img/core-img/search.png" alt=""> Search</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>