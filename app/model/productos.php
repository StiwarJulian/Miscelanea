<?php 

    class productos{

        private $idproductos;
        private $nombre;
        private $descripcion;
        private $marca;
        private $precio;
        private $idinventario;

        public function __construct($idproductos,$nombre,$descripcion,$marca,$precio,$idinventario)
        {
            $this->idproductos=$idproductos;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->marca=$marca;
            $this->precio=$precio;
            $this->idinventario=$idinventario;
        }

        public function setId_productos($idproductos){return $this->idproductos=$idproductos;}
        public function getId_productos(){return $this->idproductos;}

        public function setNombre($nombre){return $this->nombre=$nombre;}
        public function getNombre(){return $this->nombre;}

        public function setDescripcion($descripcion){return $this->descripcion=$descripcion;}
        public function getDescripcion(){return $this->descripcion;}

        public function setMarca($marca){return $this->marca=$marca;}
        public function getMarca(){return $this->marca;}

        public function setPrecio($precio){return $this->precio=$precio;}
        public function getPrecio(){return $this->precio;}

        public function setId_inventario($idinventario){return $this->idinventario=$idinventario;}
        public function getId_inventario(){return $this->idinventario;}
    }

?>