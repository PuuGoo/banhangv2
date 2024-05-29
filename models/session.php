<?php


class Session
{
    private $exist_cart_product_id = false;
    public $id_sp;
    public $quantity;
    public $id_user;
    private $signed_in = false;

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
    public function is_signed_in()
    {
        $this->check_login();
        return $this->signed_in;
    }

    private function check_login()
    {
        if (isset($_SESSION['id_user'])) {
            $this->user_id = $_SESSION['id_user'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}
