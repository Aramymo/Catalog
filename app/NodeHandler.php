<?php
namespace Catalog;
require_once '../vendor/autoload.php';
use Catalog\ConnectDB;
class NodeHandler
{
    public static function testNameCheck($name)
    {
        $test = ConnectDB::prepare("SELECT * FROM categories;");
        echo "name $name from NodeHandler";
        $name = $name . "+abobus";
        return $name;
    }
}