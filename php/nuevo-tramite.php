<?php

// NUEVO TRÁMITE

// Importaciones:
session_start();
include('conexion_DB.php');
include('validacion_sesion.php');

// Declaración de variables:

// Desde el home (limpios):
$nroSiniestro = $_POST['nroSiniestro'];
$cliente = $_POST['cliente'];
$vehiculo = $_POST['vehiculo'];
$dominio = $_POST['dominio'];
$jurisdiccion = $_POST['jurisdiccion'];
$fechaTramite = $_POST['fechaTramite'];
$importe = $_POST['importe'];
$estado = $_POST['estado'];
// Para ajustar (Checks):
$f15 = isset($_POST['f15']) ? $_POST['f15'] : 'NO';
$bajaFiscal = isset($_POST['bajaFiscal']) ? $_POST['bajaFiscal'] : 'NO';
$bajaGNC = isset($_POST['bajaGNC']) ? $_POST['bajaGNC'] : 'NO';
// Los que arrastro con $_SESSION:
$idUsuario = $_SESSION['id_usuario'];

// Generación de Query:
$sql = "INSERT INTO TRAMITES (NRO_SINIESTRO, ASEGURADO, VEHICULO, DOMINIO_PATENTE, F15, BAJA_FISCAL, BAJA_GNC_ENARGAS, ID_JURISDICCION, FECHA_TRAMITE, IMPORTE_TRAMITE, ID_ESTADO_TRAMITE, ID_USUARIO) VALUES ('$nroSiniestro','$cliente','$vehiculo','$dominio','$f15','$bajaFiscal','$bajaGNC','$jurisdiccion','$fechaTramite','$importe','$estado','$idUsuario');";

// Resultado:
$resultado = mysqli_query($conn, $sql);

// Validación de Inserción exitosa:
if ($resultado) {
    echo "Alta exitosa";
} else {
    echo "Erro al hacer alta: " . mysqli_error($conn);
}


?>