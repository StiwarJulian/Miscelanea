<?php 
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(CONTROLLERS_PATH.'productosController.php');
    require_once(CONTROLLERS_PATH.'inventarioController.php');

    date_default_timezone_set('America/Bogota');
    setlocale(LC_ALL,"es_CO");

    $objInventario = new inventario(
        null,
        $_POST['stock'],
        $_POST['stock_limite'],
        date("Y-m-d")
    );

    $inventarioController = inventarioController::registrarInventario($objInventario);

    if($inventarioController){
        
        if(empty($_POST['descripcion'])){$descripcion = 'Sin Descripcion';
        }else{$descripcion=$_POST['descripcion'];}

        if(empty($_POST['marca'])){$marca = 'Sin Marca';
        }else{$marca=$_POST['marca'];}

        $ultimoIdInventario = inventarioController::ultimoIdInventario();
        
        $objProductos = new productos(
            null,
            $_POST['nombreProducto'],
            $descripcion,
            $marca,
            $_POST['precio'],
            $ultimoIdInventario
        );
        
        $productosController = productosController::registrarProductos($objProductos);

        if($productosController){
            echo    "<div class='alert alert-success' role='alert'>
                        <b>Exito!</b> Registro realizado
                    <div>";
                    
                    echo "<script>window.location.replace('listadoProductos.php')</script>";
        }else{

            $inventarioDelete = inventarioController::eliminarInventario($ultimoIdInventario);
            echo    '<div class="alert alert-danger" role="alert">
                        <b>Error!</b> Registro no realizado
                    </div>';
        }

    }else{
        echo    '<div class="alert alert-danger" role="alert">
                    <b>Error!</b> Registro no realizado
                </div>';
    }

    


?>