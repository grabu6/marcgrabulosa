<?php 

function calcul(&$resultat, &$screen){
    $regExp = "/^[0-9()+-.*\/sinco]*$/";
    if (preg_match($regExp, $screen)) {
        try{
            eval("\$screen = $screen;"); # evalua una string com a code PHP
            $resultat = round($screen,4); # la funció round fa que s'arrodoneixi a 4 decimals com a màxim
        }catch(DivisionByZeroError $err){ 
            $resultat = "∞"; # ens dona infinit si la divisó ha estat per 0
        }catch(\throwable $err){
            $resultat = "ERROR";
        } 
    }else{
        $resultat = "ERROR";
    }  
}
/*
* la funció preg_match compara la string amb l'expressió regular
* @arr $resultat (per referencia) -> el nou valor donat + el que es visualitza a la pantalla
*  modifica la variable $resultat (nou valor de la pantalla)
*/

function donarValor(&$resultat, &$screen){
    if (isset($_REQUEST['valor'])) {
        $resultat = $screen.$_REQUEST['valor']; #concatena si s'entra un nou valor
    }else if (isset($_REQUEST['equal'])) { # si es dona click a l'igual envia a la function calcul()
        calcul($resultat,$screen);
    }
}

function veurePerPantalla(&$screen){
    if (isset($_REQUEST['pantalla'])) {
        if($_REQUEST['pantalla'] != ""){
            $screen = $_REQUEST['pantalla'];
        }
    }
}
/*
* si està declarat i no és null s'agafa el value
* @arr $screen (per referencia) -> el que surt per pantalla
*/
function start(){
    veurePerPantalla($screen);
    donarValor($resultat, $screen);
    return $resultat;
}

$resultat = start();

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="calculadoraCSS.css" />
    <title>Calculadora</title>
</head>
<body>
    <div class="container">
        <form name="calc" class="calculator" action="calculadoraPHP.php" method="get">
            <input type="text" class="value" name="pantalla" readonly value="<?php echo $resultat;  ?>" />
            <span class="num clear"><input type ="submit" value="C"></span>
            <span class="num"><input type ="submit" value="(" name="valor"></span>
            <span class="num"><input type ="submit" value=")" name="valor"></span>
            <span class="num"><input type ="submit" value="sin" name="valor"></span>
            <span class="num"><input type ="submit" value="cos" name="valor"></span>
            <span class="num"><input type ="submit" value="/" name="valor"></span>
            <span class="num"><input type ="submit" value="*" name="valor"></span>
            <span class="num"><input type ="submit" value="7" name="valor"></span>
            <span class="num"><input type ="submit" value="8" name="valor"></span>
            <span class="num"><input type ="submit" value="9" name="valor"></span>
            <span class="num"><input type ="submit" value="-" name="valor"></span>
            <span class="num"><input type ="submit" value="4" name="valor"></span>
            <span class="num"><input type ="submit" value="5" name="valor"></span>
            <span class="num"><input type ="submit" value="6" name="valor"></span>
            <span class="num plus"><input type ="submit" value="+" name="valor"></span>
            <span class="num"><input type ="submit" value="1" name="valor"></span>
            <span class="num"><input type ="submit" value="2" name="valor"></span>
            <span class="num"><input type ="submit" value="3" name="valor"></span>
            <span class="num"><input type ="submit" value="0" name="valor"></span>
            <span class="num"><input type ="submit" value="00" name="valor"></span>
            <span class="num"><input type ="submit" value="." name="valor"></span>
            <span class="num equal"><input type ="submit" value="=" name="equal"></span>
        </form>
    </div>
</body>