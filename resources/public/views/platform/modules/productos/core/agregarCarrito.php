<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(CONTROLLERS_PATH.'productosController.php');
    require_once(MODEL_PATH.'productos.php');

    $objProductos = productosController::productosId($_POST['idProducto']);
    if($objProductos != false){
        
        
        echo "
        <div class='card'>
            <div class='card-header'>
                <h4 class='card-title'><i class='mdi mdi-cart'></i> Productos</h4>  
            </div>
            <div class='card-body'>
                <div class='row align-items-center'>
                    <div class='col-md-12 text-left'>
                        <div class='col-md'>
                            <button type='button' class='close'>&times;</button>
                        </div>
                        <div class='col-md-10'>
                            <h5 class='card-title'></h5> 
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
                            
                            <input type='text' class='form-control' id='precio' name='precio' value='2000' disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class='row align-items-center'>
                    <div class='col-md-6 text-left'>
                        <h5 class='card-title'> Total A Pagar: </h5> 
                    </div>
                    <div class='col-md-6 text-left'>
                        <h5 class='card-title'>$ 20000 </h5> 
                    </div>
                </div>
                <button class='btn btn-success' type='button' id='venderProducto'>Pagar Ahora</button>
            </div>
        </div>";
    }else{
        
    }
    

?>