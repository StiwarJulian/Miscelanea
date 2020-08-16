<?php session_start();
  header("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
  require_once(CONTROLLERS_PATH."sesionController.php"); 
  //echo "".$_POST['usuario']."-".$_POST['clave']."-".$_POST['idioma'];

  $objUsuario = sesionController::validarSesion($_POST['usuario'],$_POST['clave']);
  //print_r($objUsuario);
  if($objUsuario  == false){
    
      echo "<div class='alert alert-danger' role='alert'>
              <b>ERROR!</b> Datos incorrectos
            </div>";
      session_destroy();      
      echo  "<script> errorSesion(); </script>" ;  
  }else{
    echo  "<script> iniciarSesion(); </script>" ;
    $_SESSION['idsesion'] = $objUsuario->getId_usuarios();
    $_SESSION['rol'] = $objUsuario->getId_rol();
    $_SESSION['nombre'] = $objUsuario->getUsuario();
    //print_r($_SESSION);
    sesionController::index();
  } 
?>  