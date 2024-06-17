<div id="productlist pd">
    <div class="pd-title d-flex align-items-center">
        <div class="pd-title-text h1"><?= $pageTitle ?></div>
    </div>
    <form action="<?= ROOT_URL . "admin/catelogyadd_" ?>" method="post" enctype="multipart/form-data">
        <div class="pd-content mt-40">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Catelogy Name</label>
                    <input type="text" name="ten_loai" id="" class="form-control w-100" placeholder="Please type catelogy name" value="<?= isset($_POST['ten_loai']) ? htmlspecialchars($_POST['ten_loai']) : false ?>">
                    <?php if (isset($errors['ten_loai'])) : ?>
                        <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['ten_loai']) ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <label for="" class="form-label h2 mb-2">Number</label>
                    <input type="number" name="thutu" id="" class="form-control w-100" value="<?= isset($_POST['ten_loai']) ? htmlspecialchars($_POST['thutu']) : false ?>">
                    <?php if (isset($errors['thutu'])) : ?>
                        <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['thutu']) ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="col-12 h2">Show/hide Catelogy:</div>
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
            </div>
            <div class="row mt-3">
                <button type="button" class="btn btn-outline-primary" style="margin-left: 12px !important">
                    <a href="<?= ROOT_URL . "admin/catelogy" ?>" style="color: var(--darkGreen-02)">Cancle</a>
                </button>
                <button type="submit" class="btn btn-primary" style="margin-left: 12px !important">Add Catelogy</button>
            </div>
        </div>
    </form>
</div>