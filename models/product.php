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
        return self::find_this_query($sql);
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
