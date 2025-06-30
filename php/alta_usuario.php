<?php

// ALTA DE USUARIOS:

// Limpieza de sesiones previas:
session_start();
session_unset();
session_abort();

// Importaciones:
include('conexion_DB.php');

// Declaración de variables:
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$mail = trim($_POST['mail']);
$nuevoUsuario = trim($_POST['nuevoUsuario']);
$nuevaPass = trim($_POST['nuevaPass']);

// Generación de la Querys:
$sql = "INSERT INTO USUARIOS (NOMBRE, APELLIDO, MAIL, USUARIO, PASS, ID_CARGO, HABILITADO) VALUES ('$nombre', '$apellido', '$mail', '$nuevoUsuario', '$nuevaPass', 1, 'SI');";
$idNuevo = "Select * from USUARIOS Where USUARIO = '$nuevoUsuario' AND PASS = '$nuevaPass';";

// Resultados:
$resultado = mysqli_query($conn, $sql); // Para alta.
$resultadoID = mysqli_query($conn, $idNuevo); // Para ID.

// Validación de éxito en creación:
if ($resultado) {

    session_start();
    $_SESSION['usuario'] = $nuevoUsuario;

    //Almacenamiento del ID_USUARIO:
    $fila = mysqli_fetch_assoc($resultadoID);
    $_SESSION['id_usuario'] = $fila['ID_USUARIO'];

    // redireccionamiento:
    header("Location: home.php");
    exit();

} else {
    echo "Error al hacer alta: " . mysqli_error($conn);
}

?>