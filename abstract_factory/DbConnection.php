<?php

namespace App\abstract_factory;

use PDO;

class DbConnection
{
  public static function getConnection(): PDO
  {
    $dsn = 'mysql:host=localhost;dbname=php_design_pattern;charset=utf8mb4';
    $user = 'root';
    $pass = '';
    return new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  }
}
