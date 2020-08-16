<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'usuarios.php');
    require_once(CONTROLLERS_PATH.'usuariosController.php');
    $validate_cedula = usuariosController::usuariosIdCedula($_POST['cedula']);
    if(!$validate_cedula){
        $objModel  = new usuarios(
            null,
            $_POST['nombres'],
            $_POST['cedula'],
            $_POST['usuario'],
            $_POST['clave'],
            $_POST['email'],
            $_POST['telefono'],
            $_POST['rol']
        );
    
        $objController = usuariosController::registrarUsuarios($objModel);
        if($objController){
            echo    "<div class='alert alert-success' role='alert'>
                        <b>Exito!</b> Registro realizado
                    <div>";

                    echo "<script>window.location.replace('listadoUsuarios.php')</script>";
        }else{
            echo    '<div class="alert alert-danger" role="alert">
                        <b>Error!</b> Registro no realizado
                    </div>';
        }
    }else{
        echo    '<div class="alert alert-danger" role="alert">
                    <b>Error!</b> el numero de cedula ya se encuentra registrado
                </div>';
    }
?>