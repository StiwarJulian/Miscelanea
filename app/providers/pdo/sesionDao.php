<?php 

    include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(DATABASE_PATH.'DataSource.php');
    require_once(PDO_PATH.'sesionDao.php');
    require_once(MODEL_PATH.'usuarios.php');

    class sesionDao{
        
        public static function validarSesion($usuario,$clave){
            $data_source = new DataSource();

            $resultado = $data_source->ejecutarConsulta("SELECT * FROM usuarios JOIN
            rol ON usuarios.idrol = rol.idrol 
            WHERE usuario='".$usuario."'AND clave = '".$clave."' LIMIT 1");

            if(count($resultado)>0){
                $objModel = new usuarios(
                    $resultado[0]['idusuarios'],
                    $resultado[0]['nombres'],
                    $resultado[0]['cedula'],
                    $resultado[0]['usuario'],
                    $resultado[0]['clave'],
                    $resultado[0]['email'],
                    $resultado[0]['telefono'],
                    $resultado[0]['nombre_rol']
                );
                return $objModel;
            }else{
                return false;
            }
        }
    }


?>