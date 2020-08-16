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
                        <h4 class="page-title">Modulo de Creditos</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= PLATFORM_SERVER.'index.php");'?>">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="#">Listado de creditos</a></li>
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
                        <div class="card">
                            <div class="card-body"  id="smgProductosBusqueda">
                                <div class='d-md-flex align-items-center'>
                                    <div class='col-sm-8'>
                                        <h4 class='card-title'>Listado Creditos </h4>
                                        <h5 class='card-subtitle'> Ultima Actualizacion - 11/12/2019 - Estado: <span class='badge badge-success'>Actualizado</span></h5>        
                                    </div>
                                </div>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>#</th>
                                            <th scope='col'>Nombre Del Usuario</th>
                                            <th scope='col'>Nombre Del Producto </th>
                                            <th scope='col'>Cantidad</th>
                                            <th scope='col'>Precio</th>
                                            <th scope='col'>Fecha Venta</th>
                                            <th scope='col'>Fecha Pagar</th>
                                            <th scope='col'>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style='text-transform:uppercase;'>
                                            <th scope='row'>1</th>
                                            <td valign='midle'>Jesus ALBERTO</td>
                                            <td valign='midle'>AUDIFONOS</td>
                                            <td valign='midle'>2</td>
                                            <td valign='midle'>16000</td>
                                            <td valign='midle'>10/12/2019</td>
                                            <td valign='midle'>10/01/2020</td>
                                            <td valign='midle'><span class='badge badge-success'>ACTIVO</span></td>
                                        </tr>
                                        <tr style='text-transform:uppercase;'>
                                            <th scope='row'>2</th>
                                            <td valign='midle'>Jesus ALBERTO</td>
                                            <td valign='midle'>AUDIFONOS</td>
                                            <td valign='midle'>3</td>
                                            <td valign='midle'>24000</td>
                                            <td valign='midle'>10/12/2019</td>
                                            <td valign='midle'>10/01/2020</td>
                                            <td valign='midle'><span class='badge badge-success'>ACTIVO</span></td>
                                        </tr>
                                        <tr style='text-transform:uppercase;'>
                                            <th scope='row'>3</th>
                                            <td valign='midle'>Jesus ALBERTO</td>
                                            <td valign='midle'>AUDIFONOS</td>
                                            <td valign='midle'>4</td>
                                            <td valign='midle'>32000</td>
                                            <td valign='midle'>10/12/2019</td>
                                            <td valign='midle'>10/01/2020</td>
                                            <td valign='midle'><span class='badge badge-success'>ACTIVO</span></td>
                                        </tr>
                                        <tr style='text-transform:uppercase;'>
                                            <th scope='row'>4</th>
                                            <td valign='midle'>Jesus ALBERTO</td>
                                            <td valign='midle'>AUDIFONOS</td>
                                            <td valign='midle'>5</td>
                                            <td valign='midle'>40000</td>
                                            <td valign='midle'>10/12/2019</td>
                                            <td valign='midle'>10/01/2020</td>
                                            <td valign='midle'><span class='badge badge-danger'>CANCELADO</span></td>
                                        </tr>
                                    </tbody>
                                </table>
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