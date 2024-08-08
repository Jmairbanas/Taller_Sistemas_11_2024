<?php
    require_once('../modelo/Cls_Usuario.php');

    if(isset($_POST)&&!empty($_POST)){
        
        session_start();

        //Variable para diferenciar el modificar mi usuario y modificar usuario general
        $miusuario      =   $_GET['mensaje'];

        $idUsu              =   $_SESSION['ConsIdUsu'];
        $correoUsu          =   $_POST['txtCorreoUsu'];

        if(isset($_POST['txtEstadoUsu']))
        {
            $estadoUsu  =   $_POST['txtEstadoUsu'];    
        }
        else
        {
            $estadoUsu  =   "Activo";   
        }
      
        $objetousuario=new clsUsuario();
        
        $objetousuario->setidUsuario($idUsu);
        $objetousuario->setCorreoUsuario($correoUsu);
        $objetousuario->setEstadoUsuario($estadoUsu);
        

        /*echo $objetousuario->getidUsuario();
        echo $objetousuario->getCorreoUsuario();
        echo $objetousuario->getEstadoUsuario();*/

        $objetousuario->modificar_usuario($miusuario);
    }
?>