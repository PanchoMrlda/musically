<?php

class Db
{

  const DB_SERVER = '127.0.0.1';
  const DB_NAME = 'musically';
  const DB_USER = 'root';
  const DB_PASSWORD = 'root';

  protected static $db = null;
  private function __construct()
  {
    try {
      self::$db = new PDO('mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
      die();
    }
  }

  public static function getConnection()
  {
    if (!self::$db) {
      new DB();
    }
    return self::$db;
  }
}
