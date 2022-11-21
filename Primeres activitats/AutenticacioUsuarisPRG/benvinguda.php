<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Comanda IF </title>
    </head>
    <body>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' )
        {
            echo "<h1>Benvigut " . $_GET["usuari"] . "!</h1>";
        }
        
        ?>

    </body>
</html>