// SCRIPTS REGISTRO Y MODIFICACION


$(document).on('click', '#registrarUsuarios', function(e) {

    var formData = new FormData();
    formData.append("nombres", document.getElementsByName('nombres')[0].value);
    formData.append("cedula", document.getElementsByName('cedula')[0].value);
    formData.append('usuario', document.getElementsByName('usuario')[0].value);
    formData.append('clave', document.getElementsByName('clave')[0].value);
    formData.append('rol', document.getElementsByName('rol')[0].value);
    formData.append('email', document.getElementsByName('email')[0].value);
    formData.append('telefono', document.getElementsByName('telefono')[0].value);

    var ruta = routesAppPlatform() + 'usuarios/core/registrarUsuarios.php';

    sendEventFormDataApp('POST', ruta, formData, '#smgUsuarios');
    return false;
});

$(document).on('click', '#modificarUsuarios', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'usuarios/core/modificarUsuarios.php',
        params = {
            "idusuarios": document.getElementsByName('idusuarios')[0].value,
            "nombres": document.getElementsByName('nombres')[0].value,
            "rol": document.getElementsByName("rol")[0].value,
            "email": document.getElementsByName("email")[0].value,
            "telefono": document.getElementsByName("telefono")[0].value,
        }, '#smgUsuarios');

    return false;

});

$(document).on('click', '#busqueda', function(e) {
    var l = document.getElementsByName("nombreUsuarios")[0].value;
    console.log(l);
    sendEventApp('POST', routesAppPlatform() + 'usuarios/core/buscarUsuarios.php',
        params = {
            "nombreUsuarios": document.getElementsByName("nombreUsuarios")[0].value,
        }, '#smgUsuariosBusqueda');
    return false;
});