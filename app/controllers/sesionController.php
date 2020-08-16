<?php 

    include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(PDO_PATH.'sesionDao.php');
    require_once(MODEL_PATH.'usuarios.php');
    
    class sesionController{

        public static function index(){
            echo  "<script>window.location.replace('".PLATFORM_SERVER."index.php');</script> ";
        }

        public static function validarSesion($usuario,$clave){
            return sesionDao::validarSesion($usuario,$clave);
        }
        
    }

?>