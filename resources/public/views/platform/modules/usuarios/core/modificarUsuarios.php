<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'usuarios.php');
    require_once(CONTROLLERS_PATH.'usuariosController.php');


    $objModel = new usuarios(
        $_POST['idusuarios'],
        $_POST['nombres'],
        null,
        null,
        null,
        $_POST['email'],
        $_POST['telefono'],
        $_POST['rol']
    );

    $objController = usuariosController::modificarUsuarios($objModel);
    if($objController){
        echo    "<div class='alert alert-success' role='alert'>
                    <b>Exito!</b> Modificacion realizada
                <div>";

                echo "<script>window.location.replace('listadoUsuarios.php')</script>";
    }else{
        echo    '<div class="alert alert-danger" role="alert">
                    <b>Error!</b> Modificacion no realizada
                </div>';
    }
    

?>