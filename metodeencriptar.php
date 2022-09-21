<?php
include "metodeencriptacio.php";
// Com utilitzar les funcions per encriptar i desencriptar.
$dato = "Hola Josep maragall";
//Encripta informació:
$dato_encriptado = $encriptar($dato);
//Desencripta informació:
$dato_desencriptado = $desencriptar($dato_encriptado);
echo 'Dato encriptado: '. $dato_encriptado . '<br>';
echo 'Dato desencriptado: '. $dato_desencriptado . '<br>';
echo "IV generado: " . $getIV();