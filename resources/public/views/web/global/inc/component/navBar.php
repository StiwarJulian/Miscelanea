<?php session_start();



include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');



require_once (LIB_PATH."session.php");

require_once (HELPERS_PATH."rutas.php");

$statusSesion=session::verificarSesionWeb($_SESSION['idsesion']);



?>

<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-dark nav-border-bottom no-transition"

        role="navigation">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-6">

                    <a class="logo-light" href="index.php"><img alt="" src="<?php echo VENDOR_SERVER.'cafepacifico/logo.png'; ?>" class="logo" style="max-width:80px;" /></a><a class="logo-dark"

                        href="index.php"> <img alt="" src="<?php echo VENDOR_SERVER.'cafepacifico/logo.png'; ?>" class="logo" style="max-width:80px;" />

                    </a>

                </div>

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span



                            class="icon-bar"></span> <span class="icon-bar"></span> </button>

                </div>

                <div class="col-md-9 text-right">

                    <div class="navbar-collapse collapse">

                        <ul id="accordion" class="nav navbar-nav navbar-right panel-group">

                            <li><a href="<?php echo WEB_SERVER."modules/index.php"; ?>" class="inner-link white-text">INICIO</a> </li>

                            <li><a href="<?php echo WEB_SERVER."modules/reserva/index.php"; ?>" class="inner-link white-text">RESERVAR</a> </li>

                            <li><a href="<?php echo WEB_SERVER."modules/menu/index.php"; ?>" class="inner-link white-text">MENU</a> </li>

                            <li><a href="<?php echo WEB_SERVER."modules/galeria/index.php?"; ?>" class="inner-link white-text">GALERIA</a></li>

                            <li><a href="<?php echo WEB_SERVER."modules/blog/index.php"; ?>" class="inner-link white-text">BLOG</a></li>

                            <li><a href="<?php echo WEB_SERVER."modules/contacto/index.php"; ?>" class="inner-link white-text">CONTACTO</a> </li>

                            <?php  
                            if($statusSesion == 1){
                                if($_SESSION['rol'] == "ADMINISTRADOR"){
                            ?>
                            <li><a href="<?php echo PLATFORM_SERVER."index.php"; ?>" class="inner-link white-text">PLAT. ADMINISTRATIVA</a> </li>
                            <?php }else{  ?>
                            <li><a href="<?php echo PLATFORM_SERVER."modules/reservaciones/index2.php"; ?>" class="inner-link white-text">MI PLATAFORMA</a> </li>
                            <?php } ?>

                            <li><a href="<?php echo PLATFORM_SERVER."modules/sesion/core/cerraSesion2.php?id=index"; ?>" class="inner-link white-text"> CERRAR SESION</a> </li>
                            <?php
                            }else{ ?>

                                <li><a href="<?php echo PLATFORM_SERVER."modules/sesion/login.php"; ?>" class="inner-link white-text">INICIAR SESION</a> </li>

                                <li><a href="<?php echo WEB_SERVER."modules/usuario/registrarUsuarioWeb.php"; ?>" class="inner-link white-text"> REGISTRATE</a> </li>

                            <?php  } ?>

                        </ul>

                    </div>

                </div>

               

                       

            </div>

        </div>

    </nav>