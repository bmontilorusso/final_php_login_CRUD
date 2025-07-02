<?php

// Iniciamos la sesión actual.
session_start();
// Desasignamos todas las variables de sesión
session_unset();
// Destrucción de la sesión:
session_destroy();

// Redireccionamos al Index:
header("Location: ../index.html");
exit();

?>