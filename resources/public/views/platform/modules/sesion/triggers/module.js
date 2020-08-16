/*  Eventos para modulo de sesion. */
$(document).on('click', '#validarSesion', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'sesion/core/validarSesion.php',
        params = {
            "usuario": document.getElementsByName("usuario")[0].value,
            "clave": document.getElementsByName("clave")[0].value,
        }, '#smgLogin');

    return false;
});