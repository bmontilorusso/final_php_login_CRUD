<?php

// LOGIN

// Importaciones:
include('conexion_DB.php');

// Creación y asignación de variables:
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Creación de QUERY SQL:
$sql = "Select * from USUARIOS Where USUARIO = '$usuario' AND PASS = '$pass';";

$resultado = mysqli_query($conn, $sql);

// Validación de las credenciales recibidas:
if (mysqli_num_rows($resultado) == 1) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: home.html");
    exit();
} else {
    echo "Usuario y/o Contraseña incorrecta.";
}

?>
