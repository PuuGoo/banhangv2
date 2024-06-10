<?php

class Product extends Database
{
    public $id_sp;
    public $id_loai;
    public $ten_sp;
    public $gia;
    public $gia_km;
    public $hinh;
    public $ngay;
    public $soluotxem;
    public $hot;
    public $anhien;
    public $mota;
    public static function FeaturedProduct($proNum = 8)
    {
        $sql = "SELECT * FROM sanpham WHERE hot = 1 ORDER BY ngay DESC LIMIT 0 , $proNum";
        return self::find_this_query($sql);
    }

    public static function MostViewProduct($proNum = 8)
    {
        $sql = "SELECT * FROM sanpham ORDER BY soluotxem DESC LIMIT 0, $proNum";
        return self::find_this_query($sql);
    }

    public static function find_product_by_id($id_sp = 0)
    {
        $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_product_by_idCatelogy($id_loai = 0, $pageNum = 1, $pageSize = 12)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham WHERE id_loai = $id_loai ORDER BY ngay DESC LIMIT $startRow, $pageSize";
        return self::find_this_query($sql);
    }

    public static function count_product_by_idCatelogy($id_loai = 0)
    {

        $sql = "SELECT COUNT(id_sp) as dem FROM sanpham WHERE id_loai = $id_loai";
        $result = self::query($sql);
        return $result->fetch();
    }

    public static function find_all_products($pageNum = 1, $pageSize = 12)
    {

        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT $startRow, $pageSize";
        return self::find_this_query($sql);
    }

    public static function product_add($ten_sp, $ngay, $gia, $gia_km, $id_loai, $anhien, $hot, $mota, $hinh)
    {
        $sql = "INSERT INTO sanpham SET ";
        $sql .= "ten_sp=:ten_sp, ";
        $sql .= "ngay=:ngay, ";
        $sql .= "gia=:gia, ";
        $sql .= "gia_km=:gia_km, ";
        $sql .= "id_loai=:id_loai, ";
        $sql .= "anhien=:anhien, ";
        $sql .= "hot=:hot, ";
        $sql .= "mota=:mota, ";
        $sql .= "hinh=:hinh ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->execute();
        $id_sp = self::$conn->lastInsertId();
        return $id_sp;
    }

    public static function product_update($id_sp, $ten_sp, $ngay, $gia, $gia_km, $id_loai, $anhien, $hot, $mota, $hinh)
    {
        $sql = "UPDATE sanpham SET ";
        $sql .= "ten_sp=:ten_sp, ";
        $sql .= "ngay=:ngay, ";
        $sql .= "gia=:gia, ";
        $sql .= "gia_km=:gia_km, ";
        $sql .= "id_loai=:id_loai, ";
        $sql .= "anhien=:anhien, ";
        $sql .= "hot=:hot, ";
        $sql .= "mota=:mota, ";
        $sql .= "hinh=:hinh ";
        $sql .= "WHERE id_sp=:id_sp ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    public static function product_delete($id_sp)
    {
        $sql = "DELETE FROM sanpham ";
        $sql .= "WHERE id_sp=:id_sp ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function find_this_query($sql)
    {
        try {
            $result = self::$conn->query($sql);

            $the_object_array = array();

            foreach ($result as $row) {
                $the_object_array[] = self::instantation($row);
            }

            return $the_object_array;
        } catch (Exception $e) {
            die("Query Failed" . $e->getMessage() . "<br>" . $sql);
        }
    }

    public static function instantation($the_record)
    {
        $the_object = new self;
        $the_property_array = get_object_vars($the_object);
        foreach ($the_record as $the_attribute => $value) {
            if (array_key_exists($the_attribute, $the_property_array)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }
}
