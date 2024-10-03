<?php
require_once('../modelo/Cls_Usuario.php');

if(isset($_POST)&&!empty($_POST))
{
    //Variables de captura de inputs
    $usuario        =   $_POST['Usuario'];
    $contrasena     =   $_POST['Contrasena'];

    //Revisión contenido de inputs
    //echo ($usuario);
    //echo ($contrasena);

    //Defino el objeto Usuario para conectar con la clase Usuario y usar sus métodos y varibles
    $objUsuario = new clsUsuario();

    //Guardo en las variables de la clase usuario los valores ingresados.
    $objUsuario->setcorreo($usuario);
    $objUsuario->setContrasena($contrasena);

    //Revisar que valores ingresaron en la clase usuario
    //echo $objUsuario->getcorreo();
    //echo $objUsuario->getContrasena();

    /*if($objUsuario->Login()==true)
    {
        header('location: ../vista/menu.php');
    }
    else
    {
        header('location: ../vista/login.php?fallo=error');
    }*/
    
    //ARREGLANDO
    if($objUsuario->Login()==true )
        {
            $filas = $objUsuario->consulta_rol_login();
            if($filas!=null)
            {
                foreach ($filas as $fila)
                {
                    $NombreUsuario     =   $fila['nombreUsuario'];
                    $RolUsuario        =   $fila['descriRolUsuario'];
                }
                
                session_start();
                $_SESSION['usuario']    =   $NombreUsuario;
                $_SESSION['rol']        =   $RolUsuario;


                /*swith($Rol)
                {
                    case "Administrador":
                        break;
                    case "Cliente":
                        break;
                    case "Domiciliario":
                        break;
                }*/
                
                header('location:../../index.php');
                
            }   
            else
            {
                header('location: ../vista/login.php?fallo=error');    
            }            
        }
        else
        {
            header('location: ../vista/login.php?fallo=error');
        }

}
?>