<?php

class ProductController
{
    public function index()
    {
        global $params;
        $pageSize = 12;
        $pageNum = isset($params['page']) ? $params['page'] : 1;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $pageTitle = "Product List";
        $contentView = "views/admin/productlist.php";
        include "views/admin/layout.php";
    }

    public function add()
    {

        $pageTitle = "Product Add";
        $contentView = "views/admin/productadd.php";
        include "views/admin/layout.php";
    }

    public function add_()
    {
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $gia = (int) $_POST['gia'];
        $gia_km = (int) $_POST['gia_km'];
        $id_loai = (int) $_POST['id_loai'];
        $anhien = (int) $_POST['anhien'];
        $hot = (int) $_POST['hot'];
        $mota =  $_POST['mota'];
        $hinh = $_FILES['hinh'];
        $image_name = $hinh['name'];
        $image_name_tempt = $hinh['tmp_name'];
        move_uploaded_file($image_name_tempt, explode("controllers", __DIR__)[0] . "\\public\images\\" . $image_name);
        $id_sp = Product::product_add($ten_sp, $ngay, $gia, $gia_km, $id_loai, $anhien, $hot, $mota, $image_name);
        redirect("admin/product");
    }

    public function edit()
    {
        global $params;
        $id_sp = $params['id_sp'];
        $pageTitle = "Product Edit";
        $contentView = "views/admin/productedit.php";
        include "views/admin/layout.php";
    }

    public function edit_()
    {
        $id_sp = (int) $_POST['id_sp'];
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $gia = (int) $_POST['gia'];
        $gia_km = (int) $_POST['gia_km'];
        $id_loai = (int) $_POST['id_loai'];
        $anhien = (int) $_POST['anhien'];
        $hot = (int) $_POST['hot'];
        $mota =  $_POST['mota'];
        $hinh = $_FILES['hinh'];
        $image_name = $hinh['name'];
        $image_name_tempt = $hinh['tmp_name'];

        if (empty($image_name)) {
            $image_name = Product::find_product_by_id($id_sp)->hinh;
        }
        move_uploaded_file($image_name_tempt, explode("controllers", __DIR__)[0] . "\\public\images\\" . $image_name);
        Product::product_update($id_sp, $ten_sp, $ngay, $gia, $gia_km, $id_loai, $anhien, $hot, $mota, $hinh);
        redirect("admin/productedit?id_sp={$id_sp}");
    }

    public function delete()
    {
        global $params;
        $id_sp = $params['id_sp'];
        Product::product_delete($id_sp);
        redirect("admin/product");
    }
}

$productController = new ProductController;
