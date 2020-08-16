<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."sesionController.php");

       session::verificarSesion($_SESSION['idsesion']);
       
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
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
                        <h4 class="page-title">Registrar Productos</h4>
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
                                        <input type="text" data-toggle="tooltip" title="Ingrese el nombre del producto!" id="nombreProducto" name="nombreProducto" class="form-control" id="validationDefault05" placeholder="Ingrese el nombre. . ." required>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Descripcion</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Precio</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese el valor" aria-label="Ingrese el valor del producto" aria-describedby="basic-addon2">
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
                                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Stock - Disponible</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Stock - Limite</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" id="stock_limite" name="stock_limite" placeholder="Cantidad minima del producto">
                                    </div>
                                </div>
                                <div id="smgProductos"></div>
                                <br/>
                                <button class="btn btn-success" type="button" id="registrarProductos">Registrar Producto</button>
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