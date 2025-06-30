<?php

// Ajustes de la cuenta del Usuario:

// Importaciones:
session_start();
include('conexion_DB.php');
include('validacion_sesion.php');

// Lo que arrastro con $_SESSION:
$idUsuario = $_SESSION['id_usuario'];

// Validación de existencia de datos previos (DP):

$sql_DP = "Select * from USUARIOS Where ID_USUARIO = '$idUsuario';";

$resultado_DP = mysqli_query($conn, $sql_DP);

$filaDatosPrevios = mysqli_fetch_assoc($resultado_DP);

// Comparación de Datos Previos vs Datos ingresados por el Usuario:
// Declaración de Variables:

if (empty($_POST['nombre'])) {
    $nombre = $filaDatosPrevios["NOMBRE"];
} else {
    $nombre = $_POST['nombre'];
}

if (empty($_POST['apellido'])) {
    $apellido = $filaDatosPrevios["APELLIDO"];
} else {
    $apellido = $_POST['apellido'];
}

if (empty($_POST['fechaNacimiento'])) {
    $fechaNacimiento = $filaDatosPrevios["FECHA_NACIMIENTO"];
} else {
    $fechaNacimiento = $_POST['fechaNacimiento'];
}

if (empty($_POST['mail'])) {
    $mail = $filaDatosPrevios["MAIL"];
} else {
    $mail = $_POST['mail'];
}

if (empty($_POST['telefono'])) {
    $telefono = $filaDatosPrevios["TELEFONO"];
} else {
    $telefono = $_POST['telefono'];
}

if (empty($_POST['usuario'])) {
    $usuario = $filaDatosPrevios["USUARIO"];
} else {
    $usuario = $_POST['usuario'];
}

if (empty($_POST['pass'])) {
    $pass = $filaDatosPrevios["PASS"];
} else {
    $pass = $_POST['pass'];
}

if (empty($_POST['IDcargo'])) {
    $IDcargo = $filaDatosPrevios["ID_CARGO"];
} else {
    $IDcargo = $_POST['IDCargo'];
}

// Actualización de datos:

// Generación de Query:
$sql = "UPDATE USUARIOS SET NOMBRE = '$nombre', APELLIDO = '$apellido', FECHA_NACIMIENTO = '$fechaNacimiento', MAIL = '$mail', TELEFONO = '$telefono', USUARIO = '$usuario', PASS = '$pass', ID_CARGO = '$IDcargo' WHERE ID_USUARIO = $idUsuario;";

// Resultado y aplicación:
$resultado = mysqli_query($conn, $sql);

// Validación de UPDATE exitoso:

if ($resultado) {
    echo "Modificación exitosa";
} else {
    echo "Error al intentar modificar: " . mysqli_error($conn);
}






?>