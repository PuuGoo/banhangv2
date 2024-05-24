<?php
ob_start();
require_once "models/config.php";
include_once "models/functions.php";
include_once "controllers/page.php";


$database = new Database;
$product = new Product;
$catelogy = new Catelogy;


$baseDir = "/banhangv2/";

$router = [
    'get' => [
        '' => [$page, 'index'],
        'productdetail' => [$page, 'product_detail'],
        'catelogy' => [$page, 'catelogy'],
        'addtocart' => [$page, 'addtocart'],
        'showcart' => [$page, 'showcart']
    ],
    'post' => [
        'login' => [$page, 'login']
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
