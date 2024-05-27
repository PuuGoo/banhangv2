<?php


class Order extends Database
{

    public static function create_order($fullname, $email, $address, $mobileNumber)
    {
        $sql = "INSERT INTO donhang SET ";
        $sql .= "hoten = :fn, ";
        $sql .= "email = :em, ";
        $sql .= "diachi = :ad, ";
        $sql .= "dienthoai = :mn ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":fn", $fullname, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":ad", $address, PDO::PARAM_STR);
        $stmt->bindParam(":mn", $mobileNumber, PDO::PARAM_STR);
        $stmt->execute();
        $order_id = self::$conn->lastInsertId();
        return $order_id;
    }

    public static function create_order_detail($order_id)
    {
        foreach ($_SESSION['cart'] as $id_sp => $quantity) {
            $product = new Product;
            $pro = Product::find_product_by_id($id_sp);
            $sql = "INSERT INTO donhangchitiet SET ";
            $sql .= "id_dh = :o_id, ";
            $sql .= "id_sp = :id_sp, ";
            $sql .= "ten_sp = :pn, ";
            $sql .= "soluong = :q, ";
            $sql .= "gia = :p ";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":o_id", $order_id, PDO::PARAM_INT);
            $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
            $stmt->bindParam(":pn", $pro->ten_sp, PDO::PARAM_STR);
            $stmt->bindParam(":q", $quantity, PDO::PARAM_INT);
            $stmt->bindParam(":p", $pro->gia, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
}
