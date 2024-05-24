<?php


class Session
{
    private $exist_cart_product_id = false;
    public $id_sp;
    public $quantity;

    public function __construct()
    {
        session_start();
    }

    public function is_exist_cart_product_id()
    {
        $this->check_exist_cart_product_id();
        return $this->exist_cart_product_id;
    }

    private function check_exist_cart_product_id()
    {
        global $params;
        $this->id_sp = $params['id_sp'];
        $this->quantity = (int)$params['quantity'];
        if (isset($_SESSION['cart'][$this->id_sp])) {
            $this->quantity = $_SESSION['cart'][$this->id_sp] + $this->quantity;
            $this->exist_cart_product_id = true;
        }
        $_SESSION['cart'][$this->id_sp] = $this->quantity;
        $this->exist_cart_product_id = true;
    }
}
