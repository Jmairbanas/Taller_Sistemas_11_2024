<?php
    require_once('../modelo/Cls_Empleado.php');

    if(isset($_POST)&&!empty($_POST)){
        
        //session_start();
        
        //Declaración variables Datos inicio de sesión

        $correoUsu      =   $_POST['txtCorreoUsu'];
        $contrasenaUsu  =   $_POST['txtContrasenaUsu'];
        $descripcionRol =   $_POST['txtRolEmp'];
        $estadoUsu      =   $_POST['txtEstadoUsu'];
        
        //Declaración variables Datos Empleado
        $numeroIdEmp    =   $_POST['txtNumeroIdEmp'];
        $tdocumentoEmp  =   $_POST['txtTDocEmp'];
        $nombreEmp      =   $_POST['txtNombreEmp'];
        $apellidoEmp    =   $_POST['txtApellidoEmp'];
        $direccionEmp   =   $_POST['txtDireccionEmp'];
        $telefonoEmp    =   $_POST['txtTelefonoEmp'];
        $correoEmp      =   $_POST['txtCorreoEmp'];
        $estadoEmp      =   $_POST['txtEstadoEmp'];



      
        $objetoempleado=new clsEmpleado();
        
                
        //Ingreso de variables de la clase inicio de sesión
        $objetoempleado->setCorreoUsuario($correoUsu);
        $objetoempleado->setContrasenaUsuario($contrasenaUsu);
        $objetoempleado->setDescripcionRol($descripcionRol);
        $objetoempleado->setEstadoUsuario($estadoUsu);
        
        //Ingreso de variables de la clase Datos Empleados
        $objetoempleado->setnumeroEmpleado($numeroIdEmp);
        $objetoempleado->settipodocEmpleado($tdocumentoEmp);
        $objetoempleado->setnombreEmpleado($nombreEmp);
        $objetoempleado->setapellidoEmpleado($apellidoEmp);
        $objetoempleado->setdireccionEmpleado($direccionEmp);
        $objetoempleado->settelefonoEmpleado($telefonoEmp);
        $objetoempleado->setcorreoEmpleado($correoEmp);
        $objetoempleado->setestadoEmpleado($estadoEmp);


        /*
        
        //Revisar de variables de la clase inicio de sesión
        echo $objetoempleado->getCorreoUsuario();
        echo $objetoempleado->getContrasenaUsuario();
        echo $objetoempleado->getDescripcionRol();
        echo $objetoempleado->getEstadoUsuario();
        
        //Revisar de variables de la clase Datos Empleados
        echo $objetoempleado->getnumeroEmpleado();
        echo $objetoempleado->gettipodocEmpleado();
        echo $objetoempleado->getnombreEmpleado();
        echo $objetoempleado->getapellidoEmpleado();
        echo $objetoempleado->getdireccionEmpleado();
        echo $objetoempleado->gettelefonoEmpleado();
        echo $objetoempleado->getcorreoEmpleado();
        echo $objetoempleado->getestadoEmpleado();
        */
        
        $objetoempleado->ingresar_empleado();
    }
?>