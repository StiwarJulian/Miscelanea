<?php 
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(CONTROLLERS_PATH.'productosController.php');
    require_once(CONTROLLERS_PATH.'inventarioController.php');

    date_default_timezone_set('America/Bogota');
    setlocale(LC_ALL,"es_CO");

    $objInventario = new inventario(
        $_POST['idInventario'],
        $_POST['stock'],
        $_POST['stock_limite'],
        date("Y-m-d")
    );

    $inventarioController = inventarioController::modificarInventario($objInventario);
        
        $objProductos = new productos(
            $_POST['idProducto'],
            $_POST['nombreProducto'],
            $_POST['descripcion'],
            $_POST['marca'],
            $_POST['precio'],
            $_POST['idInventario']
        );
        
        $productosController = productosController::modificarProductos($objProductos);

        if($productosController || $inventarioController){
            echo    "<div class='alert alert-success' role='alert'>
                        <b>Exito!</b> Modificacion realizada
                    <div>";
        }else{

            echo    '<div class="alert alert-danger" role="alert">
                        <b>Error!</b> Modificacion no realizada deny
                    </div>';
        }
        echo "<script>window.location.replace('listadoProductos.php')</script>";
?>