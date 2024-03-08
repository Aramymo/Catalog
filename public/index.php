<!DOCTYPE html>
<html>
    <head>
        <!--bootstrap для css!-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!--bootstrap для js!-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--action="../app/Controller.php"!-->
        <form method ="POST" id="create-node">
            Node name: <input type="text" name="node_name" id="node_name"><br>
            <input type="submit">
        </form>
        <div id="node_message"></div>
        <script> <?php include __DIR__ .'/../src/scripts/jquery-3.7.1.js'?></script>
        <script> <?php include __DIR__ . '/../src/scripts/send_new_node.js'?></script>
    </body>
</html>