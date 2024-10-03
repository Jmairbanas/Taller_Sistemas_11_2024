<?php
    require_once('../modelo/Cls_Usuario.php');
    $objUsuario     =   new clsUsuario();
    $idUsuario      =   $_GET['ID'];
     
    $objUsuario->setidUsuario($idUsuario);
    $objUsuario->EliminarUsuario();
?>