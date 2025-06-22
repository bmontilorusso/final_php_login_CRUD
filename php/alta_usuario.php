<?php

// ALTA DE USUARIOS:

// Importaciones:
include('conexion_DB.php');

// Declaración de variables:
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$nuevoUsuario = $_POST['nuevoUsuario'];
$nuevaPass = $_POST['nuevaPass'];

// Generación de la Query:
$sql = "INSERT INTO USUARIOS (NOMBRE, APELLIDO, MAIL, USUARIO, PASS, ID_CARGO, HABILITADO) VALUES ('$nombre', '$apellido', '$mail', '$nuevoUsuario', '$nuevaPass', 1, 'SI');";

// Resultado:
$resultado = mysqli_query($conn, $sql);

// Validación de éxito en creación:
if ($resultado) {
    session_start();
    $_SESSION['nuevoUsuario'] = $nuevoUsuario;
    header("Location: home.php");
    exit();
} else {
    echo "Error al hacer alta: " . mysqli_error($conn);
}

?>