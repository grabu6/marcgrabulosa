<?php
//Configuració de l'algoritme d'encriptació
//Has de canviar aquesta cadena, ha de ser llarga i única
//ningú més ha de conèixer-la
$clave  = 'Hola Josep em dic Josep i sóc un home amb poders';
//Mètode d'encriptació
$method = 'aes-256-cbc';
// Pots generar una diferent usant la funcio $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 /*
Encripta el contingut de la variable, enviada com a paràmetre.  
*/
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
/*
 Desencripta el texto recibido
 */
$desencriptar = function ($valor) use ($method, $clave, $iv) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv);
};
/*
Genera un valor para IV
*/
$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};
