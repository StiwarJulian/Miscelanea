<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(DATABASE_PATH.'DataSource.php');

    class inventarioDao{

        public static function registrarInventario($inventario){
            $data_source = new DataSource();

            $sql = "INSERT INTO inventario VALUES(null,:stock,:cantidad_minima,:timestamp);";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':stock'=>$inventario->getStock(),
                ':cantidad_minima'=>$inventario->getCantidad_minima(),
                ':timestamp'=>$inventario->getTimestamp()
            ));

            return $resultado;
        }

        public static function modificarInventario($inventario){
            $data_source = new DataSource();

            $sql = "UPDATE inventario SET 
                stock=:stock,
                cantidad_minima=:cantidad_minima,
                timestamp=:timestamp

                WHERE idinventario=:idinventario
            ";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':idinventario'=>$inventario->getId_inventario(),
                ':stock'=>$inventario->getStock(),
                ':cantidad_minima'=>$inventario->getCantidad_minima(),
                ':timestamp'=>$inventario->getTimestamp()
            ));

            return $resultado;
        }

        public static function modificarStock($inventario){
            $data_source = new DataSource();

            $sql = "UPDATE inventario SET 
                stock=:stock,
                timestamp=:timestamp

                WHERE idinventario=:idinventario
            ";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':idinventario'=>$inventario->getId_inventario(),
                ':stock'=>$inventario->getStock(),
                ':timestamp'=>$inventario->getTimestamp()
            ));

            return $resultado;
        }

        public static function inventarioId($idinventario){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT * FROM inventario WHERE idinventario=$idinventario");

            if(count($data_table)>0){
                $objModel = new inventario(
                    $data_table[0]['idinventario'],
                    $data_table[0]['stock'],
                    $data_table[0]['cantidad_minima'],
                    $data_table[0]['timestamp']
                );

                return $objModel;
            }else {
                return false;
            }
        }

        public static function inventarioIdProductos($idproductos){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT i.* FROM inventario i JOIN productos p ON i.idinventario=p.idinventario 
            WHERE p.idproductos=$idproductos");

            if(count($data_table)>0){
                $objModel = new inventario(
                    $data_table[0]['idinventario'],
                    $data_table[0]['stock'],
                    $data_table[0]['cantidad_minima'],
                    $data_table[0]['timestamp']
                );

                return $objModel;
            }else {
                return false;
            }
        }

        public static function ultimoIdInventario(){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT idinventario FROM inventario ORDER BY idinventario DESC LIMIT 1");

            return $data_table[0]['idinventario'];
        }

        public static function eliminarInventario($idinventario){
            $data_source = new DataSource();

            $resultado = $data_source->ejecutarActualizacion("DELETE FROM inventario WHERE idinventario=$idinventario");

            return $resultado;
        }
    }
?>