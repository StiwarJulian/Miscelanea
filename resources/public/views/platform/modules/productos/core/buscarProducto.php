<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'productos.php');
    require_once(MODEL_PATH.'inventario.php');
    require_once(CONTROLLERS_PATH.'productosController.php');
    require_once(CONTROLLERS_PATH.'inventarioController.php');

    $objProductos = productosController::listarProductosLike($_POST['nombreProducto']);

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
                                <a class='btn btn-outline-info' href='".PLATFORM_SERVER.'modules/productos/core/modificarProductos.php?id='.$objProductos[$clave]->getId_productos()."' style='margin-right:5px;'><i class=' mdi mdi-border-color'></i></a>
                                <button class='btn btn-outline-info' onclick='showModal(".$objProductos[$clave]->getId_productos().")' type='button'><i class=' mdi mdi-library-plus'></i></button>
                            </td>
                            
                        </tr>";
                }
                echo "
                </tbody>
            </table>";

    }else{
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

?>