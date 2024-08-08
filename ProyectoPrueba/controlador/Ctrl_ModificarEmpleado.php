<?php
    require_once('../modelo/Cls_Empleado.php');

    if(isset($_POST)&&!empty($_POST)){
        
        session_start();
        
        //Variable para diferenciar el modificar mi usuario y modificar usuario general
        $miempleado      =   $_GET['mensaje'];

        //Declaración variables Llaves principales
        $idUsu          =   $_SESSION['ConsIdUsu'];
        $idEmp          =   $_SESSION['ConsIdEmp'];
        
        //Declaración variables Datos inicio de sesión

        $correoUsu      =   $_POST['txtCorreoUsu'];
        if(isset($_POST['txtRolEmp']))
        {
            $descripcionRol =   $_POST['txtRolEmp'];    
        }
        else
        {
            $descripcionRol = "1";
        }
        
        if(isset($_POST['txtEstadoUsu']))
        {
            $estadoUsu  =   $_POST['txtEstadoUsu'];    
        }
        else
        {
            $estadoUsu  =   "Activo";   
        }
        
        //Declaración variables Datos Empleado
        $numeroIdEmp    =   $_POST['txtNumeroIdEmp'];
        $tdocumentoEmp  =   $_POST['txtTDocEmp'];
        $nombreEmp      =   $_POST['txtNombreEmp'];
        $apellidoEmp    =   $_POST['txtApellidoEmp'];
        $direccionEmp   =   $_POST['txtDireccionEmp'];
        $telefonoEmp    =   $_POST['txtTelefonoEmp'];
        $correoEmp      =   $_POST['txtCorreoEmp'];
        
        if(isset($_POST['txtEstadoEmp']))
        {
            $estadoEmp  =   $_POST['txtEstadoEmp'];    
        }
        else
        {
            $estadoEmp  =   "Activo";   
        }
        

        $objetoempleado=new clsEmpleado();
        
        //Ingreso variables de la clase Llaves principales
        $objetoempleado->setidUsuario($idUsu);
        $objetoempleado->setidEmpleado($idEmp);
        
        
        //Ingreso de variables de la clase inicio de sesión
        $objetoempleado->setCorreoUsuario($correoUsu);
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
        //Revisar variables de la clase Llaves principales
        echo $objetoempleado->getidUsuario();
        echo $objetoempleado->getidEmpleado();
        
        
        //Revisar de variables de la clase inicio de sesión
        echo $objetoempleado->getCorreoUsuario();
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

        $objetoempleado->modificar_empleado($miempleado);
    }
?>