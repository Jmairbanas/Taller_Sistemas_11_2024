<?php
    require_once('../modelo/Cls_Usuario.php');

    if(isset($_POST)&&!empty($_POST)){
        
        session_start();
        
        //Declaración variables Llaves principales
        $idUsu          =   $_SESSION['ConsIdUsu'];
        
        //Declaración variables Datos inicio de sesión

        $contrasenaUsu      =   $_POST['txtContrasenaUsu'];
        $confirmacionUsu    =   $_POST['txtConfirmacionUsu'];
        $correoUsu         =   $_POST['txtCorreoUsu'];
        $estadoUsu          =   $_POST['txtEstadoUsu'];

        if($contrasenaUsu==$confirmacionUsu)
        {
            $objetousuario=new clsUsuario();
        
            //Ingreso variables de la clase Llaves principales
            $objetousuario->setidUsuario($idUsu);
        
            //Ingreso de variables de la clase inicio de sesión
            $objetousuario->setContrasenaUsuario($contrasenaUsu);
            $objetousuario->setCorreoUsuario($correoUsu);
            $objetousuario->setEstadoUsuario($estadoUsu);
        }
        else
        {
            header('Location: ../Vista/frm_miusuario.php?mensaje=nocambio&corUsu='.$correoUsu.'&estUsu='.$estadoUsu);
        }
      
        /*
        //Revisar variables de la clase Llaves principales
        echo $objetoempleado->getidUsuario();
        
        //Revisar de variables de la clase inicio de sesión
        echo $objetoempleado->getContrasenaUsuario();
        echo $objetousuario->getCorreoUsuario();
        echo $objetousuario->getEstadoUsuario();*/

        $objetousuario->modificar_contrasena();
    }
?>