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
        <title>FORMULARIO CLIENTE</title>
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
            <h1>CLIENTE</h1>
            <?php 
            if($rol=="Administrador")
            {
            ?>
                <h4>Tabla para consultar cliente</h4>
                <a href="frm_consultacliente.php">Consultar cliente</a>
                <h4>Formulario para registrar cliente</h4>
                <a href="#">Registrar cliente</a>
                <h4>Formulario para modificar cliente</h4>
                <a href="#">Modificar cliente</a>
                <h4>Formulario para eliminar cliente</h4>
                <a href="#">Eliminar cliente</a>    
            <?php 
            }
            else
            {
                if($rol=="Empleado")
                {
                ?>
                    <h4>Tabla para consultar cliente</h4>
                    <a href="frm_consultacliente.php">Consultar cliente</a>
                    <h4>Formulario para registrar cliente</h4>
                    <a href="#">Registrar cliente</a>
                    <h4>Formulario para modificar cliente</h4>
                    <a href="#">Modificar cliente</a>
                <?php
                }
                else
                {
                    if($rol=="Cliente")
                    {
                    ?>
                        <h4>Mis datos</h4>
                        <a href="#">Verificar y modificar mis datos</a>
                    <?php
                    }
                }
            }
            ?>
            
        </div>
    </body>
</html>