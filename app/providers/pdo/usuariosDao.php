<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(DATABASE_PATH.'DataSource.php');
    require_once(CONTROLLERS_PATH.'usuariosController.php');
    require_once(MODEL_PATH.'usuarios.php');

    class usuariosDao{

        public static function registrarUsuarios($usuarios){
            $data_source = new DataSource();
            
            $sql = "INSERT INTO usuarios VALUES (NULL,:nombres,:cedula,:usuario,:clave,:email,:telefono,:idrol);";
            
            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':nombres'=>$usuarios->getNombres(),
                ':cedula'=>$usuarios->getCedula(),
                ':usuario'=>$usuarios->getUsuario(),
                ':clave'=>$usuarios->getClave(),
                ':email'=>$usuarios->getEmail(),
                ':telefono'=>$usuarios->getTelefono(),
                ':idrol'=>$usuarios->getId_rol()
            ));

            return $resultado;
        }

        public static function modificarUsuarios($usuarios){
            $data_source = new DataSource();

            $sql = "UPDATE usuarios SET 
            nombres=:nombres,           
            email=:email,
            telefono=:telefono,
            idrol=:idrol

            WHERE idusuarios=:idusuarios";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':idusuarios'=>$usuarios->getId_usuarios(),
                ':nombres'=>$usuarios->getNombres(),
                ':email'=>$usuarios->getEmail(),
                ':telefono'=>$usuarios->getTelefono(),
                ':idrol'=>$usuarios->getId_rol()
            ));
            return $resultado;
        }

        public static function listarUsuarios(){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios JOIN rol ON usuarios.idrol = rol.idrol");
            
            if(count($data_table)>0){
                $arrayModel = array();
                foreach($data_table as $clave => $value){
                    $objModel = new usuarios(
                        $data_table[$clave]['idusuarios'],
                        $data_table[$clave]['nombres'],
                        $data_table[$clave]['cedula'],
                        $data_table[$clave]['usuario'],
                        $data_table[$clave]['clave'],
                        $data_table[$clave]['email'],
                        $data_table[$clave]['telefono'],
                        $data_table[$clave]['nombre_rol']
                    );
                    array_push($arrayModel,$objModel);
                }
                return $arrayModel;
            }else{
                return false;
            }
        }

        public static function usuariosId($idusuarios){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios JOIN rol ON usuarios.idrol=rol.idrol WHERE idusuarios=$idusuarios");

            if(count($data_table)>0){
                $objModel = new usuarios(
                    $data_table[0]['idusuarios'],
                    $data_table[0]['nombres'],
                    $data_table[0]['cedula'],
                    $data_table[0]['usuario'],
                    $data_table[0]['clave'],
                    $data_table[0]['email'],
                    $data_table[0]['telefono'],
                    $data_table[0]['nombre_rol']
                );
                return $objModel;
            }else{
                return false;
            }
        }

        public static function rolIdUsuarios($idusuarios){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT r.* FROM rol r JOIN usuarios u ON r.idrol=u.idrol WHERE u.idusuarios=$idusuarios");

            if(count($data_table)>0){
                $objModel = array(
                    'idrol'=>$data_table[0]['idrol'],
                    'nombre_rol'=>$data_table[0]['nombre_rol']
                );
                return $objModel;
            }else{
                return false;
            }
        }

        public static function usuariosIdCedula($cedula){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT cedula FROM usuarios WHERE cedula = $cedula");
            if(count($data_table)>0){
                return $data_table[0]['cedula'];
            }else{
                return false;
            }
        }


        public static function listarRoles(){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT * FROM rol");
            
            if(count($data_table)>0){
                $arrayModel = array();
                foreach($data_table as $clave => $value){
                    $objModel = array(
                        "idrol"=>$data_table[$clave]['idrol'],
                        "nombre_rol"=>$data_table[$clave]['nombre_rol']
                    );
                    array_push($arrayModel,$objModel);
                }
                return $arrayModel;
            }else{
                return false;
            }
        }

        public static function listarUsuariosLike($nombres){
            $data_source = new DataSource();
            $sql = "SELECT u.*,r.nombre_rol FROM usuarios u JOIN rol r ON u.idrol = r.idrol WHERE u.nombres LIKE :nombres";
            $data_table = $data_source->ejecutarConsulta($sql,array(
                ':nombres'=>"%".$nombres."%"
            ));
            
            if(count($data_table)>0){
                $arrayModel = array();
                foreach($data_table as $clave => $value){
                    $objModel = new usuarios(
                        $data_table[$clave]['idusuarios'],
                        $data_table[$clave]['nombres'],
                        $data_table[$clave]['cedula'],
                        $data_table[$clave]['usuario'],
                        $data_table[$clave]['clave'],
                        $data_table[$clave]['email'],
                        $data_table[$clave]['telefono'],
                        $data_table[$clave]['nombre_rol']
                    );
                    array_push($arrayModel,$objModel);
                }
                return $arrayModel;
            }else{
                return false;
            }
        }
    }

?>