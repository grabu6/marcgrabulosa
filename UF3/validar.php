<?php
include('utils.php');


$correuCorrecte=false;
$consulta=$connexio->prepare("SELECT nom, email, contrasenya FROM identificats");
$consulta-> execute();

foreach($consulta as $row){
    if($row['email']==$_POST['email'] && $row['contrasenya']==md5($_POST['password'])){
                header("location:hola.php");
    }else{
        $correuCorrecte=true;
    }
}

if($correuCorrecte==true){
    include("index.php");
    ?>
    <h3>Dades incorrectes!</h3>
    <?php
}
    
    
