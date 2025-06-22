<?php

// NUEVO TRÁMITE

// Importaciones:
include('conexion_DB.php');
include('login.php');

// ID Usuario logueado:
$usuarioLogueado = "Select ID_USUARIO from USUARIOS Where USUARIO = '$usuario' AND PASS = '$pass';";

// Declaración de variables:
$nroSiniestro = $_POST['nroSiniestro'];
$cliente = $_POST['cliente'];
$vehiculo = $_POST['vehiculo'];
$dominio = $_POST['dominio'];
$f15 = $_POST['f15'];
$bajaFiscal = $_POST['bajaFiscal'];
$bajaGNC = $_POST['bajaGNC'];
$jurisdiccion = $_POST['jurisdiccion'];
$fechaTramite = $_POST['fechaTramite'];
$importe = $_POST['importe'];
$estado = $_POST['estado'];

// Generación de Query:
$sql = "INSERT INTO TRAMITES (NRO_SINIESTRO, ASEGURADO, VEHICULO, DOMINIO_PATENTE, F15, BAJA_FISCAL, BAJA_GNC_ENARGAS, ID_JURISDICCION, FECHA_TRAMITE, IMPORTE_TRAMITE, ID_ESTADO_TRAMITE, ID_USUARIO) VALUES ('$nroSiniestro','$cliente','$vehiculo','$dominio','$f15','$bajaFiscal','$bajaGNC','$jurisdiccion','$fechaTramite','$importe','$estado','$usuarioLogueado');";

// Resultado:
$resultado = mysqli_query($conn, $sql);

// Validación de Inserción exitosa:
if ($resultado) {
    echo "Alta exitosa";
} else {
    echo "Erro al hacer alta: " . mysqli_error($conn);
}



?>