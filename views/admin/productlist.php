<?php

$prods = Product::find_all_products($pageNum, $pageSize);


?>


<div id="productlist pd">
    <div class="pd-title d-flex align-items-center">
        <div class="pd-title-text h1"><?= $pageTitle ?></div>
        <a class="text-white ms-auto" href="<?= ROOT_URL . "admin/productadd" ?>"><button class="btn btn-primary" style="width: 200px;" type="button">Add Product</button></a>
    </div>
    <div class="pd-content mt-40">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Name</th>
                    <th scope="col">Catelogy</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prods as $prod) : ?>
                    <?php $cat = Catelogy::get_catelogy_by_id($prod->id_loai) ?>
                    <tr>
                        <td><?= $prod->ten_sp ?></td>
                        <td><?= $cat->ten_loai ?></td>
                        <td><?= number_format($prod->gia, 0, "", ".") . " VND" ?></td>
                        <td><?= number_format($prod->gia_km, 0, "", ".") . " VND" ?></td>
                        <td><?= $prod->ngay ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a class="me-3" href="<?= ROOT_URL . "admin/productedit?id_sp=" . $prod->id_sp ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?= ROOT_URL . "admin/productdelete?id_sp=" . $prod->id_sp ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>