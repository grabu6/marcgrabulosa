<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
    <body>

<?php

signup();

function signup(){
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $nom=$_POST["nom"];
        $correu=$_POST["correu"];
        $contrasenya=$_POST["contrasenya"];

        $dades=array('nom'=>$nom, 'correu'=>$correu, 'contrasenya'=>$contrasenya);

        $json_dades=json_encode($dades);
        $file='users.json';
        file_put_contents($file,$json_dades);
    }else{

    }
    return $dades;
}

function signin(){
   include_once "users.json";

   $dades=signup();
   $rebo_dades=($_SERVER['REQUEST_METHOD']=='POST');
   $dades_ok =  $rebo_dades &&
   isset( $_POST['correu'] ) &&
   isset( $_POST['contrasenya']);

   if($rebo_dades){

    if($dades_ok){
        $usuari=$_POST['nom'];
        header("Location: hola.php?usuari=$usuari");
        die();
    }
   }
}
?>
    </body>
</html>