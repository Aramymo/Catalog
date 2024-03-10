<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\ConnectDB;
class NodeHandler
{
    //Создание нового узла
    public static function createNode($node_name, $node_id)
    {
        //Проверка на наличие записи
        $stmt = ConnectDB::prepare('SELECT COUNT(name) FROM catalog.categories
                                    WHERE name = :node_name');
        $stmt->bindParam(':node_name', $node_name);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count > 0)
        {
            //Если запись найдена
            return $node_name." уже существует";
        }
        else
        {
            //Если запись не найдена
            if($node_id === "null")
            {
                //Если корневой элемент
                $stmt = ConnectDB::prepare('INSERT INTO catalog.categories(name,parent_id)
                                    VALUES (:node_name, NULL)');
                $stmt->bindParam(':node_name', $node_name);
            }
            else
            {
                //Если подкатегория
                $stmt = ConnectDB::prepare('INSERT INTO catalog.categories(name,parent_id)
                                    VALUES (:node_name, :node_id)');
                $stmt->bindParam(':node_name', $node_name);
                $stmt->bindParam(':node_id', $node_id);
            }
            $stmt->execute();
            $node_name = $node_name." добавлен";
            return $node_name;
        }
    }

    //Получение всех узлов
    public static function getNodes()
    {
        //Запрос работает в таком виде, что результат будет
        //в виде удобного массива структурой
        //Корневой элемент
        //--Подэлемент
        //----Подэлемент
        //----Подэлемент
        //--Подэлемент
        //Корневой элемент...
        $stmt = ConnectDB::prepare('WITH RECURSIVE Tree AS (
            SELECT id, name, parent_id FROM catalog.categories WHERE parent_id IS NULL
            UNION ALL
            SELECT c.id, c.name, c.parent_id FROM catalog.categories c
            JOIN Tree t ON c.parent_id = t.id
            )
            SELECT * FROM Tree;');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    //Удаление узла и его подузлов
    public static function deleteNode($node_id)
    {
        $stmt = ConnectDB::prepare('DELETE FROM catalog.categories WHERE id = :element_id;');
        $stmt->bindParam(':element_id', $node_id);
        $stmt->execute();
        $result = "Категория и все её подкатегории удалены";
        return $result;
    }
}