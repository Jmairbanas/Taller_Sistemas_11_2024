<?php
require_once('../modelo/Cls_Usuario.php');
if (isset($_POST) && !empty($_POST)) {

	session_start();

	$objetousuario = new clsUsuario();

	if(isset($_POST['txtCodigo']))
	{
		$codigo = $_POST['txtCodigo'];	
		$objetousuario->setidUsuario($codigo);
		$objetousuario->eliminar_usuario();
	}
	else
	{
		/*$idEmpleado =	$_SESSION['ConsIdEmp'];	
		$idUsuario 	=	$_SESSION['ConsIdUsu'];
		$objetoempleado->setidEmpleado($idEmpleado);
		$objetoempleado->setidUsuario($idUsuario);
		$objetoempleado->eliminar_empleadousuario();*/
	}

	//capturar el nombre del usuario que se desea eliminar
	//$nombre=$_POST['txtNombre'];
	//Capturar el nombre de usuario que esta en sesion
	//session_start();
	//$nombreSesion=$_SESSION["usuario"];

	/*if ($nombre==$nombreSesion) {
		header('Location: ../Vista/formEliminarUsuario.php?mensaje=usuarioigual');
	}else{
		//crear un objeto de la clase
		$objUsuario= new Usuario();
		//enviar el nombre a la clase para que sea eliminado el usuario
		$objUsuario->setUser($nombre);
		//INVOCAR EL METODO DE ELIMINACION
		$objUsuario->eliminarUsuario();
	}*/
}
?>