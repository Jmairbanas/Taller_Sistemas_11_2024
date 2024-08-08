<?php
    require_once('../Modelo/Cls_Usuario.php');

    if(isset($_POST) && !empty($_POST))
    {
        $usuario = $_POST['Usuario'];
        $clave = $_POST['Contrasena'];
        

        //Crear objetos de la clase usuario
        $objUsuario= new clsUsuario();


        //Envio datos a la clase
        $objUsuario->setCorreoUsuario($usuario);
        $objUsuario->setContrasenaUsuario($clave);

        //Revisión datos guardados en la clase
        //echo $objUsuario->getCorreoUsuario($usuario);
        //echo $objUsuario->getContrasenaUsuario($clave);
        

        //Verificar datos//

        
        if($objUsuario->Login()==true )
        {
            $filas =$objUsuario->datos_empleado(); 
            if($filas!=null)
            {
                foreach ($filas as $fila)
                {
                    $idUsuario          =   $fila['idUsuario'];
                    $idEmpleado         =   $fila['idEmpleado'];
                    $NombresUsuario     =   $fila['nombreEmpleado'];
                    $ApellidosUsuario   =   $fila['apellidoEmpleado'];
                    $RolUsuario         =   $fila['descripcionRol'];
                }
                
                header('location: ../Vista/menu.php');
                session_start();
                $_SESSION['ConsIdUsu']  =   $idUsuario;   
                $_SESSION['ConsIdEmp']  =   $idEmpleado;
                $_SESSION['usuario']    =   $NombresUsuario." ".$ApellidosUsuario;
                $_SESSION['rol']        =   $RolUsuario;
            }   
            else
            {
                $filas =$objUsuario->datos_cliente();
                if($filas!=null)
                {
                    foreach ($filas as $fila)
                    {
                        $idUsuario          =   $fila['idUsuario'];
                        $idCliente          =   $fila['idCliente'];
                        $NombresUsuario     =   $fila['nombreCliente'];
                        $ApellidosUsuario   =   $fila['apellidoCliente'];
                        $RolUsuario         =   $fila['descripcionRol'];
                    }
                
                    header('location: ../Vista/menu.php');
                    session_start();
                    $_SESSION['ConsIdUsu']  =   $idUsuario;
                    $_SESSION['ConsIdCli']  =   $idCliente;
                    $_SESSION['usuario']    =   $NombresUsuario." ".$ApellidosUsuario;
                    $_SESSION['rol']        =   $RolUsuario;
                }
                else
                {
                    header('location: ../Vista/Login.php?fallo=error');
                }
            }            
        }
        else
        {
            header('location: ../Vista/Login.php?fallo=error');
        }
    }
?>