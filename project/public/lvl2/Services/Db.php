<?php

namespace Services;

class Db
{
    private static $instancesCount = 0;
    private static $instance;
    private \PDO $pdo;

    public function __construct()
    {
        self::$instancesCount++;

        $dsn = "pgsql:host=postgres;port=5432;dbname=root;";
        $this->pdo = new \PDO($dsn, 'root', 'root');

        if ($this->pdo) {
            // echo "Connected to the database successfully!";
        }
    }

    public function query(string $sql, $params = [], string $className = 'stdClass') :?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if(false === $result)
        {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}