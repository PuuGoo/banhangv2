<div class="container">
    <div class="site-home sh">
        <div class="sh-featured_product shfp mt-80">
            <div class="display-2 text-center mb-40">Featured Product</div>

            <div class="shfp-items d-flex flex-wrap">
                <?php $featuredProduct = $fp = Product::FeaturedProduct($proNum); ?>
                <?php foreach ($fp as $key => $row) : ?>
                    <div class="shfp-item mb-24 <?= ($key + 1) % 4 == 0 ? "me-0" : "me-24" ?>">
                        <div class="shtp-item-image mb-16">
                            <img src="<?= $row->hinh ?>" width="180" height="180" alt="">
                        </div>
                        <div class="shtp-item-name display-6 mb-8 text-center">
                            <a href="productdetail?id_sp=<?= $row->id_sp ?>"><?= $row->ten_sp ?></a>
                        </div>
                        <div class="shtp-item-price display-6 mb-8 text-center" style="color: var(--darkGreen-03);"><?= number_format($row->gia, 0, "", ".") . " VND" ?></div>
                        <div class="shtp-buttons text-center ">
                            <a href="<?= ROOT_URL . "addtocart?id_sp={$row->id_sp}&quantity=1" ?>">
                                <button class="btn btn-primary btn-sm">
                                    <svg class="me-8" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 2.5H4.24001C5.32001 2.5 6.17 3.43 6.08 4.5L5.25 14.46C5.11 16.09 6.39999 17.49 8.03999 17.49H18.69C20.13 17.49 21.39 16.31 21.5 14.88L22.04 7.38C22.16 5.72 20.9 4.37 19.23 4.37H6.32001" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.75 22.5C17.4404 22.5 18 21.9404 18 21.25C18 20.5596 17.4404 20 16.75 20C16.0596 20 15.5 20.5596 15.5 21.25C15.5 21.9404 16.0596 22.5 16.75 22.5Z" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.75 22.5C9.44036 22.5 10 21.9404 10 21.25C10 20.5596 9.44036 20 8.75 20C8.05964 20 7.5 20.5596 7.5 21.25C7.5 21.9404 8.05964 22.5 8.75 22.5Z" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.5 8.5H21.5" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Add to Cart
                                </button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="sh-most_view_product">
            <div class="display-2 text-center mb-40">Most View Product</div>
            <div class="shfp-items d-flex flex-wrap">
                <?php $mostViewProduct = $mvp = Product::MostViewProduct($proNum); ?>
                <?php foreach ($mvp as $key => $row) : ?>
                    <div class="shfp-item <?= ($key + 1) % 4 == 0 ? "me-0" : "me-24" ?>">
                        <div class="shtp-item-image mb-16">
                            <img src="<?= $row->hinh ?>" width="180" height="180" alt="">
                        </div>
                        <div class="shtp-item-name display-6 mb-8 text-center">
                            <a href="productdetail?id_sp=<?= $row->id_sp ?>"><?= $row->ten_sp ?></a>
                        </div>
                        <div class="shtp-item-price display-6 mb-8 text-center" style="color: var(--darkGreen-03);"><?= number_format($row->gia, 0, "", ".") . " VND" ?></div>
                        <div class="shtp-buttons text-center ">
                            <a href="<?= ROOT_URL . "addtocart?id_sp={$row->id_sp}&quantity=1" ?>">
                                <button class="btn btn-primary btn-sm">
                                    <svg class="me-8" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 2.5H4.24001C5.32001 2.5 6.17 3.43 6.08 4.5L5.25 14.46C5.11 16.09 6.39999 17.49 8.03999 17.49H18.69C20.13 17.49 21.39 16.31 21.5 14.88L22.04 7.38C22.16 5.72 20.9 4.37 19.23 4.37H6.32001" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.75 22.5C17.4404 22.5 18 21.9404 18 21.25C18 20.5596 17.4404 20 16.75 20C16.0596 20 15.5 20.5596 15.5 21.25C15.5 21.9404 16.0596 22.5 16.75 22.5Z" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.75 22.5C9.44036 22.5 10 21.9404 10 21.25C10 20.5596 9.44036 20 8.75 20C8.05964 20 7.5 20.5596 7.5 21.25C7.5 21.9404 8.05964 22.5 8.75 22.5Z" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.5 8.5H21.5" stroke="#1E4C2F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Add to Cart
                                </button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>