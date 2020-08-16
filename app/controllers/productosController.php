<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(PDO_PATH.'productosDao.php');


    class productosController{

        public static function registrarProductos($productos){
            return productosDao::registrarProductos($productos);
        }

        public static function modificarProductos($productos){
            return productosDao::modificarProductos($productos);
        }

        public static function productosId($idproductos){
            return productosDao::productosId($idproductos);
        }

        public static function listarProductosLike($nombre){
            return productosDao::listarProductosLike($nombre);
        }

        public static function listarProductos(){
            $objProductos = productosDao::listarProductos();

            if($objProductos != false){
               echo "
               <div class='d-md-flex align-items-center'>
                    <div class='col-sm-8'>
                        <h4 class='card-title'>Listado De Productos </h4>
                        <h5 class='card-subtitle'> Ultima Actualizacion - ".date("d").'/'. date("m").'/'.date("Y"). "- Estado: <span class='badge badge-success'>Actualizado</span></h5>
                        
                        
                    </div>
                    <div style='width:100%;'>
                        <input type='text' id='nombreProducto' name='nombreProducto' placeholder='Ingrese el nombre del producto' required='' class='card-title' style='padding:6px;'>
                        <button class='btn btn-outline-info' id='busqueda' name='busqueda'><i class='ti-search'></i> </button>
                    </div>
                    
                </div>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Nombre Del Producto</th>
                            <th scope='col'>Descripcion </th>
                            <th scope='col'>Marca</th>
                            <th scope='col'>Cantidad Disponible</th>
                            <th scope='col'>Precio</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($objProductos as $clave => $value){
                        echo "<tr style='text-transform:uppercase;'>
                                <th scope='row'>".$objProductos[$clave]->getId_productos()."</th>
                                <td valign='midle'>".$objProductos[$clave]->getNombre()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getDescripcion()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getMarca()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getId_inventario()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getPrecio()."</td>
                                <td>
                                    <a class='btn btn-outline-info' href='".PLATFORM_SERVER.'modules/productos/modificarProductos.php?id='.$objProductos[$clave]->getId_productos()."' style='margin-right:5px;'><i class=' mdi mdi-border-color'></i></a>
                                    <button class='btn btn-outline-info' onclick='showModal(".$objProductos[$clave]->getId_productos().")' type='button'><i class=' mdi mdi-library-plus'></i></button>
                                </td>
                                
                            </tr>";
                    }
                    echo "
                    </tbody>
                </table>";
            }else{
                echo "
                <div class='bs-callout-pink callout-square callout-transparent mt-1'>
                    <div class='media align-items-stretch'>
                        <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                            <i class='fa fa-exclamation-triangle text-white'></i>
                        </div>
                        <div class='media-body p-1'>
                            <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay productos registrados con la consulta anterior</p>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        public static function listarProductosActivos(){
            $objProductos = productosDao::listarProductos();

            if($objProductos != false){
               echo "
               
               <div class='d-md-flex align-items-center'>
                    <div class='col-sm-8'> 
                        <h4 class='card-title'>Listado De Productos</h4>
                        <h5 class='card-subtitle'> Ultima Actualizacion - ".date("d").'/'. date("m").'/'.date("Y"). "- Estado: <span class='badge badge-success'>Actualizado</span></h5>
                    </div>
                    <div style='width:100%;'>
                        <input type='text' id='nombreProducto' name='nombreProducto' placeholder='Ingrese el nombre del producto' required='' class='card-title' style='padding:6px;'>
                        <button class='btn btn-outline-info' id='busquedaIndex' name='busquedaIndex'><i class='ti-search'></i> </button>
                    </div>
                </div>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Nombre Del Producto</th>
                            <th scope='col'>Descripcion </th>
                            <th scope='col'>Marca</th>
                            <th scope='col'>Cantidad Disponible</th>
                            <th scope='col'>Precio</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($objProductos as $clave => $value){
                        echo "<tr style='text-transform:uppercase;'>
                                <th scope='row'>".$objProductos[$clave]->getId_productos()."</th>
                                <td valign='midle'>".$objProductos[$clave]->getNombre()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getDescripcion()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getMarca()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getId_inventario()."</td>
                                <td valign='midle'>".$objProductos[$clave]->getPrecio()."</td>
                                <td><button class='btn btn btn-outline-info' type='button' id='addCart' ";
                                    echo "onclick=\"addCart('".$objProductos[$clave]->getId_productos()."','".$objProductos[$clave]->getNombre()."','".$objProductos[$clave]->getPrecio()."')\"';>
                                <i class=' mdi mdi-cart-plus'></i></button></td>
                            </tr>";
                    }
                    echo "
                    </tbody>
                </table>";
            }else{
                echo "
                <div class='bs-callout-pink callout-square callout-transparent mt-1'>
                    <div class='media align-items-stretch'>
                        <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                            <i class='fa fa-exclamation-triangle text-white'></i>
                        </div>
                        <div class='media-body p-1'>
                            <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay productos registrados con la consulta anterior</p>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        public static function addCart($idproductos){
            $objProductos = productosDao::productosId($idproductos);
            if($objProductos != false){
            }
            echo "
                <div class='card'>
                    <div class='card-header'>
                        <h4 class='card-title'><i class='mdi mdi-cart'></i> Productos</h4>  
                    </div>
                    <div class='card-body'>";

                            echo "
                        <div class='row align-items-center'>
                            <div class='col-md-12 text-left'>
                                <div class='col-md'>
                                    <button type='button' class='close'>&times;</button>
                                </div>
                                <div class='col-md-10'>
                                    <h5 class='card-title'> Audifonos</h5> 
                                </div>
                            </div>
                        </div><br/>
                        <div class='row mb-3 align-items-center'>
                            <div class='col-md-6 text-left'>
                                <span>Cantidad: </span>
                            </div>
                            <div class='col-lg-6 col-md-6'>
                                <input type='number' class='form-control' name='cantidad' id='cantidad' value='1'>
                            </div>
                        </div>
            
                        <div class='row mb-3 align-items-center'>
                            <div class='col-lg-6 col-md-6 text-left'>
                                <span>Precio: </span>
                            </div>
                            <div class='col-lg-6 col-md-6'>
                                <div class='input-group'>
                                    
                                    <input type='text' class='form-control' id='precio' name='precio' value='8000' disabled>
                                </div>
                            </div>
                        </div>";

                    echo "
                        <hr>
                        <div class='row align-items-center'>
                            <div class='col-md-6 text-left'>
                                <h5 class='card-title'> Total A Pagar: </h5> 
                            </div>
                            <div class='col-md-6 text-left'>
                                <h5 class='card-title'>$ 8000 </h5> 
                            </div>
                        </div>
                        <button class='btn btn-success'  type='button' id='venderProducto'>Pagar Ahora</button>
                    </div>
                </div>";

        }

    }

?>