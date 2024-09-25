<?php
require_once('../modelo/Cls_Usuario.php');
$idU = $_GET['ID'];
//echo $idU;

$objUsuario = new clsUsuario();
$objUsuario->setidUsuario($idU);

//echo $objUsuario->getidUsuario();

$filas = $objUsuario->consultar_usuarioE();

foreach($filas as $fila)
{
    //`idUsuario`, `tipoDocUsuario`, `numdocUsuario`, `nombreUsuario`, `apellidoUsuario`, `direccionUsuario`, `telefonoUsuario`, `correoUsuario`
    $tipoDocU = $fila['tipoDocUsuario'];
    $numdocU = $fila['numdocUsuario'];

    header('location: ../Vista/EditarUsuario.php?mensaje=consulta&idUsuario='.$idU.'&tipoDocUsuario='
    .$tipoDocU.'&DocumentoUsuario='.$numdocU);
}
?>