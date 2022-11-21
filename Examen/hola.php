<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Benvingut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

</head>
<body>
<div class="container noheight" id="container">
    <div class="welcome-container">
        <?php
           if ($_SERVER['REQUEST_METHOD'] == 'GET' )
           {
               echo "<h1>Benvigut " . $_GET["usuari"] . "!</h1>";
           }
           
        ?>
        <div>Hola Aniol, les teves darreres connexions són:</div>
        <form action="#">
            <button>Tanca la sessió</button>
        </form>
    </div>
</div>
</body>
</html>