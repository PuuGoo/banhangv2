<?php



class AdminController
{

    public function index()
    {
        $this->checkLoginAdmin();
        $pageTitle = "Dashboard";
        $contentView = "views/admin/dashboard.php";
        include "views/admin/layout.php";
    }

    public function login()
    {
        global $session;
        if ($session->is_signed_in()) {
            redirect("");
        }
        $pageTitle = "Admin Login Page";
        $contentView = "views/admin/login.php";
        include "views/admin/layout.php";
    }

    public function login_()
    {


        $validator = new Validator($_POST);
        $errors = $validator->validateFormAdminLogin();

        if (empty($errors)) {
            global $session;
            $email = trim(strip_tags($_POST['email']));
            $matkhau = trim(strip_tags($_POST['matkhau']));

            $user = User::checkuser($email, $matkhau);
            $session->verifyLogin($user);
        } else {
            $pageTitle = "Admin Login Page";
            $contentView = "views/admin/login.php";
            include "views/admin/layout.php";
        }
    }

    public static function logout()
    {
        unset($_SESSION['id_user'], $_SESSION['email'], $_SESSION['hoten'], $_SESSION['vaitro'], $_SESSION['back']);
        redirect("admin/login");
    }

    private function checkLoginAdmin()
    {
        if (isset($_SESSION['vaitro']) && $_SESSION['vaitro'] == 1) {
            if (isset($_SESSION['back'])) {
                header("location" . $_SESSION['back']);
            }
        } else {
            redirect("admin/login");
        }
    }
}

$adminController = new AdminController;
