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
        <title>PRODUCTO</title>
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
            <h1>PRODUCTOS EN EL SISTEMA</h1>
            <?php
            if($rol=='Administrador')
            {
                ?>
                    <table class="table table-bordered ">
                        <thead class="table-dark">
                            <tr>
                                <td>Id Producto</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Valor</td>
                                <td>Unidad</td>
                                <td>Stock</td>
                                <td>Estado</td>
                                <td>Funciones</td>
                            </tr>
                        </thead>
                        <?php
                            require_once('../modelo/Cls_Producto.php');
                            $objetoproducto =new clsProducto();
                            $filas=$objetoproducto->consultar_todos();

                            foreach($filas as $fila){
                        ?>
                            <tr>
                                <td><?php echo $fila['idProducto'];?></td>
                                <td><?php echo $fila['nombreProducto'];?></td>
                                <td><?php echo $fila['descripcionProducto'];?></td>
                                <td><?php echo $fila['valorProducto'];?></td>
                                <td><?php echo $fila['unidadProducto'];?></td>
                                <td><?php echo $fila['stockProducto'];?></td>
                                <td><?php echo $fila['EstadoProducto'];?></td>
                                <td>
                                    <a href="../Controlador/controlConsultarUsuario2.php?Id=<?php echo $fila['idProducto'];?>" class="btn btn-primary">EDITAR</a>
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