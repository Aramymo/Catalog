<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
    require_once '../Catalog/app/model/ConnectDB.php';
        $test = ConnectDB::prepare("SELECT * FROM categories;");
        if(isset($test) && !empty($test))
        {
            echo "connected";
        }
        else{
            echo "connection error";
        }
    ?>
    </body>
</html>