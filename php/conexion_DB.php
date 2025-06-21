<?php

// CONEXIÓN A LA BASE DE DATOS:

// Parámetros de Entrada para la conexión:

$servidor = 'localhost';
$usuerioServidor = 'root';
$passServidor = '';
$nombreDB = 'final_php_login_CRUD';

// Creación de Conexión:

$conn = mysqli_connect($servidor, $usuerioServidor, $passServidor, $nombreDB);

// Validación de Conexión Exitosa:
if (!$conn) {
    die ("Error en la conexión, debido a: " . mysqli_connect_error());
}

?>