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
    $objUsuario->setUsuario($usuario);
    $objUsuario->setContrasena($contrasena);

    //Revisar que valores ingresaron en la clase usuario
    //echo $objUsuario->getUsuario();
    //echo $objUsuario->getContrasena();

    if($objUsuario->Login()==true)
    {
        header('location: ../vista/menu.php');
    }
    else
    {
        header('location: ../vista/login.php?fallo=error');
    }

}
?>