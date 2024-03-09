<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\NodeHandler;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if($_POST['form_type'] === 'add_node')
    {
        if(!empty($_POST['node_name']))
        {
            $data['name'] = NodeHandler::createNode($_POST['node_name'],$_POST["node_list"]);
        }
        header('Content-Type: application/json; charset=utf-8');
    }
    elseif($_POST['form_type'] === 'delete_node')
    {
        $data['name'] = NodeHandler::deleteNode($_POST['node_list']);
    }
    echo json_encode($data);
}
if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $nodes = NodeHandler::getNodes();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($nodes);
}