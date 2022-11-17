<?php
include("utils.php");

if(isset($_POST['register'])){
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["email"]) >= 1 && strlen($_POST["password"])>= 1){
        $nom= trim($_POST['name']);
        $correu= trim($_POST['email']);
        $password=md5(trim($_POST['password']));
        $consulta=$connexio->prepare("INSERT INTO comptes(nom, email, contrasenya) VALUES (?,?,?)");
        $consulta->execute(array($nom,$correu,$password));

        if($consulta){
            ?>
            <h3>T'has inscrit correctament!</h3>

            <?php
        }else{
            ?>
            <h3>Error!</h3>
            <?php
        }

     } else{
        ?>
        <h3>Completi els camps correctament!</h3>
        <?php
    }
}
?>
