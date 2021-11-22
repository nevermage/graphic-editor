<?php

namespace Classes;

class Database
{
    private $pdo;
    public function __construct()
    {
        $dsn = 'mysql:dbname=testTask;host=127.0.0.1';
        $user = 'root';
        $password = 'Password1!';
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