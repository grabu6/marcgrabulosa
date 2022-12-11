<?php
try {
    $hostname = "localhost";
    $dbname = "admin";
    $username = "dwes-user";
    $pw = "dwes-pass";
    $connexio = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

  if(isset($_POST['register'])){
    if(strlen($_POST["name"])>= 1 && strlen($_POST["password"])>= 1){
        $nom= trim($_POST['name']);
        $password=md5(trim($_POST['password']));
        $consulta1=$connexio->prepare("SELECT nom, contrasenya FROM compte");
        $consulta1-> execute();

        foreach($consulta1 as $row){

            if($row['nom']==$_POST['name']){
                ?>
                <h3>Error! Usuari ja introduit !!!</h3>
                <?php
            }else{
                $consulta2=$connexio->prepare("INSERT INTO compte(nom, contrasenya) VALUES (?,?)");
                $consulta2->execute(array($nom,$password));
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
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Concurs Internacional de Gossos d'Atura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper medium">
    <header>ADMINISTRADOR - Concurs Internacional de Gossos d'Atura</header>
    <div class="admin">
        <div class="admin-row">
            <h1> Resultat parcial: Fase 1 </h1>
            <div class="gossos">
            <img class="dog" alt="Musclo" title="Musclo 15%" src="img/g1.png">
            <img class="dog" alt="Jingo" title="Jingo 45%" src="img/g2.png">
            <img class="dog" alt="Xuia" title="Xuia 4%" src="img/g3.png">
            <img class="dog" alt="Bruc" title="Bruc 3%" src="img/g4.png">
            <img class="dog" alt="Mango" title="Mango 13%" src="img/g5.png">
            <img class="dog" alt="Fluski" title="Fluski 12 %" src="img/g6.png">
            <img class="dog" alt="Fonoll" title="Fonoll 5%" src="img/g7.png">
            <img class="dog" alt="Swing" title="Swing 2%" src="img/g8.png">
            <img class="dog eliminat" alt="Coloma" title="Coloma 1%" src="img/g9.png"></div>
        </div>
        <div class="admin-row">
            <h1> Nou usuari: </h1>
            <form method="post">
                <input type="text" name="name" placeholder="Nom">
                <input type="password" name="password" placeholder="Contrasenya">
                <input type="button" name="register" value="Crea usuari">
            </form>
        </div>
        <div class="admin-row">
            <h1> Fases: </h1>
            <form class="fase-row">
                Fase <input type="text" value="1" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="2" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="3" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="4" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="5" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="6" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="7" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

            <form class="fase-row">
                Fase <input type="text" value="8" disabled style="width: 3em">
                del <input type="date" placeholder="Inici">
                al <input type="date" placeholder="Fi">
                <input type="button" value="Modifica">
            </form>

        </div>

        <div class="admin-row">
            <h1> Concursants: </h1>
            <form>
                <input type="text" placeholder="Nom" value="Musclo">
                <input type="text" placeholder="Imatge" value="img/g1.png">
                <input type="text" placeholder="Amo" value="Joan Pere Arnau">
                <input type="text" placeholder="Raça" value="Husky Siberià">
                <input type="button" value="Modifica">
            </form>

            <form>
                <input type="text" placeholder="Nom">
                <input type="text" placeholder="Imatge">
                <input type="text" placeholder="Amo">
                <input type="text" placeholder="Raça">
                <input type="button" value="Afegeix">
            </form>
        </div>

        <div class="admin-row">
            <h1> Altres operacions: </h1>
            <form>
                Esborra els vots de la fase
                <input type="number" placeholder="Fase" value="">
                <input type="button" value="Esborra">
            </form>
            <form>
                Esborra tots els vots
                <input type="button" value="Esborra">
            </form>
        </div>
    </div>
</div>

</body>
</html>
