<?php

class Connection
{
  private static $instance;
  private static $user = 'root';
  private static $pass = '';

  public static function getConnection()
  {
    try {
      !self::$instance ?
        self::$instance = new \PDO('mysql:host=localhost;dbname=loja', self::$user, self::$pass) : false;
      return self::$instance;
    } catch (\PDOException $err) {
      $err->getMessage();
    }
  }
}
