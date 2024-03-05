<?php
class ConnectDB
{
    private static $instance = null;
    private $connection = null;

    protected function __construct()
    {
        if ($this->connection == null) {
            //Подключение к БД
            $this->connection = new \PDO(
                "mysql:host=localhost;dbname=catalog",
                "root", "",
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

    public static function prepare($statement): \PDOStatement
    {
        //Подготовка запроса
        return static::connect()->prepare($statement);
    }
}