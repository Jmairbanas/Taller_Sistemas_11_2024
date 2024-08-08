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
        <title>CLIENTE</title>
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
            <h1>CLIENTES EN EL SISTEMA</h1>
            <?php
            if($rol=='Administrador')
            {
                ?>
                    <table class="table table-bordered ">
                        <thead class="table-dark">
                            <tr>
                                <td>Id Cliente</td>
                                <td>No Identificación</td>
                                <td>Tipo Documento</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Dirección</td>
                                <td>Telefono</td>
                                <td>Correo</td>
                                <td>Estado</td>
                                <td>Usuario</td>
                                <td>Rol</td>
                                <td>Funciones</td>
                            </tr>
                        </thead>
                        <?php
                            require_once('../modelo/Cls_Cliente.php');
                            $objetocliente =new clsCliente();
                            $filas=$objetocliente->consultar_todos();

                            foreach($filas as $fila){
                        ?>
                            <tr>
                                <td><?php echo $fila['idCliente'];?></td>
                                <td><?php echo $fila['numDocCliente'];?></td>
                                <td><?php echo $fila['tipoDocCliente'];?></td>
                                <td><?php echo $fila['nombreCliente'];?></td>
                                <td><?php echo $fila['apellidoCliente'];?></td>
                                <td><?php echo $fila['direccionCliente'];?></td>
                                <td><?php echo $fila['telefonoCliente'];?></td>
                                <td><?php echo $fila['correoCliente'];?></td>
                                <td><?php echo $fila['estadoCliente'];?></td>
                                <td><?php echo $fila['correoCliente'];?></td>
                                <td><?php echo $fila['descripcionRol'];?></td>
                                <td>
                                    <a href="../Controlador/controlConsultarUsuario2.php?Id=<?php echo $fila['idCliente'];?>" class="btn btn-primary">EDITAR</a>
                                    <a class="btn btn-danger">BORRAR</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
            <?php    
            }
            else
            {
                if($rol=='Empleado')
                {
                    ?>
                        
                    <?php
                }   
            }
            ?>
        </div>
    </body>
</html>