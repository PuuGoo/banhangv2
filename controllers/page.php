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

    public function login()
    {

        echo "This Is Login Page";
    }
}
$page = new Page;
