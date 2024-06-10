<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href='<?= PUBLIC_URL . "css/global.css?v=" . time() ?>'>
    <link rel="stylesheet" href='<?= PUBLIC_URL . "css/admin/layout.css?v=" . time() ?>'>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="banhang-fixed-top bh-fixed-top">
    <header class="bh-header navbar navbar-expand bg-dark">
        <!-- Brand -->
        <a href="<?= ROOT_URL ?>" class="nav-link h1 ps-3" style="color: var(--white)">banhang</a>
        <!-- Navbar Toggle -->
        <button id="navbarToggle" type="button" class="btn btn-primary d-flex justify-content-center align-items-center ms-8" style="width: 32px; height: 32px">
            <i class="fa-solid fa-bars"></i>
        </button>
        <!-- Search Bar-->
        <form action="" class="input-group ms-auto" style="width: 300px !important">
            <input type="text" name="" id="" class="form-control" placeholder="Search on banhang">
            <button class="btn btn-primary" style="width: 40px !important;">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <!-- Navbar Dropdown -->
        <div class="dropdown">
            <button class="btn w-25 dropdown-toggle" style="color:var(--grey-01); width: 100% !important;" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="#" class="dropdown-item" style="color: var(--black-01)">Profile</a></li>
                <li>
                    <hr class=" dropdown-divider">
                </li>
                <li><a href="#" class="dropdown-item">Logout</a></li>
            </ul>
        </div>

    </header>
    <nav class="bh-sidebar text-white bg-dark">
        <div class="bh-sidebar-items">
            <div class="bhsidebar-items-menu">
                <div class="bh-sidebar-item d-flex">
                    <div class="bh-sidebar-menu-icon-left me-8"><i class="fa-solid fa-layer-group fa-sm"></i></div>
                    <a href="<?= ROOT_URL . "admin" ?>" class="nav-link h2 text-white">Dashboard</a>
                </div>

                <div class="bh-sidebar-item mt-24">
                    <!-- Btn Collapse -->
                    <div class="bh-sidebar-menu d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseToggle-01">
                        <div class="bh-sidebar-menu-icon-left me-8"><i class="fa-brands fa-product-hunt fa-sm"></i></div>
                        <a href="#" class="nav-link h2 text-white">Product</a>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16"><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16 d-none"><i class="fa-solid fa-chevron-up"></i></div>
                    </div>
                    <!-- Content -->
                    <div class="bh-sidebar-content collapse ms-24" id="collapseToggle-01" state="hide">
                        <a href="<?= ROOT_URL . "admin/product" ?>" class="nav-link my-1">Product List</a>
                        <a href="<?= ROOT_URL . "admin/productadd" ?>" class="nav-link">Product Add</a>
                    </div>
                </div>

                <div class="bh-sidebar-item mt-24">
                    <!-- Btn Collapse -->
                    <div class="bh-sidebar-menu d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseToggle-02">
                        <div class="bh-sidebar-menu-icon-left me-8"><i class="fa-solid fa-layer-group fa-sm"></i></div>
                        <a href="#" class="nav-link h2 text-white">Catelogy</a>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16"><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16 d-none"><i class="fa-solid fa-chevron-up"></i></div>
                    </div>
                    <!-- Content -->
                    <div class="bh-sidebar-content collapse ms-24" id="collapseToggle-02" state="hide">
                        <a href="<?= ROOT_URL . "admin/catelogy" ?>" class="nav-link my-1">Catelogy List</a>
                        <a href="<?= ROOT_URL . "admin/catelogyadd" ?>" class="nav-link">Catelogy Add</a>
                    </div>
                </div>

                <div class="bh-sidebar-item mt-24">
                    <!-- Btn Collapse -->
                    <div class="bh-sidebar-menu d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseToggle-03">
                        <div class="bh-sidebar-menu-icon-left me-8"><i class="fa-brands fa-first-order fa-sm"></i></i></div>
                        <a href="#" class="nav-link h2 text-white">Order</a>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16"><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16 d-none"><i class="fa-solid fa-chevron-up"></i></div>
                    </div>
                    <!-- Content -->
                    <div class="bh-sidebar-content collapse ms-24" id="collapseToggle-03" state="hide">
                        <a href="<?= ROOT_URL . "admin/order" ?>" class="nav-link my-1">Order List</a>
                        <a href="<?= ROOT_URL . "admin/orderadd" ?>" class="nav-link">Order Add</a>
                    </div>
                </div>

                <div class="bh-sidebar-item mt-24">
                    <!-- Btn Collapse -->
                    <div class="bh-sidebar-menu d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseToggle-04">
                        <div class="bh-sidebar-menu-icon-left me-8"><i class="fa-solid fa-users fa-sm"></i></div>
                        <a href="#" class="nav-link h2 text-white">User</a>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16"><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="bh-sidebar-menu-icon-right ms-auto me-16 d-none"><i class="fa-solid fa-chevron-up"></i></div>
                    </div>
                    <!-- Content -->
                    <div class="bh-sidebar-content collapse ms-24" id="collapseToggle-04" state="hide">
                        <a href="<?= ROOT_URL . "admin/user" ?>" class="nav-link my-1">User List</a>
                        <a href="<?= ROOT_URL . "admin/useradd" ?>" class="nav-link">User Add</a>
                    </div>
                </div>
            </div>
            <div class="bh-sidebar-footer mt-auto">

                This is developed by:
                <br>
                Ngo Duc Phu
            </div>
        </div>

    </nav>
    <main class="bh-main">
        <?php include $contentView ?>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= PUBLIC_URL . "js/admin/layout.js?v=" . time() ?>"></script>
</body>

</html>