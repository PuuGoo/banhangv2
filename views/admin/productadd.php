<?php

$cats = Catelogy::get_all_catelogies();

?>

<div id="productlist pd">
    <div class="pd-title d-flex align-items-center">
        <div class="pd-title-text h1"><?= $pageTitle ?></div>
    </div>
    <form action="<?= ROOT_URL . "admin/productadd_" ?>" method="post" enctype="multipart/form-data">
        <div class="pd-content mt-40">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Product Name</label>
                    <input type="text" name="ten_sp" id="" class="form-control w-100" placeholder="Please type product name">
                </div>
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Date</label>
                    <input type="date" name="ngay" id="" class="form-control w-100">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Product Price</label>
                    <input type="number" name="gia" id="" class="form-control w-100" placeholder="Please type product price">
                </div>
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Product Sale Price</label>
                    <input type="number" name="gia_km" id="" class="form-control w-100" placeholder="Please type product sale price">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <label for="" class="form-label h2 mb-2">Product Catelogy</label>
                    <select name="id_loai" id="" class="form-select">
                        <option value="0" selected>Please select product catelogy!</option>
                        <?php foreach ($cats as $cat) : ?>
                            <option value="<?= $cat->id_loai ?>"><?= $cat->ten_loai ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="col-12 h2">Show/hide Product:</div>
                    <div class="col">
                        <div class="form-check">
                            <input type="radio" name="anhien" id="hide" class="form-check-input" value="0">
                            <label for="hide" class="form-check-label mb-2">Hide</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="anhien" id="hide" class="form-check-input" value="1" checked>
                            <label for="hide" class="form-check-label mb-2">Show</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 h2">Show/hide Featured Product:</div>
                    <div class="col">
                        <div class="form-check">
                            <input type="radio" name="hot" id="hide" class="form-check-input" value="0" checked>
                            <label for="hide" class="form-check-label mb-2">Normal</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="hot" id="hide" class="form-check-input" value="1">
                            <label for="hide" class="form-check-label mb-2">Featured</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="">
                    <label for="" class="form-label h2 mb-2">Product Description</label>
                    <textarea name="mota" id="" class="form-control w-100" style="min-height: 150px !important;"></textarea>
                </div>
            </div>

            <div class="row mt-3 product-image pi">
                <div class="col-12 h2 mb-2" style="margin-left: 12px !important">Product Image</div>
                <div class="">
                    <label for="productimage" class="form-label h2 mb-2 d-flex flex-column">
                        <i class="fa-solid fa-image" style="font-size: 48px;"></i>
                        Please Drag And Drop Your Image Here!
                    </label>
                    <input type="file" name="hinh" id="productimage" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <button type="button" class="btn btn-outline-primary" style="margin-left: 12px !important">
                    <a href="<?= ROOT_URL . "admin/product" ?>" style="color: var(--darkGreen-02)">Cancle</a>
                </button>
                <button type="submit" class="btn btn-primary" style="margin-left: 12px !important">Add Product</button>
            </div>
        </div>
    </form>
</div>