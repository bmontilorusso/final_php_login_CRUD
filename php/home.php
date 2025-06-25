<?php
    include('validacion_sesion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <!-- Enlaces internos -->
    <link rel="icon" type="img/png" href="../img/ico/ico_32.png">
    <link rel="preload" href="../css/styles.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/styles.css" as="style">

    <!-- Enlaces externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="body">

    <main class="main">
        <div class="home-lateral-izquirdo">
            
            <div class="iconos-home">
                <img src="../img/btn/new.png" alt="Nuevo_trámite">
                <p>Nuevo Trámite</p>
            </div>
            <div class="iconos-home">
                <img src="../img/btn/saved.png" alt="Consultar_trámite">
                <p>Consultar Trámite</p>
            </div>
            <div class="iconos-home">
                <img src="../img/btn/settings.png" alt="Ajustes_cuenta">
                <p>Ajustes de Cuenta</p>
            </div>
        </div>

        <div class="home-lateral-derecho">
            <!-- Mensaje de Bienvenida! -->
            <div class="bienvenido oculto">
                <h2>Bienvenid@</h2>
            </div>
            <!-- Formulario de Nuevo Trámite -->
            <div class="nuevo-tramite oculto">
                <h2>Nuevo Trámite</h2>
                <form class="nuevo-tramite-form" action="nuevo-tramite.php" method="POST">                    
                    <label for="">Nro de Siniestro</label>
                    <input name="nroSiniestro" placeholder="Ingrese Número de Stro" type="number" autocomplete="off" required>
                    <label for="">Cliente</label>
                    <input name="cliente" placeholder="Nombre y Apellido del cliente" type="text" autocomplete="off" required>
                    <label for="">Vahículo</label>
                    <input name="vehiculo" placeholder="Marca y modelo del auto" type="text" autocomplete="off">
                    <label for="">Dominio</label>
                    <input name="dominio" placeholder="Ingrese" type="text" autocomplete="off" required>
                    <label for="">F15</label>
                    <input name="f15" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Baja Fiscal</label>
                    <input name="bajaFiscal" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Baja GNC</label>
                    <input name="bajaGNC" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Jurisdicción</label>
                    <input name="jurisdiccion" type="" autocomplete="off" required>
                    <label for="">Fecha del trámite</label>
                    <input name="fechaTramite" type="date" autocomplete="off" required>
                    <label for="">Importe</label>
                    <input name="importe" placeholder="Valor en PesosAS" type="number" autocomplete="off" required>
                    <label for="">Estado</label>
                    <input name="estado" type="text" autocomplete="off" required>

                    <button class="boton">Cargar datos</button>

                </form>

            </div>

            <!-- Mensaje de Consulta de Trámite -->
            <div class="consultar-tramite visible">
                <div class="barra-superior-consultar-tramite">
                    <h2>Mis támites</h2>                    
                    <img src="../img/btn/close.png" alt="cerrar">
                </div>
                <div class="tabla">
                    <?php
                        include('conexion_db.php');
                        $id_usuario = $_SESSION['id_usuario'];

                        $sql = "SELECT * FROM TRAMITES WHERE ID_USUARIO = '$id_usuario';";

                        $resultado = mysqli_query($conn, $sql);
                    ?>
                    
                    <div class="encabezado-tabla">Nro Siniestro</div>
                    <div class="encabezado-tabla">Cliente</div>
                    <div class="encabezado-tabla">Vehículo</div>
                    <div class="encabezado-tabla">Dominio</div>
                    <div class="encabezado-tabla">F15</div>
                    <div class="encabezado-tabla">Baja Fiscal</div>
                    <div class="encabezado-tabla">Baja GNC Enargas</div>
                    <div class="encabezado-tabla">Jurisdicción</div>
                    <div class="encabezado-tabla">Estado Trámite</div>
                    <div class="encabezado-tabla">Fecha Trámite</div>
                    <div class="encabezado-tabla">Importe ($)</div>

                    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                        <div class="registros"> <?php echo $fila['NRO_SINIESTRO']?> </div>
                        <div class="registros"> <?php echo $fila['ASEGURADO']?> </div>
                        <div class="registros"> <?php echo $fila['VEHICULO']?> </div>
                        <div class="registros"> <?php echo $fila['DOMINIO_PATENTE']?> </div>
                        <div class="registros"> <?php echo $fila['F15']?> </div>
                        <div class="registros"> <?php echo $fila['BAJA_FISCAL']?> </div>
                        <div class="registros"> <?php echo $fila['BAJA_GNC_ENARGAS']?> </div>
                        <div class="registros"> <?php echo $fila['ID_JURISDICCION']?> </div>
                        <div class="registros"> <?php echo $fila['ID_ESTADO_TRAMITE']?> </div>
                        <div class="registros"> <?php echo $fila['FECHA_TRAMITE']?> </div>
                        <div class="registros"> <?php echo $fila['IMPORTE_TRAMITE']?> </div>
                    <?php endwhile; ?>

                </div>
            </div>

            <!-- Mensaje de Ajustes de Cuenta -->
            <div class="ajustes-cuenta">
                
            </div>
        </div>

    </main>

    
    <!-- Script de JS: -->
    <script src="../js/script.js"></script>
</body>
</html>