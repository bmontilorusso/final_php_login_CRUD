// Trabajo FINAL PHP - Monti Bruno & Reale Aldana 

// CAMBIO DE FORMULARIO (Login - AltaUsuario):

var mostrarAltaUsuario = document.getElementById('aqui');
var mostrarLogIn = document.getElementById('volver');
var formAltaUsuario = document.getElementById('formAltaUsuario');
var formLogIn = document.getElementById('formLogin');


mostrarAltaUsuario.addEventListener('click', function() {
    formLogIn.style.display = 'none';
    formAltaUsuario.style.display = 'block';
});


mostrarLogIn.addEventListener('click', function() {
    formLogIn.style.display = 'block';
    formAltaUsuario.style.display = 'none';
});
