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

// index.html
// Validación de formatos de campos:

// Aldi, vos trabajá a partir de acá:






















/*****************************************************************************/