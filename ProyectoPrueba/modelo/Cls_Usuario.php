<?php
    require_once('Cls_Conexion.php');
    class clsUsuario extends clsConexion  
    {
        private $idUsuario;
        private $CorreoUsuario;
        private $ContrasenaUsuario;
        private $EstadoUsuario;
        private $idRol;
        
        public function __construct()
        {
            $this->db=parent:: __construct();
        }

        //Encapsulamiento----------------------------------
        public function setidUsuario($idUsu){
            $this->idUsuario=$idUsu;
        }
        public function getidUsuario(){
            return $this->idUsuario;
        }
        public function setCorreoUsuario($CorreoUsu){
            $this->CorreoUsuario=$CorreoUsu;
        }       
        public function getCorreoUsuario(){
            return $this->CorreoUsuario;
        }
        public function setContrasenaUsuario($ContraUsu){
            $this->ContrasenaUsuario=$ContraUsu;
        }       
        public function getContrasenaUsuario(){
            return $this->ContrasenaUsuario;
        }
        public function setEstadoUsuario($EstaUsu){
            $this->EstadoUsuario=$EstaUsu;
        }       
        public function getEstadoUsuario(){
            return $this->EstadoUsuario;
        }
        public function setidRol($iRol){
            $this->idRol=$idRol;
        }
        public function getidRol(){
            return $this->idRol;
        }

        //Métodos de la clase--------------------------------

        public function Login()
        {
            
            $consulta=$this->db->prepare("SELECT * FROM Usuario where correoUsuario= :Usuario and passwordUsuario =:Clave");
            $consulta->bindParam(':Usuario',$this->CorreoUsuario);
            $consulta->bindParam(':Clave',$this->ContrasenaUsuario);
            $consulta->execute();

            if($consulta->rowCount()==1)
            {
                return true;
            }
            else{
                return false;
            }

        }
    
        public function consultar_todos()
        {
            $consulta=$this->db->prepare("SELECT * FROM Usuario");
            $filas=null;
            $consulta->execute();

            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function consultar_codigo()
        {
            $filas=null;
            $consulta=$this->db->prepare("SELECT * FROM Usuario WHERE idUsuario=:id");
            $consulta->bindParam(':id',$this->idUsuario);
            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function datos_empleado()
        {
            $filas=null;
            $consulta=$this->db->prepare("SELECT rol.descripcionRol, usuario.idUsuario, usuario.correoUsuario, empleado.idEmpleado, empleado.nombreEmpleado, empleado.apellidoEmpleado FROM rol INNER JOIN usuario INNER JOIN empleado on rol.idRol = usuario.idRol and usuario.idUsuario = empleado.idUsuario where usuario.correoUsuario = :correo;");
            $consulta->bindParam(':correo',$this->CorreoUsuario);
            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function datos_cliente()
        {
            $filas=null;
            $consulta=$this->db->prepare("SELECT rol.descripcionRol, usuario.idUsuario, usuario.correoUsuario, cliente.idCliente, cliente.nombreCliente, cliente.apellidoCliente FROM rol INNER JOIN usuario INNER JOIN cliente on rol.idRol = usuario.idRol and usuario.idUsuario = cliente.idUsuario where usuario.correoUsuario = :correo;");
            $consulta->bindParam(':correo',$this->CorreoUsuario);
            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function modificar_usuario($mensaje)
        {
            $consulta=$this->db->prepare("CALL Pr_ModificarUsuario(:id,:correo,:estado);");
            $consulta->bindParam(':id',$this->idUsuario);
            $consulta->bindParam(':correo',$this->CorreoUsuario);
            $consulta->bindParam(':estado',$this->EstadoUsuario);

            if($consulta->execute())
            {   
                if($mensaje=='miusuario')
                {
                    header('location: ../vista/frm_miusuario.php?mensaje=actualizo&corUsu='.$this->CorreoUsuario.'&estUsu='.$this->EstadoUsuario);
                }
                else
                {
                    header('location: ../vista/frm_modificarusuario.php?mensaje=actualizo');
                }
            }
            else
            {
                if($mensaje=='miusuario')
                {
                    header('location: ../vista/frm_miusuario.php?mensaje=noactualizo');
                }
                else
                {
                    header('location: ../vista/frm_modificarusuario.php?mensaje=noactualizo');   
                }
            }
            
        }

        public function modificar_contrasena()
        {
            $consulta=$this->db->prepare("CALL Pr_ModificarContrasena(:id,:con);");
            $consulta->bindParam(':id',$this->idUsuario);
            $consulta->bindParam(':con',$this->ContrasenaUsuario);

            if ($consulta->execute()) {
                header('Location: ../vista/frm_miusuario.php?mensaje=cambio&corUsu='.$this->CorreoUsuario.'&estUsu='.$this->EstadoUsuario);
            }else{
                header('Location: ../vista/frm_miusuario.php?mensaje=nocambio&corUsu='.$this->CorreoUsuario.'&estUsu='.$this->EstadoUsuario);
            }

        }

        public function eliminar_usuario(){
            $consulta=$this->db->prepare("call Pr_EliminarUsuario(:idUsu)");
            $consulta->bindParam(':idUsu',$this->idUsuario);
            if ($consulta->execute()) {
                header('Location: ../vista/frm_eliminarusuario.php?mensaje=elimino');
            }else{
                header('Location: ../vista/frm_eliminarusuario.php?mensaje=noelimino');
            }
        }
    }
?>