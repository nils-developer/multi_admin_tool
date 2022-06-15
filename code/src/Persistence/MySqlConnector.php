<?php

namespace App\Persistence;

use PDO;
use Exception;

class MySqlConnector
{

  private PDO $connection;

  public function __construct()
  {
    try {
      $dbConfig = [
        'host' => 'localhost',
        'dbname' => '',
        'user' => 'admin',
        'password' => 'admin'
      ];

      $dsn = 'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'];

      $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
      $this->connection = $pdo;

    } catch (Exception $e) 
    {
      throw new Exception($e->getMessage());
    }
  }

  public function getConnection()
  {
    return $this->connection;
  }
}