<?php

class Database
{
    protected static $conn = null;

    public function __construct()
    {
        $this->open_db_connection();
    }
    private function open_db_connection()
    {

        try {
            $dsn = "mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . "; charset=utf8;port=3306";
            self::$conn = new PDO($dsn, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die("Database Connect Failed" . $e->getMessage());
        }
    }

    public static function query($sql)
    {
        try {
            $result = self::$conn->query($sql);

            return $result;
        } catch (Exception $e) {
            die("Query Failed" . $e->getMessage() . "<br>" . $sql);
        }
    }
}
