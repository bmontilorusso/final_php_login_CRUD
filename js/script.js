// Trabajo FINAL PHP - Monti Bruno & Reale Aldana

console.log('JS cargado');

// index.html
// MOSTRAR/OCLUTAR FORMULARIOS (Login - AltaUsuario):

    var mostrarAltaUsuario = document.getElementById('aqui');
    var mostrarLogIn = document.getElementById('volver');
    var formAltaUsuario = document.getElementById('formAltaUsuario');
    var formLogIn = document.getElementById('formLogin');

    mostrarAltaUsuario.addEventListener('click', function() {
        formLogIn.classList.add('oculto');
        formLogIn.classList.remove('visible');
        formAltaUsuario.classList.add('visible');
        formAltaUsuario.classList.remove('oculto');
    });

    mostrarLogIn.addEventListener('click', function() {
        formLogIn.classList.add('visible');
        formLogIn.classList.remove('oculto');
        formAltaUsuario.classList.add('oculto');
        formAltaUsuario.classList.remove('visible');
    });

// FIN MOSTRAR/OCULTAR FORMULARIOS (index.html).

/*****************************************************************************/

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

function mostrarFormulario(formID) {
    ocultarFormularios();
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

/*****************************************************************************/

// index.html
// Validación de formatos de campos:

// Aldi, vos trabajá a partir de acá:






















/*****************************************************************************/