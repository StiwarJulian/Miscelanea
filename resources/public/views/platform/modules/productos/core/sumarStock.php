<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(CONTROLLERS_PATH.'productosController.php');
    require_once(CONTROLLERS_PATH.'inventarioController.php');
    date_default_timezone_set('America/Bogota');
    setlocale(LC_ALL,"es_CO");

       $inventarioController = inventarioController::inventarioIdProductos($_POST['idProductos']);
        $stock = $inventarioController->getStock();
        $stockAdicional = $_POST['stockAdicional'];

        $stockTotal = $stockAdicional+$stock;

        $objInventario = new inventario(
            $inventarioController->getId_inventario(),
            $stockTotal,
            null,
            date("Y-m-d")
        );
        $controllerInventario = inventarioController::modificarStock($objInventario);

        if($controllerInventario){
            echo    "<div class='alert alert-success' role='alert'>
                        <b>Exito!</b> Modificacion realizada
                    <div>";
        }else{
            echo    "<div class='alert alert-success' role='alert'>
                        <b>Exito!</b> Modificacion no realizada
                    <div>";
        }
        
        echo '<script>location.reload()</script>';

?>