<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\NodeHandler;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Проверка типа формы
    if($_POST['form_type'] === 'add_node')
    {
        if(!empty($_POST['node_name']))
        {
            $data['message'] = NodeHandler::createNode($_POST['node_name'],$_POST["node_list"]);
        }
        else
        {
            $data['message'] = "Введите имя";
        }
    }
    elseif($_POST['form_type'] === 'delete_node')
    {
        $data['message'] = NodeHandler::deleteNode($_POST['node_list']);
    }
    else
    {
        $data['message'] = "Неизвестный тип формы";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $nodes = NodeHandler::getNodes();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($nodes);
}