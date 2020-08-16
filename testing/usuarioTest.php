<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Usuario</title>
</head>
<body>
    <div>

        <form action="../resources/public/views/platform/modules/usuarios/core/registrarUsuarios.php" method="post">
            <div>
                <input type="text" placeholder="cedula" name="cedula">
            </div>
            <div>
                <input type="text" placeholder="nombres" name="nombres">
            </div>
            <div>
                <input type="text" placeholder="usuario" name="usuario">
            </div>
            <div>
                <input type="text" placeholder="clave" name="clave">
            </div>
            <div>
                <input type="text" placeholder="email" name="email">
            </div>
            <div>
                <input type="text" placeholder="telefono" name="telefono">
            </div>
            <div> 
                <input type="text" placeholder="rol" name="idrol">
            </div>
            
            <button type="submit">Registrar</button>
        </form> 
    </div><br/>
    <div>
        <form action="../resources/public/views/platform/modules/usuarios/core/modificarUsuarios.php" method="post">
            <div>
                <input type="text" placeholder="identificador" name="idusuarios">
            </div>
            <div>
                <input type="text" placeholder="cedula" name="cedula">
            </div>
            <div>
                <input type="text" placeholder="nombres" name="nombres">
            </div>
            <div>
                <input type="text" placeholder="email" name="email">
            </div>
            <div>
                <input type="text" placeholder="telefono" name="telefono">
            </div>

            
            <button type="submit">Modificar</button>
        </form>
    </div>
</body>
</html>