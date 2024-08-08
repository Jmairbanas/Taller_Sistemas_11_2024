<?php
    session_start();
    if(isset($_SESSION['usuario']))
    {
        if($_SESSION['rol']=='Administrador')
        {
            $usuario    =   $_SESSION['usuario'];
            $rol        =   $_SESSION['rol'];    
        }
        else
        {
            header('Location:menu.php');       
        }
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
            
            <h1>USUARIOS EN EL SISTEMA</h1>
                
            <form method="POST" action="../Controlador/Ctrl_ConsultaUsuarioE.php">
                <div class="form-group">
                    <label>Id Usuario</label>
                         <input type="number" placeholder="Id Usuario" class="form-control" name="txtCodigo">
                </div>        
                <input type="submit" class="btn btn-dark" value="Consultar">
            </form>
            <br>
            <?php
                if($_GET)
                {
                    $mensaje=$_GET['mensaje'];
                    
                    if($mensaje =='incorrecto'){
                            echo "<div class='alert alert-danger'>No existen datos de usuario asociados al codigo digitado, verifique los datos</div>";
                    }  
                    else
                    {   
                        if($mensaje=='noactualizo')
                        {
                            echo "<div  class='alert alert-danger'>No se pudo actualizar los datos</div>";
                        }
                        else
                        {
                            if($mensaje=='actualizo')
                            {
                                echo "<div  class='alert alert-success'>Datos actualizados correctamente</div>";
                            }
                            else
                            {
                                if($mensaje=='correcto')
                                {
                                    $idUsu      = $_SESSION['ConsIdUsu'];
                                    $correoUsu  = $_GET['corUsu'];
                                    $estadoUsu  = $_GET['estUsu'];
                ?>
                <form method="post" action="../Controlador/Ctrl_ModificarUsuario.php">
                    <div class="form-group">
                        <label>Correo:</label>
                            <input type="email" name="txtCorreoUsu" class="form-control" value="<?php echo $correoUsu;?>">
                    </div>
                    <div class="form-group">
                        <label>Estado:</label>
                            <select name="txtEstadoUsu" class="form-control">
                                <option <?php if($estadoUsu=='Activo'){echo "selected";} ?> >Activo</option>
                                <option <?php if($estadoUsu=='Inactivo'){echo "selected";} ?> >Inactivo</option>
                            </select>
                    </div>
                    <input type="submit" name="modificar" class="btn btn-dark" value="Modificar Datos"> 
                </form>
                <?php    
                                }
                            }
                        }    
                    }
                }
                ?>
        </div>
    </body>
</html>