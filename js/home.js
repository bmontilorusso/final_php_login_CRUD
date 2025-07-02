// home.php

// MOSTRAR/OCLUTAR FORMULARIOS (Login - AltaUsuario):

function ocultarFormularios() {
    document.getElementById('form-bienvenido').classList.add('oculto');
    document.getElementById('form-nuevo-tramite').classList.add('oculto');
    document.getElementById('form-consultar-tramite').classList.add('oculto');
    document.getElementById('form-ajustes-usuario').classList.add('oculto');
    document.getElementById('form-bienvenido').classList.remove('visible');
    document.getElementById('form-nuevo-tramite').classList.remove('visible');
    document.getElementById('form-consultar-tramite').classList.remove('visible');
    document.getElementById('form-ajustes-usuario').classList.remove('visible');
}

function mostrarMenuFlotante() {
    var avatarCerrarSesion = document.getElementById('avatar-cerrar-sesion');
    avatarCerrarSesion.classList.remove('oculto');
    avatarCerrarSesion.classList.add('visible');
}

function mostrarFormulario(formID) {
    ocultarFormularios();
    mostrarMenuFlotante();
    document.getElementById(formID).classList.remove('oculto');
    document.getElementById(formID).classList.add('visible'); 
}

document.getElementById('boton-nuevo-tramite').addEventListener('click', function() {
    mostrarFormulario('form-nuevo-tramite');
});

document.getElementById('boton-consulta-tramite').addEventListener('click', function() {
    mostrarFormulario('form-consultar-tramite');
});

document.getElementById('boton-ajustes-usuario').addEventListener('click', function() {
    mostrarFormulario('form-ajustes-usuario');
});

// FIN MOSTRAR/OCULTAR FORMULARIOS (home.php).

/*********************************************************************************************/

// Limpiar formularios:

var formNuevoTramite = document.getElementById('nuevo-tramite-form');
var botonLimpiar = document.getElementById('boton-limpiar');

botonLimpiar.addEventListener('click', function() {
    formNuevoTramite.reset();
});

/*********************************************************************************************/

// PopUp para Cerrar Sesión:

var popupCerrarSesion = document.getElementById('cerrar-sesion');
var botonSalir = document.getElementById('boton-salir');
var botonSI = document.getElementById('botonSI');
var botonNO = document.getElementById('botonNO');

// Botón de Cerrar Sesión:
botonSalir.addEventListener('click', function() {
    popupCerrarSesion.classList.remove('oculto');
    popupCerrarSesion.classList.add('visible');    
});

// Cerrar PopUp:
botonNO.addEventListener('click', function() {
    popupCerrarSesion.classList.remove('visible');
    popupCerrarSesion.classList.add('oculto');
});





