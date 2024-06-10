<?php

$cat = Catelogy::get_catelogy_by_id($id_loai);

?>

<div id="productlist pd">
    <div class="pd-title d-flex align-items-center">
        <div class="pd-title-text h1"><?= $pageTitle ?></div>
    </div>
    <form action="<?= ROOT_URL . "admin/catelogyedit_" ?>" method="post" enctype="multipart/form-data">
        <div class="pd-content mt-40">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Catelogy Name</label>
                    <input type="text" name="ten_loai" id="" class="form-control w-100" placeholder="Please type catelogy name" value="<?= $cat->ten_loai ?>">
                </div>
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Number</label>
                    <input type="number" name="thutu" id="" class="form-control w-100" value="<?= $cat->thutu ?>">
                </div>
            </div>
            <div class=" row mt-3">
                <div class="col-6">
                    <div class="col-12 h2">Show/hide Catelogy:</div>
                    <div class="col">
                        <div class="form-check">
                            <input type="radio" name="anhien" id="hide" class="form-check-input" value="0" <?= $cat->anhien == 0 ? "checked" : "" ?>>
                            <label for="hide" class="form-check-label mb-2">Hide</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="anhien" id="hide" class="form-check-input" value="1" <?= $cat->anhien == 1 ? "checked" : "" ?>>
                            <label for="hide" class="form-check-label mb-2">Show</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <input type="hidden" name="id_loai" value="<?php echo $cat->id_loai ?>">
                <button type="button" class="btn btn-outline-primary" style="margin-left: 12px !important">
                    <a href="<?= ROOT_URL . "admin/catelogy" ?>" style="color: var(--darkGreen-02)">Cancle</a>
                </button>
                <button type="submit" class="btn btn-primary" style="margin-left: 12px !important">Update Product</button>
            </div>
        </div>
    </form>
</div>