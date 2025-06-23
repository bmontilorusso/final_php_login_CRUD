<?php

// VALIDACIÓN CONSTANTE DE SESIÓN INICIADA:

// Nos aseguramos que no haya una sesión iniciada previamente.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    exit();
}

?>