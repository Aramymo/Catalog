<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\NodeHandler;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(empty($_POST['node_name']))
    {
        $aboba = NodeHandler::testNameCheck("EMPTY TEXT");
        echo $aboba;
    }
    else
    {
        $aboba = NodeHandler::testNameCheck($_POST['node_name']);
        echo $aboba;
    }
}