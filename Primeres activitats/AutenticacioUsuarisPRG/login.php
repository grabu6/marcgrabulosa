<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formularis</title>
</head>

<body>
    <div style="margin: 30px 10%;">
    
    <?php
    include_once "dades.php";
    
    $rebo_dades = ( $_SERVER['REQUEST_METHOD'] == 'POST' );
     $dades_ok =  $rebo_dades &&
                  isset( $_REQUEST['usuari'] ) &&
                  array_key_exists( $_REQUEST['usuari'], $usuaris ) &&
                  isset( $_REQUEST['passwd'] ) &&
                  $usuaris[$_REQUEST['usuari']] == $_REQUEST['passwd'];
                  
    //si he rebut dades llavors
    if ($rebo_dades){
        //si les_dades_estan_be llavors
        if ($dades_ok){
            //redirecció
            $usuari = $_REQUEST['usuari'];
            header("Location: benvinguda.php?usuari=$usuari");
            die();
        }
    }
    
    //Pintem el formulari
    ?>
    
    <h3>Login</h3>
    <form action="" method="post">
        <label for="usuari">Usuari</label>
        <input type='text' name='usuari' >
        <label for="passwd">Password</label>
        <input type='passwd' name='passwd'>
        <input type='submit' name='Entrar'>
    </form>

    
</div>
           
</body>
</html>