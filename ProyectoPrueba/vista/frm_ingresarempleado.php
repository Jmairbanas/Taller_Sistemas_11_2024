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
        <title>EMPLEADO</title>
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
            <h1>EMPLEADOS EN EL SISTEMA</h1>
            <?php 
                if($_GET)
                {
                    $mensaje = $_GET['mensaje'];
                    if($mensaje=='ingreso')
                    {
                        echo "<div class='alert alert-success'>Se ingresaron los datos del empleado correctamente</div>";
                    }
                    else
                    {
                        if($mensaje=='noingreso')
                        {
                            echo "<div class='alert alert-danger'>No se pudo ingresar los datos del empleado, verifique los datos</div>";
                        }
                    }
                }
            ?>
            <form method="post" action="../Controlador/Ctrl_IngresarEmpleado.php">
                <h4>Datos de Ingreso</h4>
                <div class="form-group">
                    <label>Correo de Ingreso:</label>
                        <input type="email" name="txtCorreoUsu" class="form-control" placeholder="Correo con el que va a ingresar al sistema">
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                        <input type="password" name="txtContrasenaUsu" class="form-control" placeholder="Contraseña con la que va a ingresar al sistema">
                </div>
                <div class="form-group">
                    <label>Rol:</label>
                        <select name="txtRolEmp" class="form-control">
                            <option value='3'>Administrador</option>
                            <option value='1' selected>Empleado</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>Estado Usuario:</label>
                        <select name="txtEstadoUsu" class="form-control">
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                </div>
                <br>
                <h4>Datos del Empleado</h4>
                <div class="form-group">
                    <label>Número Documento:</label>
                        <input type="text" name="txtNumeroIdEmp" class="form-control" placeholder="Número de documento del Empleado">
                </div>
                <div class="form-group">
                    <label>Tipo de Documento:</label>
                        <select name="txtTDocEmp" class="form-control">
                            <option value='CC' selected>CC</option>
                            <option value='CE'>CE</option>
                            <option value='OTRO'>OTRO</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>Nombres:</label>
                        <input type="text" name="txtNombreEmp" class="form-control" placeholder="Nombres del Empleado">
                </div>
                <div class="form-group">
                    <label>Apellidos:</label>
                        <input type="text" name="txtApellidoEmp" class="form-control" placeholder="Apellidos del Empleado">
                </div>
                <div class="form-group">
                    <label>Dirección:</label>
                        <input type="text" name="txtDireccionEmp" class="form-control" placeholder="Dirección del Empleado">
                </div>
                <div class="form-group">
                    <label>Teléfono:</label>
                        <input type="number" name="txtTelefonoEmp" class="form-control" placeholder="Número de telefono del Empleado">
                </div>
                <div class="form-group">
                    <label>Correo:</label>
                        <input type="email" name="txtCorreoEmp" class="form-control" placeholder="Dirección de correo electrónico del Empleado">
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                        <select name="txtEstadoEmp" class="form-control">
                            <option value='Activo' selected>Activo</option>
                            <option value='Inactivo'> >Inactivo</option>
                        </select>
                </div>
                <input type="submit" name="ingresar" class="btn btn-dark" value="Ingresar Datos" class="btn btn-success"> 
            </form>
        </div>
    </body>
</html>