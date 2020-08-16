<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."sesionController.php");
       require_once (CONTROLLERS_PATH."productosController.php");


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
                        <h4 class="page-title">Facturacion</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= PLATFORM_SERVER.'index.php");'?>">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="#">Facturacion</a></li>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-body printableArea">
                            <h3><b>FACTURA</b> <span class="pull-right">#300</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Miscelania Karen Daniela</b></h3>
                                            <p class="text-muted m-l-5">Villamarin
                                                <br/> Via Salado
                                                <br/> Calle 43 #2-22
                                                <br/> Fecha: 11/12/2019</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nombre Producto</th>
                                                    <th class="text-right">Cantidad</th>
                                                    <th class="text-right">Costo Unitario</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Audifonos</td>
                                                    <td class="text-right">2 </td>
                                                    <td class="text-right"> $8000 </td>
                                                    <td class="text-right"> $16000 </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Audifonos</td>
                                                    <td class="text-right">3 </td>
                                                    <td class="text-right"> $8000 </td>
                                                    <td class="text-right"> $24000 </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Audifonos</td>
                                                    <td class="text-right">4 </td>
                                                    <td class="text-right"> $8000 </td>
                                                    <td class="text-right"> $32000 </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total: $72,000</p>
                                        <p>Descuento : 0% </p>
                                        <hr>
                                        <h3><b>Total :</b> 72,986</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceder A Pagar </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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