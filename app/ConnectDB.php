<?php

namespace Catalog;

use PDO;

class ConnectDB
{
    private static $instance = null;
    private $connection = null;

    protected function __construct()
    {
        if ($this->connection == null) 
        {
            //Подключение к БД
            $ini_array = parse_ini_file($_SERVER["DOCUMENT_ROOT"].'/config.ini');

            $this->connection = new \PDO(
                "mysql:host={$ini_array["DB_host"]};dbname=catalog",
                $ini_array["DB_login"], $ini_array["DB_password"],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
        }
    }

    public static function getInstance(): ConnectDB
    {
        //Проверка наличия подключения
        if (null === self::$instance)
        {
            //Создание объекта, если подключения нет
            self::$instance = new static();
        }
        
        return self::$instance;
    }

    public static function connect(): \PDO
    {
        //Проверка подключения
        return static::getInstance()->connection;
    }

    public static function prepare(string $statement): \PDOStatement
    {
        //Подготовка запроса
        return static::connect()->prepare($statement);
    }
}