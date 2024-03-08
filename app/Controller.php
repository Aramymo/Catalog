<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\NodeHandler;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!empty($_POST['node_name']))
    {
        $data['name'] = NodeHandler::createRootNode($_POST['node_name']);
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