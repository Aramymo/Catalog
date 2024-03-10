<?php

namespace Catalog;

require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';

use Catalog\ConnectDB;

use ErrorException;

class NodeHandler
{
    const MAX_NEST_LEVEL = 3;
    //Создание нового узла
    /**
     * Создаёт новый узел в зависимости от $node_id
     * если $node_id = null - создастся корневой элемент
     * иначе создастся дочерний элемент для элемента с $node_id
     * @param string $node_name
     * @param mixed $node_id
     * 
     * @return string
     */
    public static function createNode(string $node_name, mixed $node_id) : string
    {
        try
        {
            static::validateNode($node_name, $node_id);
            //Если запись не найдена
            if($node_id === "null")
            {
                //Если корневой элемент
                $stmt = ConnectDB::prepare('INSERT INTO categories(name,parent_id)
                                    VALUES (:node_name, NULL)');
                if(!$stmt)
                {
                    return "Ошибка подключения";
                }
                $stmt->bindParam(':node_name', $node_name);
            }
            else
            {
                //Если подкатегория
                $stmt = ConnectDB::prepare('INSERT INTO categories(name,parent_id)
                                    VALUES (:node_name, :node_id)');
                $stmt->bindParam(':node_name', $node_name);
                $stmt->bindParam(':node_id', $node_id);
            }
            $stmt->execute();
            $node_name = $node_name." добавлен";
            return $node_name;
        }
        catch(ErrorException $e)
        {
            return $e->getMessage();
        }
    }

    //Получение всех узлов
    /**
     * Возвращает все элемменты в базе данных в виде их актуальных связей с родительскими элементами
     * @return array
     */
    public static function getNodes() : array
    {
        $stmt = ConnectDB::prepare('WITH RECURSIVE Tree AS (
            SELECT id, name, parent_id FROM categories WHERE parent_id IS NULL
            UNION ALL
            SELECT c.id, c.name, c.parent_id FROM categories c
            JOIN Tree t ON c.parent_id = t.id
            )
            SELECT * FROM Tree;');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Удаленяет узел с $node_id и всех его потомков
     * @param mixed $node_id
     * 
     * @return string
     */
    public static function deleteNode(mixed $node_id) : string
    {
        $stmt = ConnectDB::prepare('DELETE FROM categories WHERE id = :element_id;');
        $stmt->bindParam(':element_id', $node_id);
        $stmt->execute();
        $result = "Категория и все её подкатегории удалены";
        return $result;
    }

    /**
     * Проверяет $node_name на уникальность и $node_id на уровень вложенности
     * @param string $node_name
     * @param mixed $node_id
     * 
     * @throws ErrorException
     */
    protected static function validateNode(string $node_name, mixed $node_id)
    {
        $stmt = ConnectDB::prepare('SELECT COUNT(name) FROM categories
                                    WHERE name = :node_name');
        $stmt->bindParam(':node_name', $node_name);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count > 0)
        {
            //Если запись найдена
            $message = $node_name." уже существует";
            throw new ErrorException($message);
        }

        $stmt = ConnectDB::prepare('WITH RECURSIVE category_path (id, name, lvl) AS ( 
            SELECT id, name, 0 lvl 
            FROM categories WHERE parent_id IS NULL 
            UNION ALL 
            SELECT c.id, c.name,cp.lvl + 1 FROM category_path AS cp JOIN categories AS c 
            ON cp.id = c.parent_id ) 
            SELECT lvl FROM category_path WHERE id = :node_id;');
        $stmt->bindParam(':node_id', $node_id);
        $stmt->execute();
        $current_node_nest_level = $stmt->fetch();
        if (!isset($current_node_nest_level["lvl"])) 
        {
            $current_node_nest_level["lvl"] = 0;
        }
        else if($current_node_nest_level["lvl"] >= static::MAX_NEST_LEVEL - 1)
        {
            $message = "Уровень вложенности превысил ". static::MAX_NEST_LEVEL;
            throw new ErrorException($message);
        }
    }
}