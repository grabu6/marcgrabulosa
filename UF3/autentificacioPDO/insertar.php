<?php
include("utils.php");

if(isset($_POST['register'])){
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["email"]) >= 1 && strlen($_POST["password"])>= 1){
        $nom= trim($_POST['name']);
        $correu= trim($_POST['email']);
        $password=md5(trim($_POST['password']));
        $consulta=$connexio->prepare("INSERT INTO identificats(nom, usuari, contrasenya) VALUES (?,?,?)");

        foreach($consulta as $row){

            if($row['usuari']==$_POST['email']){
                ?>
                <h3>Error! Usuari ja introduit !!!</h3>
                <?php
            }else{
                $consulta->execute(array($nom,$correu,$password));
            }
        }



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
