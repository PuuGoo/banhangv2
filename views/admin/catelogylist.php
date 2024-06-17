<?php

$cats = Catelogy::find_all_catelogies($pageNum, $pageSize);


?>


<div id="productlist pd">
    <div class="pd-title d-flex align-items-center">
        <div class="pd-title-text h1"><?= $pageTitle ?></div>
        <a class="text-white ms-auto" href="<?= ROOT_URL . "admin/catelogyadd" ?>"><button class="btn btn-primary" style="width: 200px;" type="button">Add Catelogy</button></a>
    </div>
    <div class="pd-content mt-40">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Show/Hide</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="position-relative">
                <?php foreach ($cats as $cat) : ?>
                    <?php $cat = Catelogy::get_catelogy_by_id($cat->id_loai) ?>
                    <tr>
                        <td><?= $cat->ten_loai ?></td>
                        <td><?= $cat->thutu ?></td>
                        <td><?= $cat->anhien ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a class="me-3" href="<?= ROOT_URL . "admin/catelogyedit?id_loai=" . $cat->id_loai ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a id="delete_cat" href="<?= ROOT_URL . "admin/catelogydelete?id_loai=" . $cat->id_loai ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <div class="verify position-absolute d-none">
                    Are you sure want to delete this item?
                    <div class="verify-buttons d-flex mt-3">
                        <button class="btn btn-outline-primary me-2">Cancel</button>
                        <button class="btn btn-primary"><a href="<?= ROOT_URL . "admin/catelogydelete?id_loai=" . $cat->id_loai ?>">Delete</a></button>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
</div>