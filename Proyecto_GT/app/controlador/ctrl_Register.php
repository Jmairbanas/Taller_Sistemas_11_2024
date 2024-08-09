<?php
require_once('../modelo/Cls_Usuario.php');

if(isset($_POST)&&!empty($_POST))
{
    //Variables de captura de inputs
    
    $tipoDocumento    =   $_POST['TipoDoc'];
    $documento        =   $_POST['Documento'];
    $nombre           =   $_POST['Nombre'];
    $apellido         =   $_POST['Apellido'];
    $direccion        =   $_POST['Direccion'];
    $telefono         =   $_POST['Telefono'];
    $correo           =   $_POST['Correo'];
    $contrasena       =   $_POST['Contrasena'];
    $idRol            =   $_POST['Rol'];

    //Revisión contenido de inputs
    /*echo ($tipoDocumento);
    echo ($documento);
    echo ($nombre);
    echo ($apellido);
    echo ($direccion);
    echo ($telefono);
    echo ($correo);
    echo ($contrasena);
    echo ($idRol);*/

    //Defino el objeto Usuario para conectar con la clase Usuario y usar sus métodos y varibles
    $objUsuario = new clsUsuario();

    //Guardo en las variables de la clase usuario los valores ingresados.
    
    $objUsuario->settipoDocumento($tipoDocumento);
    $objUsuario->setdocumento($documento);
    $objUsuario->setnombre($nombre);
    $objUsuario->setapellido($apellido);
    $objUsuario->setdireccion($direccion);
    $objUsuario->settelefono($telefono);
    $objUsuario->setcorreo($correo);
    $objUsuario->setContrasena($contrasena);
    $objUsuario->setidRol($idRol);

    //Revisar que valores ingresaron en la clase usuario
    //echo $objUsuario->getUsuario();
    //echo $objUsuario->getContrasena();

    $objUsuario->Register();

}
?>