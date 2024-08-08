<?php
    session_start();
    if(isset($_SESSION['usuario']))
    {
            $usuario    =   $_SESSION['usuario'];
            $rol        =   $_SESSION['rol'];
    }
    else
    {
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>USUARIO</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
        <meta charset="UTF-8" />
    </head>
    <body>
        <div class="sidebar">
            <?php
                include('rolesmenu.php');
            ?>
        </div>
        <div class="content">
            
            <h1>MIS DATOS DE USUARIO</h1>
                
            <?php

                if($_GET)
                {
                    $mensaje = $_GET['mensaje'];
                    
                    if($mensaje == 'actualizo')
                    {
                        echo "<div  class='alert alert-success'>Datos actualizados correctamente</div>";
                    }
                    else
                    {
                        if($mensaje=='noactualizo')
                        {
                            echo "<div  class='alert alert-danger'>No se pudo actualizar los datos</div>";
                        }
                        else
                        {
                            if($mensaje=='nocambio')
                            {
                                echo "<div  class='alert alert-danger'>La nueva contraseña debe coincidir con el campo confirmación, vuelva a intentarlo</div>";
                            }
                            else
                            {
                                if($mensaje=='cambio')
                                {
                                    echo "<div  class='alert alert-success'>Se cambio la contraseña correctamente</div>";
                                }
                            }
                        }
                    }
                }
                $idUsu      = $_SESSION['ConsIdUsu'];
                $correoUsu  = $_GET['corUsu'];
                $estadoUsu  = $_GET['estUsu'];
            ?>
            <form method="post" name="FormEditarUsuario">
                <div class="form-group">
                    <label>Correo:</label>
                        <input type="email" name="txtCorreoUsu" class="form-control" value="<?php echo $correoUsu;?>">
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                        <select name="txtEstadoUsu" class="form-control" <?php if($rol!="Administrador"){echo "disabled";}?>>
                            <option <?php if($estadoUsu=='Activo'){echo "selected";} ?> >Activo</option>
                            <option <?php if($estadoUsu=='Inactivo'){echo "selected";} ?> >Inactivo</option>
                        </select>
                </div>
                <input type="button" value="Actualizar" id="actualizar" class="btn btn-dark" onclick= "document.FormEditarUsuario.action = '../Controlador/Ctrl_ModificarUsuario.php?mensaje=miusuario'; document.FormEditarUsuario.submit()" />
                <br>
                <br> 
                <h4>CAMBIO DE CONTRASEÑA</h4>
                <div class="form-group">
                    <label>Contraseña:</label>
                        <input type="password" name="txtContrasenaUsu" class="form-control" placeholder="Ingrese la nueva contraseña">
                </div>
                <div class="form-group">
                    <label>Confirmación de contraseña:</label>
                        <input type="password" name="txtConfirmacionUsu" class="form-control" placeholder="Ingrese de nuevo la contraseña">
                </div>
                <input type="button" value="Cambiar contraseña" id="eliminar" class="btn btn-dark" onclick= "alerta()"/> 
            </form>
            <script type="text/javascript">
                    function alerta()
                    {
                        var mensaje;
                        var opcion = confirm("Está seguro de que desea cambiar la contraseña del usuario?");
                        if (opcion == true) 
                        {
                            document.FormEditarUsuario.action = '../Controlador/Ctrl_ModificarContrasena.php';
                            document.FormEditarUsuario.submit();   
                        } 
                    }
                </script>
        </div>
    </body>
</html>