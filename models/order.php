<?php


class Order extends Database
{

    public static function create_order($hoten, $email, $diachi, $dienthoai)
    {
        $sql = "INSERT INTO donhang SET ";
        $sql .= "hoten = :hoten, ";
        $sql .= "email = :email, ";
        $sql .= "diachi = :diachi, ";
        $sql .= "dienthoai = :dienthoai ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":hoten", $hoten, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":diachi", $diachi, PDO::PARAM_STR);
        $stmt->bindParam(":dienthoai", $dienthoai, PDO::PARAM_STR);
        $stmt->execute();
        $id_dh  = self::$conn->lastInsertId();
        return $id_dh;
    }

    public static function create_order_detail($id_dh)
    {
        foreach ($_SESSION['cart'] as $id_sp => $quantity) {
            if (isset($_SESSION['checkbox'][$id_sp]) && $_SESSION['checkbox'][$id_sp] == "true") {
                $product = new Product;
                $pro = Product::find_product_by_id($id_sp);
                $sql = "INSERT INTO donhangchitiet SET ";
                $sql .= "id_dh = :id_dh, ";
                $sql .= "id_sp = :id_sp, ";
                $sql .= "ten_sp = :ten_sp, ";
                $sql .= "soluong = :soluong, ";
                $sql .= "gia = :gia ";
                $stmt = self::$conn->prepare($sql);
                $stmt->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
                $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
                $stmt->bindParam(":ten_sp", $pro->ten_sp, PDO::PARAM_STR);
                $stmt->bindParam(":soluong", $quantity, PDO::PARAM_INT);
                $stmt->bindParam(":gia", $pro->gia, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }
}
