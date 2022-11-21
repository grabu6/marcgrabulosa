<?php

$numeros = array(1,3,5,4,8);

function factorial($numeros){

    if($numeros>=2){
        return ($numeros * factorial($numeros - 1));
        }else{
            return true;
        }
}

function factorialArray($numero){

    return factorial($numero);
}

foreach($numeros as $numero){

    if(!is_int($numero)){
        return false;
    }
    else if($numero<0){
        return false;
    }
    else{
        echo number_format(factorialArray($numero),0,'','') . "\n";
    }
}

?>