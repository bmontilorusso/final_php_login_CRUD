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