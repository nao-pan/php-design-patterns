<?php

namespace App\abstract_factory;

use PDO;

class DbConnection
{
  public static function getConnection(): PDO
  {
    $dsn = 'mysql:host=localhost;dbname=your_db;charset=utf8mb4';
    $user = 'root';
    $pass = '';
    return new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  }
}
