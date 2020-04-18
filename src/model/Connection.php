<?php

class Connection {
    private static $instance;
    public static function getConn() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new \PDO('mysql:host=localhost;dbname=crud_pdo;charset=utf8','root', '');
            }
    
            return self::$instance;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}

