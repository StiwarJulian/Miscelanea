<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/miscelanea/conf.php');
    require_once(MODEL_PATH.'usuarios.php');
    require_once(PDO_PATH.'usuariosDao.php');

    class usuariosController{

        public static function registrarUsuarios($usuario){
            return usuariosDao::registrarUsuarios($usuario);
        }

        public static function modificarUsuarios($usuario){
            return usuariosDao::modificarUsuarios($usuario);
        }

        public static function listarUsuarios(){
            $objUsuarios = usuariosDao::listarUsuarios();

            if($objUsuarios != false){
                echo "
                <div class='d-md-flex align-items-center'>
                     <div class='col-sm-8'>
                         <h4 class='card-title'>Listado De Usuarios </h4>
                         <h5 class='card-subtitle'> Ultima Actualizacion - ".date("d").'/'. date("m").'/'.date("Y"). "- Estado: <span class='badge badge-success'>Actualizado</span></h5>
                         
                         
                     </div>
                     <div style='width:100%;'>
                         <input type='text' id='nombreUsuarios' name='nombreUsuarios' placeholder='Ingrese el nombre del usuario' required='' class='card-title' style='padding:6px;'>
                         <button class='btn btn-outline-info' id='busqueda' name='busqueda'><i class='ti-search'></i> </button>
                     </div>
                     
                 </div>
                 <table class='table'>
                     <thead>
                         <tr>
                             <th scope='col'>Cedula</th>
                             <th scope='col'>Nombre Completo</th>
                             <th scope='col'>Email</th>
                             <th scope='col'>Telefono</th>
                             <th scope='col'>Rol</th>
                         </tr>
                     </thead>
                     <tbody>";
                     foreach($objUsuarios as $clave => $value){
                         echo "<tr style='text-transform:uppercase;'>
                                 <th scope='row'>".$objUsuarios[$clave]->getCedula()."</th>
                                 <td valign='midle'>".$objUsuarios[$clave]->getNombres()."</td>


                                 <td valign='midle'>".$objUsuarios[$clave]->getEmail()."</td>
                                 <td valign='midle'>".$objUsuarios[$clave]->getTelefono()."</td>
                                 <td valign='midle'>".$objUsuarios[$clave]->getId_rol()."</td>
                                 <td>
                                     <a class='btn btn-outline-info' href='".PLATFORM_SERVER.'modules/usuarios/modificarUsuarios.php?id='.$objUsuarios[$clave]->getId_usuarios()."' style='margin-right:5px;'><i class=' mdi mdi-border-color'></i></a>
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
                            <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay usuarios registrados con la consulta anterior</p>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        public static function usuariosId($idusuarios){
            return usuariosDao::usuariosId($idusuarios);
        }

        public static function usuariosIdCedula($cedula){
            return usuariosDao::usuariosIdCedula($cedula);
        }

        public static function listarRoles(){
            $objRol = usuariosDao::listarRoles();

            if($objRol != false){
                echo "
                <div class='col-lg-2 col-md-12 text-right'>
                    <span>Rol</span>
                </div>
                <div class='col-lg-8 col-md-12'>
                    <select name='rol' id='rol' class='form-control'>";
                        
                        foreach ($objRol as $clave => $value) {
                            echo "<option value='".$objRol[$clave]['idrol']."'>".$objRol[$clave]['nombre_rol']."</option>";
                        }
                    echo "</select>
                </div>";
            }
        }

        public static function listarRolesUpdate($idUsuario){
            $rol = usuariosDao::rolIdUsuarios($idUsuario);
            $objRol = usuariosDao::listarRoles();

            if($objRol != false){
                echo "
                <div class='col-lg-2 col-md-12 text-right'>
                    <span>Rol</span>
                </div>
                <div class='col-lg-8 col-md-12'>
                    <select name='rol' id='rol' class='form-control'>";
                        echo "<option value='".$rol['idrol']."'>".$rol['nombre_rol']."</option>";
                        foreach ($objRol as $clave => $value) {
                            echo "<option value='".$objRol[$clave]['idrol']."'>".$objRol[$clave]['nombre_rol']."</option>";
                        }
                    echo "</select>
                </div>";
            }
        }

        public static function listarUsuariosLike($nombres){
            return usuariosDao::listarUsuariosLike($nombres);
        }
    }

?>