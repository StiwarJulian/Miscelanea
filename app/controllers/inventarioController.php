<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(PDO_PATH.'inventarioDao.php');

    class inventarioController{

        public static function registrarInventario($inventario){
            return inventarioDao::registrarInventario($inventario);
        }

        public static function modificarInventario($inventario){
            return inventarioDao::modificarInventario($inventario);
        }

        public static function modificarStock($inventario){
            return inventarioDao::modificarStock($inventario);
        }

        public static function inventarioId($idinventario){
            return inventarioDao::inventarioId($idinventario);
        }

        public static function ultimoIdInventario(){
            return inventarioDao::ultimoIdInventario();
        }

        public static function eliminarInventario($idinventario){
            return inventarioDao::eliminarInventario($idinventario);
        }

        public static function inventarioIdProductos($idproducto){
            return inventarioDao::inventarioIdProductos($idproducto);
        }

    }

?>