<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <?php
        include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
        require_once (PLATFORM_PATH."global/inc/platform/head.php");
        require_once (CONTROLLERS_PATH."sesionController.php");
        require_once (CONTROLLERS_PATH."productosController.php");
        require_once (CONTROLLERS_PATH.'inventarioController.php');
        require_once (LIB_PATH."session.php");
    
        session::verificarSesion($_SESSION['idsesion']);
       
        date_default_timezone_set('America/Bogota');
        setlocale(LC_ALL,"es_CO");
        $objProductos = productosController::productosId($_GET['id']);
        $objInventario = inventarioController::inventarioIdProductos($objProductos->getId_productos());
    ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- HEADER Y MENU -->
        <?php require_once(PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
        <!-- FIN MENU -->
        <!-- End Topbar header -->

        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Modificar Productos</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= PLATFORM_SERVER.'index.php");'?>">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="#">Registrar Productos</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Nombre del Producto</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" title="Ingrese el nombre del producto!" id="nombreProducto" name="nombreProducto" class="form-control" id="validationDefault05" value="<?=$objProductos->getNombre();?>">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Descripcion</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?=$objProductos->getDescripcion();?>">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Precio</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="precio" name="precio" value="<?=$objProductos->getPrecio();?>" aria-label="Ingrese el valor del producto" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">$</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Marca</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" class="form-control" id="marca" name="marca" value="<?=$objProductos->getMarca();?>">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Cantidad - Disponible</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" id="stock" name="stock" value="<?=$objInventario->getStock();?>">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Cantidad - Limite</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" id="stock_limite" name="stock_limite" value="<?=$objInventario->getCantidad_minima();?>">
                                    </div>
                                </div>
                                <input type="hidden" name="idProducto" id="idProducto" value="<?=$objProductos->getId_productos();?>">
                                <input type="hidden" name="idInventario" id="idInventario" value="<?=$objInventario->getId_inventario();?>">

                                <div id="smgProductos"></div>
                                <br/>
                                <button class="btn btn-success" type="button" id="modificarProductos">Modificar Producto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                &copy; Todos los derechos reservados.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php require_once(PLATFORM_PATH."global/inc/platform/lib.php");?>
    <!-- This page plugin js -->
    <script src="<?php echo PLATFORM_COMPONENT_SERVER."core/directory.js"; ?>"></script>
    <script src="<?php echo PLATFORM_COMPONENT_SERVER."core/app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/productos/triggers/module.js"; ?>"></script>
    <!-- ============================================================== -->
</body>

</html>