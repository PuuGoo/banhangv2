<?php

class Catelogy extends Database
{
    public $id_loai;
    public $ten_loai;
    public $thutu;
    public $anhien;
    public static function get_all_catelogies()
    {
        $sql = "SELECT * FROM loai WHERE anhien = 1 ORDER BY thutu";

        return self::find_this_query($sql);
    }

    public static function find_all_catelogies($pageNum = 1, $pageSize = 12)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM loai ORDER BY thutu DESC LIMIT $startRow, $pageSize";

        return self::find_this_query($sql);
    }

    public static function get_catelogy_by_id($id_loai = 0)
    {
        $sql = "SELECT * FROM loai WHERE id_loai = $id_loai ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function catelogy_add($ten_loai, $thutu, $anhien)
    {
        $sql = "INSERT INTO loai SET ";
        $sql .= "ten_loai=:ten_loai, ";
        $sql .= "thutu=:thutu, ";
        $sql .= "anhien=:anhien ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":ten_loai", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":thutu", $thutu, PDO::PARAM_INT);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->execute();
        $id_sp = self::$conn->lastInsertId();
        return $id_sp;
    }

    public static function catelogy_update($id_loai, $ten_loai, $thutu, $anhien)
    {
        $sql = "UPDATE loai SET ";
        $sql .= "ten_loai=:ten_loai, ";
        $sql .= "thutu=:thutu, ";
        $sql .= "anhien=:anhien ";
        $sql .= "WHERE id_loai=:id_loai ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":ten_loai", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":thutu", $thutu, PDO::PARAM_INT);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function catelogy_delete($id_loai)
    {
        $sql = "DELETE FROM loai ";
        $sql .= "WHERE id_loai=:id_loai ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
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
