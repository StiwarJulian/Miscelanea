// SCRIPTS REGISTRO Y MODIFICACION

$(document).on('click', '#registrarProductos', function(e) {

    var formData = new FormData();
    formData.append("nombreProducto", document.getElementsByName('nombreProducto')[0].value);
    formData.append("descripcion", document.getElementsByName('descripcion')[0].value);
    formData.append('precio', document.getElementsByName('precio')[0].value);
    formData.append('marca', document.getElementsByName('marca')[0].value);
    formData.append('stock', document.getElementsByName('stock')[0].value);
    formData.append('stock_limite', document.getElementsByName('stock_limite')[0].value);


    var ruta = routesAppPlatform() + 'productos/core/registrarProductos.php';

    sendEventFormDataApp('POST', ruta, formData, '#smgProductos');
    return false;
});

$(document).on('click', '#modificarProductos', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'productos/core/modificarProductos.php',
        params = {
            "idProducto": document.getElementsByName('idProducto')[0].value,
            "idInventario": document.getElementsByName('idInventario')[0].value,
            "nombreProducto": document.getElementsByName("nombreProducto")[0].value,
            "descripcion": document.getElementsByName("descripcion")[0].value,
            "precio": document.getElementsByName("precio")[0].value,
            "marca": document.getElementsByName("marca")[0].value,
            "stock": document.getElementsByName("stock")[0].value,
            "stock_limite": document.getElementsByName("stock_limite")[0].value,
        }, '#smgProductos');

    return false;

});

$(document).on('click', '#sumarStock', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'productos/core/sumarStock.php',
        params = {
            "stockAdicional": document.getElementsByName("stockAdicional")[0].value,
            "idProductos": document.getElementsByName("idProductos")[0].value,
        }, '#smgProductos');

    return false;

});

$(document).on('click', '#busqueda', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'productos/core/buscarProducto.php',
        params = {
            "nombreProducto": document.getElementsByName("nombreProducto")[0].value,
        }, '#smgProductosBusqueda');
    return false;
});

$(document).on('click', '#busquedaIndex', function(e) {
    sendEventApp('POST', routesAppPlatform() + 'productos/core/buscarProductoIndex.php',
        params = {
            "nombreProducto": document.getElementsByName("nombreProducto")[0].value,
        }, '#smgProductosBusqueda');
    return false;
});

function showModal(valor) {
    var idproductos = valor;

    document.getElementById('idProductos').value = idproductos;
    $('#addInventory').modal('show');
};


function addCart(idProducto, nombreProducto, precio) {

    document.getElementById('list').className = 'col-md-9';
    document.getElementById('cart').style.display = '';

    console.log(idProducto, nombreProducto, precio);

    const datos = new FormData();

    datos.append('idproducto', idProducto);
    var objProductos = {
        'idproducto': idProducto,
        'nombreProducto': nombreProducto,
        'precio': precio
    }

    fetch('index.php', {
        method: 'POST',
        body: datos
    }).then(function(response) {
        if (response.ok) {
            console.log('exito');
        } else {
            console.log('error ajax');
        }
    });
};

$(document).on('click', '#venderProducto', function(e) {

    window.location.replace('modules/productos/facturacion.php');
});