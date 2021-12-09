<?php

namespace Classes;

class Database
{
    private $pdo;
    public function __construct()
    {
        $connection = getenv('DB_CONNECTION');
        $host = getenv('DB_HOST');
        $db = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $dsn = "$connection:dbname=$db;host=$host";
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->exec('SET NAMES UTF8');
    }
    public function query(string $sql): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute();
        if (false === $result) {
            return null;
        }
        return $sth->fetchAll();
    }
}