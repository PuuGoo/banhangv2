        <div class="container">
            <div class="collapse navbar-collapse site-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-24">
                        <a class="nav-link active p1-medium-18 ps-0" style="color: var(--white)" aria-current="page" href="<?= ROOT_URL ?>">Home</a>
                    </li>
                    <?php $cats = Catelogy::get_all_catelogies(); ?>
                    <?php foreach ($cats as $row) : ?>
                        <li class="nav-item me-24">
                            <a class="nav-link active p1-medium-18" style="color: var(--white)" aria-current="page" href="<?= ROOT_URL ?>catelogy?id_loai=<?= $row->id_loai ?>"><?= $row->ten_loai ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>