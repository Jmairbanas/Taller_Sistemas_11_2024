<?php
require_once ('../../config/Cls_conexion.php');
class clsUsuario extends clsConexion
{
    //Variables del usuario
    private $usuario;
    private $contrasena;

    private $db;

    public function __construct() //construct lleva dos guiones bajos
    {
        $this->db=parent:: __construct();
    }

    //Encapsulamiento de Variabls de Usuario
    public function setUsuario($Usu)
    {
        $this->usuario = $Usu;
    }    
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setContrasena($Con)
    {
        $this->contrasena = $Con;
    }    
    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function Login()
    {
        $Consulta = $this->db->prepare("SELECT * FROM `usuario` WHERE `correoUsuario`=:usua && `passwordUsuario`=:pass;");
        $Consulta->bindParam(':usua',$this->usuario);
        $Consulta->bindParam(':pass',$this->contrasena);
        $Consulta->execute();

        if($Consulta->rowCount()==1)
        {
            return true;
        }
        else{
            return false;
        }

    }
}
?> 