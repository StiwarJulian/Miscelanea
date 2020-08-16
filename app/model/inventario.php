<?php 

    class inventario{

        private $idinventario;
        private $stock;
        private $cantidad_minima;
        private $timestamp;

        public function __construct($idinventario,$stock,$cantidad_minima,$timestamp){
            $this->idinventario=$idinventario;
            $this->stock=$stock;
            $this->cantidad_minima=$cantidad_minima;
            $this->timestamp=$timestamp;
        }


        public function setId_inventario($idinventario){return $this->idinventario=$idinventario;}
        public function getId_inventario(){return $this->idinventario;}

        public function setStock($stock){return $this->stock=$stock;}
        public function getStock(){return $this->stock;}

        public function setCantidad_minima($cantidad_minima){return $this->cantidad_minima=$cantidad_minima;}
        public function getCantidad_minima(){return $this->cantidad_minima;}

        public function setTimestamp($timestamp){return $this->timestamp=$timestamp;}
        public function getTimestamp(){return $this->timestamp;}
    }

?>