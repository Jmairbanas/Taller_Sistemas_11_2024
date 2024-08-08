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
            <h1>USUARIO</h1>
            <?php
            if($rol=='Administrador')
            {
                ?>
                <h4>Tabla para consultar usuario</h4>
                <a href="frm_consultausuario.php">Consultar usuario</a>
                <h4>Formulario para modificar usuario</h4>
                <a href="frm_modificarusuario.php">Modificar usuario</a>
                <h4>Formulario para eliminar usuario</h4>
                <a href="frm_eliminarusuario.php">Eliminar usuario</a>
                <h4>Mis datos de usuario</h4>
                <a href="../controlador/Ctrl_ConsultaUsuarioE.php">Mis datos de usuario</a>
                <?php    
            }
            else
            {
                if($rol=='Empleado'||$rol=='Cliente')
                {
                    ?>
                    <h4>Mis datos de usuario</h4>
                    <a href="../controlador/Ctrl_ConsultaUsuarioE.php">Mis datos de usuario</a>
                    <?php
                }   
            }
            ?>
        </div>
    </body>
</html>