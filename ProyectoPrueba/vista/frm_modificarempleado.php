<?php
    session_start();
    if(isset($_SESSION['usuario']))
    {
        if($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Empleado')
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
            <h1>ACTUALIZAR EMPLEADO</h1>
            <?php
            if($rol=='Administrador')
            {
            ?>
                <form method="POST" action="../Controlador/Ctrl_ConsultaEmpleadoE.php">
                    <div class="form-group">
                        <label>Id Empleado</label>
                            <input type="number" placeholder="Id Empleado" class="form-control" name="txtCodigo">
                    </div>        
                    <input type="submit" class="btn btn-dark" value="Consultar">
                </form>
                <br>
                <?php
                    if($_GET)
                    {
                        $mensaje=$_GET['mensaje'];
                        
                        if($mensaje =='incorrecto'){
                            echo "<div class='alert alert-danger'>No existen datos de empleado asociados al codigo digitado, verifique los datos</div>";
                        }  
                        else
                        {   
                            if($mensaje=='noactualizo')
                            {
                                echo "<div  class='alert alert-danger'>No se pudo actualizar los datos</div>";
                            }
                            else
                            {
                                if($mensaje=='actualizo')
                                {
                                    echo "<div  class='alert alert-success'>Datos actualizados correctamente</div>";
                                }
                                else
                                {
                                    if($mensaje=='noelimino')
                                    {
                                        echo "<div class='alert alert-danger'>No se puede eliminar al usuario debido a restricciones en la base de datos</div>";
                                    }
                                    else
                                    {
                                        if($mensaje=='elimino')
                                        {
                                            echo "<div  class='alert alert-success'>Empleado eliminado correctamente</div>";
                                        }
                                        else
                                        {
                                            if($mensaje=='correcto')
                                            {

                                                //Llaves para realizar inscripción
                                                $idEmp          =   $_SESSION['ConsIdEmp'];
                                                $idUsu          =   $_SESSION['ConsIdUsu'];
                                    
                                                //Campos Ingreso de Sesion y Rol
                                               $correoUsu      =   $_GET['corUsu'];
                                                $estadoUsu      =   $_GET['estUsu'];
                                                $descripcionRol =   $_GET['desRol'];
                                        
                                                //Datos Empleado
                                                $numeroIdEmp    =   $_GET['numEmp'];
                                                $tdocumentoEmp  =   $_GET['tdocEmp'];
                                                $nombreEmp      =   $_GET['nomEmp'];
                                                $apellidoEmp    =   $_GET['apeEmp'];
                                                $direccionEmp   =   $_GET['dirEmp'];
                                                $telefonoEmp    =   $_GET['telEmp'];
                                                $correoEmp      =   $_GET['corEmp'];
                                                $estadoEmp      =   $_GET['estEmp'];    

                ?>
                <form method="post" name="FormEditarEmpleado"><!--action="../Controlador/Ctrl_ModificarEmpleado.php">-->
                    <h4>Datos de Ingreso</h4>
                    <div class="form-group">
                        <label>Correo de Ingreso:</label>
                            <input type="email" name="txtCorreoUsu" class="form-control" value="<?php echo $correoUsu;?>">
                    </div>
                    <div class="form-group">
                        <label>Rol:</label>
                            <select name="txtRolEmp" class="form-control">
                                <option value='3' <?php if($descripcionRol=='Administrador'){echo "selected";} ?> >Administrador</option>
                                <option value='1'<?php if($descripcionRol=='Empleado'){echo "selected";} ?> >Empleado</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Estado Usuario:</label>
                            <select name="txtEstadoUsu" class="form-control">
                                <option <?php if($estadoUsu=='Activo'){echo "selected";} ?> >Activo</option>
                                <option <?php if($estadoUsu=='Inactivo'){echo "selected";} ?> >Inactivo</option>
                            </select>
                    </div>
                    <br>
                    <h4>Datos del Empleado</h4>
                    <div class="form-group">
                        <label>Número Documento:</label>
                            <input type="text" name="txtNumeroIdEmp" class="form-control" value="<?php echo $numeroIdEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Documento:</label>
                            <select name="txtTDocEmp" class="form-control">
                                <option <?php if($tdocumentoEmp=='CC'){echo "selected";} ?> >CC</option>
                                <option <?php if($tdocumentoEmp=='CE'){echo "selected";} ?> >CE</option>
                                <option <?php if($tdocumentoEmp=='OTRO'){echo "selected";} ?> >OTRO</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Nombres:</label>
                            <input type="text" name="txtNombreEmp" class="form-control" value="<?php echo $nombreEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Apellidos:</label>
                            <input type="text" name="txtApellidoEmp" class="form-control" value="<?php echo $apellidoEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Dirección:</label>
                            <input type="text" name="txtDireccionEmp" class="form-control" value="<?php echo $direccionEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Teléfono:</label>
                            <input type="number" name="txtTelefonoEmp" class="form-control" value="<?php echo $telefonoEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Correo:</label>
                            <input type="email" name="txtCorreoEmp" class="form-control" value="<?php echo $correoEmp;?>">
                    </div>
                    <div class="form-group">
                        <label>Estado:</label>
                            <select name="txtEstadoEmp" class="form-control">
                                <option <?php if($estadoEmp=='Activo'){echo "selected";} ?> >Activo</option>
                                <option <?php if($estadoEmp=='Inactivo'){echo "selected";} ?> >Inactivo</option>
                            </select>
                    </div>
                    <!--<input type="submit" name="modificar" class="btn btn-dark" value="Modificar Datos" class="btn btn-success"> -->
                    <input type="button" value="Actualizar" id="actualizar" class="btn btn-dark" onclick= "document.FormEditarEmpleado.action = '../Controlador/Ctrl_ModificarEmpleado.php'; document.FormEditarEmpleado.submit()" />
                    <input type="button" value="Eliminar" id="eliminar" class="btn btn-dark" onclick= "alerta()" />
                </form>
                <script type="text/javascript">
                    function alerta()
                    {
                        var mensaje;
                        var opcion = confirm("Está seguro de que desea eliminar al usuario?");
                        if (opcion == true) 
                        {
                            document.FormEditarEmpleado.action = '../Controlador/Ctrl_EliminarEmpleado.php';
                            document.FormEditarEmpleado.submit();   
                        } 
                    }
                </script>
                <?php    
                                        }
                                    }
                                }
                            }
                        }    
                    }
                }
                ?>      
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