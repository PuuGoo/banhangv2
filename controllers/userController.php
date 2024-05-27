<?php


class UserController
{
    public function signup()
    {

        $pageTitle = "Sign Up";
        $view = "signUp.php";
        include "views/layout.php";
    }

    public static function signup_()
    {
        $fullname = trim(strip_tags($_POST['fullname']));
        $email = trim(strip_tags($_POST['email']));
        $password = trim(strip_tags($_POST['password']));
        $password_encryption = password_hash($password, PASSWORD_BCRYPT);
        $id_user = User::create_user($fullname, $email, $password_encryption);
        $pageTitle = "Save Successfully";
        $view = "mesSignUp.php";
        include "views/layout.php";
    }

    public function signin()
    {

        $pageTitle = "Sign In";
        $view = "signIn.php";
        include "views/layout.php";
    }

    public static function signin_()
    {
        $email = trim(strip_tags($_POST['email']));
        $password = trim(strip_tags($_POST['password']));
        $result = User::checkuser($email, $password);

        if (is_array($result) == true) { //thành công
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['hoten'] = $result['hoten'];
            $_SESSION['email'] = $result['email'];
            $pageTitle = "Save Successfully";
            $view = "mesSignIn.php";
            include "views/layout.php";
        } else { //không thành công
            echo $result;
        }
    }



    public function changepass()
    {

        $pageTitle = "Change Pass";
        $view = "changePass.php";
        include "views/layout.php";
    }

    public static function changepass_()
    {

        $email = $_SESSION['email'];
        $oldPassword = trim(strip_tags($_POST['oldPassword']));
        $result = User::checkuser($email, $oldPassword);
        if (is_string($result) == true) { //pass cũ không đúng
            echo $result;
            return;
        }
        $newPassword = trim(strip_tags($_POST['newPassword']));
        $confirmNewPassword = trim(strip_tags($_POST['confirmNewPassword']));
        if ($newPassword != $confirmNewPassword) {
            echo "Old and New Password Not Match";
            return;
        }
        $pass_encryption = password_hash($newPassword, PASSWORD_BCRYPT);
        $result = User::changepass($email, $pass_encryption);
        if (is_string($result) == true) {
            echo $result;
            return;
        }
        $pageTitle = "Change Pass";
        $view = "mesChangePass.php";
        include "views/layout.php";
    }
}

$userController = new UserController;
