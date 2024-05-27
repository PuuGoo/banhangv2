<?php
class User extends Database
{
    public static function create_user($fullname, $email, $password_encryption)
    {
        $sql = "INSERT INTO users SET ";
        $sql .= "hoten =:ht, ";
        $sql .= "email=:em, ";
        $sql .= "matkhau=:mk ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":ht", $fullname, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $password_encryption, PDO::PARAM_STR);
        $stmt->execute();
        $id_user = self::$conn->lastInsertId();
        return $id_user;
    }

    public static function checkuser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email=:em";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if ($recordnum != 1) return "Email not Exist!";
        $user = $stmt->fetch();
        $password_encryption = $user['matkhau'];
        if (password_verify($password, $password_encryption) == false) return "Password not Match";
        else return $user;
    } //checkuser

    public static function changepass($email, $newPassword)
    {
        $sql = "UPDATE users SET ";
        $sql .= "matkhau = :mk ";
        $sql .= "WHERE email=:em";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $newPassword, PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if ($recordnum != 1) return "Update not Successfully!";
        else return true;
    } //changepass
}
