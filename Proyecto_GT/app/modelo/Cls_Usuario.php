<?php
require_once ('../../config/Cls_conexion.php');
class clsUsuario extends clsConexion
{
    //Variables del usuario
    private $tipoDocumento;
    private $documento;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $correo;
    private $contrasena;
    private $idRol;

    private $db;

    public function __construct() //construct lleva dos guiones bajos
    {
        $this->db=parent:: __construct();
    }

    //Encapsulamiento de Variabls de Usuario
    public function settipoDocumento($Tdoc)
    {
        $this->tipoDocumento = $Tdoc;
    }    
    public function gettipoDocumento()
    {
        return $this->tipoDocumento;
    }
    public function setdocumento($Doc)
    {
        $this->documento = $Doc;
    }    
    public function getdocumento()
    {
        return $this->documento;
    }
    public function setnombre($Nom)
    {
        $this->nombre = $Nom;
    }    
    public function getnombre()
    {
        return $this->nombre;
    }
    public function setapellido($Ape)
    {
        $this->apellido = $Ape;
    }    
    public function getapellido()
    {
        return $this->apellido;
    }
    public function setdireccion($Dir)
    {
        $this->direccion = $Dir;
    }    
    public function getdireccion()
    {
        return $this->direccion;
    }
    public function settelefono($Tel)
    {
        $this->telefono = $Tel;
    }    
    public function gettelefono()
    {
        return $this->telefono;
    }
    public function setcorreo($Cor)
    {
        $this->correo = $Cor;
    }    
    public function getcorreo()
    {
        return $this->correo;
    }
    public function setContrasena($Con)
    {
        $this->contrasena = $Con;
    }    
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function setidRol($Idr)
    {
        $this->idRol = $Idr;
    }    
    public function getidRol()
    {
        return $this->idRol;
    }

    public function Login()
    {
        $Consulta = $this->db->prepare("SELECT * FROM `usuario` WHERE `correoUsuario`=:usua && `passwordUsuario`=:pass;");
        $Consulta->bindParam(':usua',$this->correo);
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

    public function Register()
    {
        $estado = 'Activo';

        try{
            $Consulta = $this->db->prepare("INSERT INTO usuario (TipoDocUsuario, NumdocUsuario, nombreUsuario, apellidoUsuario,
            direccionUsuario, telefonoUsuario, correoUsuario, passwordUsuario, estadoUsuario, idRolUsuarioFK) VALUES (:tdoc, :numdoc, :nom,
            :ape, :dir, :tel, :cor, :pass, :est, :idR)");
            $Consulta->bindParam(':tdoc',$this->tipoDocumento);
            $Consulta->bindParam(':numdoc',$this->documento);
            $Consulta->bindParam(':nom',$this->nombre);
            $Consulta->bindParam(':ape',$this->apellido);
            $Consulta->bindParam(':dir',$this->direccion);
            $Consulta->bindParam(':tel',$this->telefono);
            $Consulta->bindParam(':cor',$this->correo);
            $Consulta->bindParam(':pass',$this->contrasena);
            $Consulta->bindParam(':est',$estado);
            $Consulta->bindParam(':idR',$this->idRol);
            $Consulta->execute();
            header('location:../vista/registro_usuario.php?mensaje=ingreso');
        }
        catch(PDOException $error)
        {
            header('location:../vista/registro_usuario.php?mensaje=noingreso');
        }

    }

    //FUncion para consultar los usuarios

    public function consultar_usuarios()
    {
        $Consulta = $this->db->prepare("SELECT `idUsuario`, `tipoDocUsuario`, `numdocUsuario`, `nombreUsuario`, 
        `apellidoUsuario`, `direccionUsuario`, `telefonoUsuario`, `correoUsuario` FROM `usuario`");
        $filas=null;
        $Consulta->execute();

        while($resultado = $Consulta->fetch())
        {
            $filas[]=$resultado;
        }
        
        return $filas;
    }
}
?> 