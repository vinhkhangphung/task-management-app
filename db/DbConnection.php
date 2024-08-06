<?php

namespace DB;
require_once 'db/DDL.php';

use Dotenv\Dotenv;
use PDO;

class DbConnection
{
    private $pdo;

    function __destruct()
    {
        $this->pdo = null;
    }

    protected function connect(): PDO
    {
        if (!isset($this->pdo)) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->safeLoad();
            $this->pdo = new PDO(
                "mysql:host={$_ENV['SERVERNAME']};dbname={$_ENV['DBNAME']}",
                $_ENV['USERNAME'],
                $_ENV['PASSWORD'],
                array(
                    PDO::ATTR_PERSISTENT => true
                )
            );
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->pdo;
    }
}
