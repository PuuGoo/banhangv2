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

    public function verifyLogin($user)
    {
        $this->is_signed_in();
        if (!is_array($user)) {
            redirect("admin/login");
        } else {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['hoten'] = $user['hoten'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['vaitro'] = $user['vaitro'];
            if ($user['vaitro'] == 1) {
                redirect("admin");
            } else {
                redirect("");
            }
        }
    }

    public function is_signed_in()
    {
        $this->check_login();
        return $this->signed_in;
    }

    private function check_login()
    {
        if (isset($_SESSION['id_user'])) {
            $this->id_user  = $_SESSION['id_user'];
            $this->signed_in = true;
        } else {
            unset($this->id_user);
            $this->signed_in = false;
        }
    }
}
