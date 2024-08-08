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
        <title>FORMULARIO PRODUCTO</title>
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
            <h1>PRODUCTO</h1>
            <?php 
            if($rol=='Administrador')
            {
            ?>
                <h4>Tabla para consultar producto</h4>
                <a href="frm_consultaproducto.php">Consultar producto</a>
                <h4>Formulario para registrar producto</h4>
                <a href="#">Registrar producto</a>
                <h4>Formulario para modificar producto</h4>
                <a href="#">Modificar producto</a>
                <h4>Formulario para eliminar producto</h4>
                <a href="#">Eliminar producto</a>
            <?php
            }
            else
            {
                if($rol=='Empleado')
                {
                ?>
                    <h4>Tabla para consultar producto</h4>
                    <a href="#">Consultar producto</a>
                    <h4>Formulario para registrar producto</h4>
                    <a href="#">Registrar producto</a>
                    <h4>Formulario para modificar producto</h4>
                    <a href="#">Modificar producto</a>
                <?php
                }
                else
                {
                    if($rol=='Cliente')
                    {
                    ?>
                        <h4>Tabla para consultar producto</h4>
                        <a href="#">Consultar producto</a>
                    <?php
                    }
                }
            }
            ?>
        </div>
    </body>
</html>