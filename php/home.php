<?php
    include('validacion_sesion.php');
    include('conexion_DB.php');
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
            
            <div id="boton-nuevo-tramite" class="iconos-home">
                <img src="../img/btn/new.png" alt="Nuevo_trámite">
                <p>Nuevo Trámite</p>
            </div>
            <div id="boton-consulta-tramite" class="iconos-home">
                <img src="../img/btn/saved.png" alt="Consultar_trámite">
                <p>Consultar Trámite</p>
            </div>
            <div id="boton-ajustes-usuario" class="iconos-home">
                <img src="../img/btn/user.png" alt="Ajustes_cuenta">
                <p>Ajustes de Cuenta</p>
            </div>
        </div>

        <div class="home-lateral-derecho">
            <div id="avatar-cerrar-sesion" class="avatar-cerrar-sesion oculto">
                <h2 class="nombre-usuario"> <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?> </h2>
                <div id="boton-salir" class="iconos-ACS">
                    <img class="cerrar-sesion" src="../img/btn/close.png" alt="cerrar_sesion">
                    <p>Salir</p>
                </div>
            </div>
            <!-- Mensaje de Bienvenida! -->
            <div id="form-bienvenido" class="bienvenido visible">
                <h2>Bienvenid@, <span class="span"><?php echo $_SESSION['nombre'] ?></span> </h2>
            </div> <!-- Fin Mensaje de Bienvenida -->

            <!-- Formulario de Nuevo Trámite -->
            <div id="form-nuevo-tramite" class="nuevo-tramite oculto">
                <h2 class="titulo-seccion">Nuevo <span class="span">Trámite</span></h2>
                <form class="nuevo-tramite-form" id="nuevo-tramite-form" action="nuevo-tramite.php" method="POST">                    
                    <label for="">Nro de Siniestro</label>
                    <input class="nuevo-tramite-inputs" name="nroSiniestro" placeholder="Ingrese Número de Stro" type="number" autocomplete="off" required>
                    <label for="">Cliente</label>
                    <input class="nuevo-tramite-inputs" name="cliente" placeholder="Nombre y Apellido del cliente" type="text" autocomplete="off" required>
                    <label for="">Vahículo</label>
                    <input class="nuevo-tramite-inputs" name="vehiculo" placeholder="Marca y modelo del auto" type="text" autocomplete="off">
                    <label for="">Dominio</label>
                    <input class="nuevo-tramite-inputs" name="dominio" placeholder="Ingrese" type="text" autocomplete="off" required>
                    <label for="">F15</label>
                    <input class="nuevo-tramite-inputs" name="f15" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Baja Fiscal</label>
                    <input class="nuevo-tramite-inputs" name="bajaFiscal" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Baja GNC</label>
                    <input class="nuevo-tramite-inputs" name="bajaGNC" type="checkbox" autocomplete="off" value="SI">
                    <label for="">Jurisdicción</label>
                    <select class="nuevo-tramite-inputs" name="jurisdiccion" required>
                        <option value="" disabled selected>-Seleccione Jurisdicción-</option>
                        <?php
                            // La inclusión a conexion_db la hice al principio.
                            $sqlJurisdiccion = "Select * from JURISDICCION;";
                            $resultadoJurisdiccion = mysqli_query($conn, $sqlJurisdiccion);
                        ?>
                        <?php while($fila = mysqli_fetch_assoc($resultadoJurisdiccion)): ?>
                        <option value="<?php echo $fila['ID_JURISDICCION'] ?>">
                            <?php echo $fila['DETALLE']; ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <label for="">Fecha del trámite</label>
                    <input class="nuevo-tramite-inputs" name="fechaTramite" type="date" autocomplete="off" required>
                    <label for="">Importe ($AR)</label>
                    <input class="nuevo-tramite-inputs" name="importe" placeholder="Valor en PesosAS" type="number" autocomplete="off" required>
                    <label for="">Estado</label>
                    <select class="nuevo-tramite-inputs" name="estado" required>
                        <option value="" disabled selected>-Seleccione Estado-</option>
                        <?php
                            // Aclaro de nuevo: la conexión a la base la hice al comienzo.
                            $sqlEstado = "Select * from ESTADO_TRAMITE;";
                            $resultadoEstado = mysqli_query($conn, $sqlEstado);
                        ?>
                        <?php while($filaEstado = mysqli_fetch_assoc($resultadoEstado)): ?>
                        <option value="<?php echo $filaEstado['ID_ESTADO_TRAMITE'] ?>">
                            <?php echo $filaEstado['DETALLE']; ?>
                        </option>
                        <?php endwhile; ?>
                    </select>

                    <button class="boton limpiar" id="boton-limpiar">Limpiar todos</button>
                    <button class="boton">Cargar datos</button>

                </form>

            </div> <!-- Fin Formulario Nuevo Trámite -->

            <!-- Formulario de Consulta de Trámite -->
            <div id="form-consultar-tramite" class="consultar-tramite oculto">
                <div class="barra-superior-consultar-tramite">
                    <h2 class="titulo-seccion">Mis <span class="span">Trámites</span></h2>
                </div>
                <div class="tabla">
                    <?php
                        // La inclusión a conexion_db la hice al principio.
                        $id_usuario = $_SESSION['id_usuario'];

                        $sqlTramites = "SELECT * FROM TRAMITES WHERE ID_USUARIO = '$id_usuario';";

                        $resultadoTramites = mysqli_query($conn, $sqlTramites);
                    ?>                    
                    <div class="encabezado-tabla">Nro Siniestro</div>
                    <div class="encabezado-tabla">Cliente</div>
                    <div class="encabezado-tabla">Vehículo</div>
                    <div class="encabezado-tabla">Dominio</div>
                    <div class="encabezado-tabla">F15</div>
                    <div class="encabezado-tabla">Baja Fiscal</div>
                    <div class="encabezado-tabla">Baja GNC Enargas</div>
                    <!-- <div class="encabezado-tabla">Jurisdicción</div> --> <!-- Ocultamos estos 3 campos, porque no nos convence cómo se ven -->
                    <!-- <div class="encabezado-tabla">Estado Trámite</div> -->
                    <!-- <div class="encabezado-tabla">Fecha Trámite</div> -->
                    <div class="encabezado-tabla">Importe ($)</div>
                    

                    <?php while ($fila = mysqli_fetch_assoc($resultadoTramites)): ?>
                        <div class="registros"> <?php echo $fila['NRO_SINIESTRO']?> </div>
                        <div class="registros"> <?php echo $fila['ASEGURADO']?> </div>
                        <div class="registros"> <?php echo $fila['VEHICULO']?> </div>
                        <div class="registros"> <?php echo $fila['DOMINIO_PATENTE']?> </div>
                        <div class="registros"> <?php echo $fila['F15']?> </div>
                        <div class="registros"> <?php echo $fila['BAJA_FISCAL']?> </div>
                        <div class="registros"> <?php echo $fila['BAJA_GNC_ENARGAS']?> </div>
                        <!-- <div class="registros"> <?php echo $fila['ID_JURISDICCION']?> </div> --> <!-- Ocultamos estos 3 campos, porque no nos convence cómo se ven -->
                        <!-- <div class="registros"> <?php echo $fila['ID_ESTADO_TRAMITE']?> </div> -->
                        <!-- <div class="registros"> <?php echo $fila['FECHA_TRAMITE']?> </div> -->
                        <div class="registros"> <?php echo $fila['IMPORTE_TRAMITE']?> </div>
                    <?php endwhile; ?>

                </div>
                <button class="boton" id="refrescar">Refrescar</button>
            </div> <!-- Fin Formulario de Consulta de Trámite -->

            <!-- Formulario de Ajustes de Cuenta -->
            <div id="form-ajustes-usuario" class="ajustes-cuenta-usuario oculto">

                <h2>Mis <span class="span">Datos</span></h2>

                <form class="ajustes-cuenta-usuario-form" action="ajustes-cuenta-usuario.php" method="POST">
                    <label for="">Nombre</label>
                    <input name="nombre" placeholder="" type="text" autocomplete="off">

                    <label for="">Apellido</label>
                    <input name="apellido" placeholder="" type="text" autocomplete="off">

                    <label for="">Fecha de nacimiento</label>
                    <input name="fechaNacimiento" placeholder="" type="text" autocomplete="off">

                    <label for="">mail</label>
                    <input name="mail" placeholder="" type="mail" autocomplete="off">

                    <label for="">teléfono</label>
                    <input name="telefono" placeholder="" type="text" autocomplete="off">

                    <label for="">Usuario</label>
                    <input name="usuario" placeholder="" type="text" autocomplete="off">

                    <label for="">Contraseña</label>
                    <input name="pass" placeholder="" type="text" autocomplete="off">

                    <!-- <label for="">Cargo</label>
                    <input name="cargo" placeholder="" type="text" autocomplete="off"> --> <!-- Decidimos ocultar esto para evitar problemas con el llamado entre ID/NOMBRE-->

                    <button class="boton">Actualizar datos</button>

                </form>

                
            </div> <!-- Fin del formulario de Ajustes de la Cuenta del Usuario -->

            <!-- PopUp para Cerrar Sesión -->
            <div id="cerrar-sesion" class="cerrar-session oculto">
                <h3>¿Segur@ que desea cerrar sesión?</h2>
                <div class="botonera">
                    <button id="botonNO" class="boton limpiar">No</button>
                    <button id="botonSI" class="boton aceptar">Sí</button>
                </div>                
            </div> <!-- Fin del PopUp para Cerrar Sesión -->

        </div>

    </main>

    
    <!-- Script de JS: -->
    <script src="../js/home.js"></script>
</body>
</html>

