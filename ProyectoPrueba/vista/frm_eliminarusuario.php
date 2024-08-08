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
            <h1>ELIMINAR USUARIO</h1>
            <?php
                
                if($_GET)
                {
                    $mensaje=$_GET['mensaje'];
                    if($mensaje=='noelimino')
                    {   
                        echo "<div class='alert alert-danger'>No se puede eliminar al usuario debido a restricciones en la base de datos</div>";
                    }
                    else
                    {
                        if($mensaje=='elimino')
                        {
                            echo "<div class='alert alert-success'>Usuario Eliminado Correctamente</div>";
                        }
                    }
                }
                /*if ($_GET) 
                {
                    $mensaje=$_GET['mensaje'];
                    if ($mensaje=='usuarioigual') 
                    {
                        echo "<div class='alert alert-danger'>No se puede eliminar al usuario que está en sesión</div>";
                    }
                    else
                    {
                        if ($mensaje=='incorrecto') 
                        {
                            echo "<div class='alert alert-danger'>No se puede eliminar al usuario debido a restricciones en la base de datos</div>";
                        }
                        else
                        {
                            echo "<div class='alert alert-success'>Usuario Eliminado Correctamente</div>";
                        }
                    }
                }*/
        ?>
        <form method="POST" action="../controlador/Ctrl_EliminarUsuario.php">
            <div class="form-group">
                <div class="form-group">
                    <label>Número Documento:</label>
                        <input type="number" name="txtCodigo" class="form-control" placeholder="Identificación del empleado">
                </div>
                <input type="submit" name="btnEliminarUsuario" value="Eliminar" class="btn btn-dark" onclick="return alerta();">
            </div>
        </form>
        <script type="text/javascript">
            function alerta()
            {
                var opcion=confirm("Está seguro de que desea eliminar al usuario?");
                return opcion;
            }
        </script>
    </body>
</html>