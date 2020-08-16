<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(DATABASE_PATH.'DataSource.php');

    class productosDao{

        public static function registrarProductos($productos){
            $data_source = new DataSource();

            $sql = "INSERT INTO productos VALUES(null,:nombre_productos,:descripcion,:marca,:precio,:idinventario)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':nombre_productos'=>$productos->getNombre(),
                ':descripcion'=>$productos->getDescripcion(),
                ':marca'=>$productos->getMarca(),
                ':precio'=>$productos->getPrecio(),
                ':idinventario'=>$productos->getId_inventario()
            ));

            return $resultado;
        }

        public static function modificarProductos($productos){
            $data_source = new DataSource();

            $sql = "UPDATE productos SET 
            nombre_producto=:nombre_productos,
            descripcion=:descripcion,
            marca=:marca,
            precio=:precio,
            idinventario=:idinventario
            
            WHERE idproductos=:idproductos";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':idproductos'=>$productos->getId_productos(),
                ':nombre_productos'=>$productos->getNombre(),
                ':descripcion'=>$productos->getDescripcion(),
                ':marca'=>$productos->getMarca(),
                ':precio'=>$productos->getPrecio(),
                ':idinventario'=>$productos->getId_inventario()
            ));

            return $resultado;
        }

        public static function productosId($idproductos){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT p.*,i.stock FROM productos p JOIN inventario i 
            ON p.idinventario=i.idinventario WHERE p.idproductos=$idproductos");
            if(count($data_table)>0){
                $objModel = new productos(
                    $data_table[0]['idproductos'],
                    $data_table[0]['nombre_producto'],
                    $data_table[0]['descripcion'],
                    $data_table[0]['marca'],
                    $data_table[0]['precio'],
                    $data_table[0]['stock']
                );

                return $objModel;
            }else{
                return false;
            }
        }

        public static function listarProductos(){
            $data_source = new DataSource();

            $data_table = $data_source->ejecutarConsulta("SELECT p.*,i.stock FROM productos p JOIN inventario i ON p.idinventario=i.idinventario");

            if(count($data_table)>0){
                $arrayProductos = array();
                foreach ($data_table as $clave => $value) {
                    $objModel = new productos(
                        $data_table[$clave]['idproductos'],
                        $data_table[$clave]['nombre_producto'],
                        $data_table[$clave]['descripcion'],
                        $data_table[$clave]['marca'],
                        $data_table[$clave]['precio'],
                        $data_table[$clave]['stock']
                    );

                    array_push($arrayProductos,$objModel);
                }
                return $arrayProductos;
            }else{
                return false;
            }
        }

        public static function listarProductosLike($nombre){
            $data_source = new DataSource();
            $sql = "SELECT p.*,i.stock FROM productos p JOIN inventario i ON p.idinventario=i.idinventario 
            WHERE nombre_producto LIKE :nombre";
            $data_table = $data_source->ejecutarConsulta($sql, array(
                ':nombre'=>'%'.$nombre.'%'
            ));

            if(count($data_table)>0){
                $arrayProductos = array();
                foreach ($data_table as $clave => $value) {
                    $objModel = new productos(
                        $data_table[$clave]['idproductos'],
                        $data_table[$clave]['nombre_producto'],
                        $data_table[$clave]['descripcion'],
                        $data_table[$clave]['marca'],
                        $data_table[$clave]['precio'],
                        $data_table[$clave]['stock']
                    );

                    array_push($arrayProductos,$objModel);
                }
                return $arrayProductos;
            }else{
                return false;
            }
        }
    }

?>