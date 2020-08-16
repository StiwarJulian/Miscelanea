<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."sesionController.php");
       require_once (CONTROLLERS_PATH."usuariosController.php");

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
                        <h4 class="page-title">Registrar Usuarios</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= PLATFORM_SERVER.'index.php");'?>">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="#">Registrar Usuarios</a></li>
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
                                        <span>Nombre Completo</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingrese el nombre completo. . ." required>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Numero Cedula</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Ingrese el numero de cedula" required>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Usuario</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese el usuario. . ." aria-label="Ingrese el usuario" aria-describedby="basic-addon2">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Clave</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="password" class="form-control" id="clave" name="clave" placeholder="**********">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <?= usuariosController::listarRoles();?>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required=''>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-2 col-md-12 text-right">
                                        <span>Telefono </span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="xxx-xxx-xx-xx" required>
                                    </div>
                                </div>
                                <div id="smgUsuarios"></div>
                                <br/>
                                <button class="btn btn-success" type="button" id="registrarUsuarios">Registrar Usuario</button>
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
    <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>
    <!-- ============================================================== -->
</body>

</html>