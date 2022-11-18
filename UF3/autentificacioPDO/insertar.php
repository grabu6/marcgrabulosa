<?php
include("utils.php");

if(isset($_POST['register'])){
    if(strlen($_POST["name"]) >= 1 && strlen($_POST["email"]) >= 1 && strlen($_POST["password"])>= 1){
        $nom= trim($_POST['name']);
        $correu= trim($_POST['email']);
        $password=md5(trim($_POST['password']));
        $consulta1=$connexio->prepare("SELECT nom, usuari, contrasenya FROM identificats");
        $consulta1-> execute();

        foreach($consulta1 as $row){

            if($row['usuari']==$_POST['email']){
                ?>
                <h3>Error! Usuari ja introduit !!!</h3>
                <?php
            }else{
                $consulta2=$connexio->prepare("INSERT INTO identificats(nom, usuari, contrasenya) VALUES (?,?,?)");
                $consulta2->execute(array($nom,$correu,$password));
                ?>
                <h3>T'has inscrit correctament!</h3>
    
                <?php
            } 
        }

     } else{
        ?>
        <h3>Completi els camps correctament!</h3>
        <?php
    }
}
?>
