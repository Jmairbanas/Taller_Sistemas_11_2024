<?php
    session_start();
    if(isset($_SESSION['usuario']))
    {
        if($_SESSION['rol']=='Administrador' || $_SESSION['rol']=='Empleado')
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
        <title>FORMULARIO EMPLEADO</title>
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
            <h1>EMPLEADO</h1>
            <?php 
                if($rol=='Administrador')
                {
                    ?>
                    <h4>Tabla para consultar empleado</h4>
                    <a href="frm_consultaempleado.php">Consultar empleado</a>
                    <h4>Formulario para registrar empleado</h4>
                    <a href="frm_ingresarempleado.php">Registrar empleado</a>
                    <h4>Formulario para modificar empleado</h4>
                    <a href="frm_modificarempleado.php">Modificar empleado</a>
                    <h4>Formulario para eliminar empleado</h4>
                    <a href="frm_eliminarempleado.php">Eliminar empleado</a>
                    <h4>Mis datos de empleado</h4>
                    <a href="../controlador/Ctrl_ConsultaEmpleadoE.php">Mis datos de Empleado</a>
                    <?php
                }
                else
                {
                    if($rol=='Empleado')
                    {
                        ?>
                            <h4>Mis datos de empleado</h4>
                            <a href="../controlador/Ctrl_ConsultaEmpleadoE.php">Mis datos de Empleado</a>
                        <?php
                    }

                }
            ?>
        </div>
    </body>
</html>