<?php

class DBContext {

    private static $dsn = 'mysql:host=localhost;dbname=book_db3';
    private static $username = 'admin';
    private static $password = 'pass@word';
    private static $db;
    public static $error_msg;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                self::$error_msg = $e->getMessage();
                include('views/db_error.php');
                exit();
            }
        }
        return self::$db;
    }

    public static function displayDBError($error_message) {
        self::$error_msg = $error_message;
        include('views/db_error.php');
        exit();
    }

}

?>
