<?php

namespace App\Classes;

class Database
{
    public $pdo;

    public function __construct(){
        $this->pdo = new \PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
}