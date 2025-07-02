<?php

// LOGIN

// Importaciones:
include('conexion_DB.php');

// Creación y asignación de variables:
$usuario = trim($_POST['usuario']);
$pass = $_POST['pass']; // Estoy en duda si usar trim para el pass (consultar a los profes).

// Creación de QUERY SQL:
$sql = "Select * from USUARIOS Where BINARY USUARIO = '$usuario' AND BINARY PASS = '$pass';";

$resultado = mysqli_query($conn, $sql);

// Validación de las credenciales recibidas:
if (mysqli_num_rows($resultado) == 1) {

    // Registro de la sesión:
    session_start();
    $_SESSION['usuario'] = $usuario;

    //Almacenamiento del ID_USUARIO y el NOMBRE del Usuario:
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['id_usuario'] = $fila['ID_USUARIO'];
    $_SESSION['nombre'] = $fila['NOMBRE'];
    $_SESSION['apellido'] = $fila['APELLIDO'];

    //Redireccionamiento:
    header("Location: home.php");
    exit();

} else {
    
    echo "Usuario y/o Contraseña incorrecta.";
}

?>
