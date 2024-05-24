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

    public static function get_catelogy_by_id($id_loai = 0)
    {
        $sql = "SELECT * FROM loai WHERE id_loai = $id_loai ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
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
