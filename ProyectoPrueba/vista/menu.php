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
        <title>MENU PRINCIPAL</title>
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
            <!--<div class="badge badge-dark">
                Bienvenido al sistema:
                <span class="badge badge-light"><?php echo $usuario;?></span>
                Rol:
                <span class="badge badge-light"><?php echo $rol;?></span>
            </div>-->
            
            <h1><b>Bienvenido al sistema: </b><?php echo $usuario;?></h1> 
            <br><h2><b>Rol: </b><?php echo $rol;?></h2>
        </div>
    </body>
</html>