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
                
                <table class="table table-bordered ">
                    <thead class="table-dark">
                        <tr>
                            <td>Id Usuario</td>
                            <td>Correo Electrónico</td>
                            <td>Estado</td>
                            <td>Funciones</td>
                        </tr>
                    </thead>
                    <?php
                        require_once('../modelo/Cls_Usuario.php');
                        $objetousuario =new clsUsuario();
                        $filas=$objetousuario->consultar_todos();

                        foreach($filas as $fila){
                    ?>
                        <tr>
                            <td><?php echo $fila['idUsuario'];?></td>
                            <td><?php echo $fila['correoUsuario'];?></td>
                            <td><?php echo $fila['estadoUsuario'];?></td>
                            <td>
                                <a href="../Controlador/controlConsultarUsuario2.php?Id=<?php echo $fila['idUsuario'];?>" class="btn btn-primary">EDITAR</a>
                                <a class="btn btn-danger">BORRAR</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
        </div>
    </body>
</html>