<?php

class Page
{

    public function index()
    {
        $proNum = 12;
        // $featuredProduct = $fp = Product::FeaturedProduct($proNum);
        // $mostViewProduct = $mvp = Product::MostViewProduct($proNum);
        // $cats = Catelogy::get_all_catelogies();
        $pageTitle = "Home";
        $view = "home.php";
        include "views/layout.php";
    }

    public function catelogy()
    {
        global $params;
        $id_loai = $params['id_loai'];
        $pageNum = isset($params['page']) == true ? $params['page'] : 1;
        $pageSize = 12;
        $prePage = $pageNum - 1;
        $nextPage = $pageNum + 1;
        $proNumByIdCat = Product::count_product_by_idCatelogy($id_loai)['dem'];
        $pageTotal = ceil($proNumByIdCat / $pageSize);
        $cat = Catelogy::get_catelogy_by_id($id_loai);
        $catelogyProduct = $cp = Product::find_product_by_idCatelogy($id_loai, $pageNum, $pageSize);
        $pageTitle = $cat->ten_loai;
        $view = "catelogyProduct.php";
        include "views/layout.php";
    }

    public function product_detail()
    {
        global $params;
        // $productDetail = $pd = Product::find_product_by_id($params['id_sp']);
        $pageTitle = "Product Detail";
        $view = "productDetail.php";
        include "views/layout.php";
    }

    public function addtocart()
    {
        global $session;
        if ($session->is_exist_cart_product_id()) {
            redirect("showcart");
        }
    }

    public function showcart()
    {
        if (!isset($_SESSION['cart'])) {
            $pageTitle = "Empty Cart";
            $view = "showCart_empty.php";
            include "views/layout.php";
        } else {
            $pageTitle = "Cart";
            $view = "showCart.php";
            include "views/layout.php";
        }
    }

    public function submit()
    {
        include "views/submit.php";
    }


    public function checkout()
    {

        $pageTitle = "Checkout";
        $view = "checkout.php";
        include "views/layout.php";
    }

    public function checkout_()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validateForm();

        if (empty($errors)) {
            $hoten = trim(strip_tags($_POST['hoten']));
            $email = trim(strip_tags($_POST['email']));
            $diachi = trim(strip_tags($_POST['diachi']));
            $dienthoai = trim(strip_tags($_POST['dienthoai']));
            $id_dh  = Order::create_order($hoten, $email, $diachi, $dienthoai);
            Order::create_order_detail($id_dh);

            unset($_SESSION['cart'], $_SESSION['checkbox']);

            $pageTitle = "Save Successfully";
            $view = "mesOrder.php";
            include "views/layout.php";
        } else {
            $pageTitle = "Checkout";
            $view = "checkout.php";
            include "views/layout.php";
        }
    }

    public function admin()
    {
        $pageTitle = "Dashboard";
        $contentView = "views/admin/dashboard.php";
        include "views/admin/layout.php";
    }
}
$page = new Page;
