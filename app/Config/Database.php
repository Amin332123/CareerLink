<?php

namespace App\Config;

use Dotenv\Dotenv;
use PDO;
use Throwable;

class Database
{
    private static ?Database $instance = null;
    private $pdo;

    private function __construct()
    {
        try {
            Dotenv::createImmutable(__DIR__ . '/../../')->load();
            $this->pdo = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['NAME']};", $_ENV['USER'], $_ENV['PASSWORD']);
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function getConnection()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
