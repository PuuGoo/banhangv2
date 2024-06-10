<?php
ob_start();
require_once "models/config.php";
include_once "models/functions.php";
include_once "controllers/page.php";
include_once "controllers/userController.php";
include_once "controllers/productController.php";
include_once "controllers/catelogyController.php";



$database = new Database;
$product = new Product;
$catelogy = new Catelogy;
$order = new Order;
$user = new User;


$baseDir = "/banhangv2/";

$router = [
    'get' => [
        '' => [$page, 'index'],
        'productdetail' => [$page, 'product_detail'],
        'catelogy' => [$page, 'catelogy'],
        'addtocart' => [$page, 'addtocart'],
        'showcart' => [$page, 'showcart'],
        'checkout' => [$page, 'checkout'],
        'admin' => [$page, 'admin'],
        'signin' => [$userController, 'signin'],
        'signup' => [$userController, 'signup'],
        'changepass' => [$userController, 'changepass'],
        'logout' => [$userController, 'logout'],
        'admin/product' => [$productController, 'index'],
        'admin/productadd' => [$productController, 'add'],
        'admin/productedit' => [$productController, 'edit'],
        'admin/productdelete' => [$productController, 'delete'],
        'admin/catelogy' => [$catelogyController, 'index'],
        'admin/catelogyadd' => [$catelogyController, 'add'],
        'admin/catelogyedit' => [$catelogyController, 'edit'],
        'admin/catelogydelete' => [$catelogyController, 'delete'],
    ],
    'post' => [
        'checkout_' => [$page, 'checkout_'],
        'signup_' => [$userController, 'signup_'],
        'signin_' => [$userController, 'signin_'],
        'changepass_' => [$userController, 'changepass_'],
        'submit' => [$page, 'submit'],
        'admin/productadd_' => [$productController, 'add_'],
        'admin/productedit_' => [$productController, 'edit_'],
        'admin/catelogyadd_' => [$catelogyController, 'add_'],
        'admin/catelogyedit_' => [$catelogyController, 'edit_'],

    ]
];

$REQUEST_URI = $_SERVER['REQUEST_URI'];
$METHOD = strtolower($_SERVER['REQUEST_METHOD']);
$QUERY_STRING = $_SERVER['QUERY_STRING'];
$path = substr($REQUEST_URI, strlen($baseDir));
$arr = explode("?", $path);
$route = strtolower($arr[0]);
if (count($arr) >= 2) {
    parse_str($arr[1], $params);
} else {
    $params = [];
}
if (!array_key_exists($METHOD, $router)) {
    die("Method: {$METHOD} not found!");
}

if (!array_key_exists($route, $router[$METHOD])) {
    die("Route: {$route} not found!");
}
$action = $router[$METHOD][$route];

$session = new Session;

call_user_func($action);


// session_destroy();
