<?php
    require_once('Cls_Conexion.php');
    class clsEmpleado extends clsConexion  
    {
        //Variables de llaves primarias
        private $idEmpleado;
        private $idUsuario;
        private $idRol;

        //Variables de información inicio de sesión
        private $DescripcionRol;
        private $CorreoUsuario;
        private $ContrasenaUsuario;
        private $EstadoUsuario;
        
        //Variables del Empleado
        private $numeroEmpleado;
        private $tipodocEmpleado;
        private $nombreEmpleado;
        private $apellidoEmpleado;
        private $direccionEmpleado;
        private $telefonoEmpleado;
        private $correoEmpleado;
        private $estadoEmpleado;

        
        public function __construct()
        {
            $this->db=parent:: __construct();
        }

        //Encapsulamiento llaves Primarias
        public function setidUsuario($idUsu){
            $this->idUsuario=$idUsu;
        }
        public function getidUsuario(){
            return $this->idUsuario;
        }
        public function setidEmpleado($idEmp){
            $this->idEmpleado=$idEmp;
        }
        public function getidEmpleado(){
            return $this->idEmpleado;
        }
        public function setidRol($iRol){
            $this->idRol=$idRol;
        }
        public function getidRol(){
            return $this->idRol;
        }

        //Encapsulamiento Datos inicio de Sesión
        public function setDescripcionRol($DesRol){
            $this->DescripcionRol=$DesRol;
        }       
        public function getDescripcionRol(){
            return $this->DescripcionRol;
        }
        public function setCorreoUsuario($CorUsu){
            $this->CorreoUsuario=$CorUsu;
        }       
        public function getCorreoUsuario(){
            return $this->CorreoUsuario;
        }
        public function setContrasenaUsuario($ConUsu){
            $this->ContrasenaUsuario=$ConUsu;
        }       
        public function getContrasenaUsuario(){
            return $this->ContrasenaUsuario;
        }
        public function setEstadoUsuario($EstUsu){
            $this->EstadoUsuario=$EstUsu;
        }       
        public function getEstadoUsuario(){
            return $this->EstadoUsuario;
        }
        
        //Encapsulamiento Datos Empleado
        public function setnumeroEmpleado($nomEmp){
            $this->numeroEmpleado=$nomEmp;
        }       
        public function getnumeroEmpleado(){
            return $this->numeroEmpleado;
        }

        public function settipodocEmpleado($tdocEmp){
            $this->tipodocEmpleado=$tdocEmp;
        }       
        public function gettipodocEmpleado(){
            return $this->tipodocEmpleado;
        }

        public function setnombreEmpleado($nomEmp){
            $this->nombreEmpleado=$nomEmp;
        }       
        public function getnombreEmpleado(){
            return $this->nombreEmpleado;
        }

        public function setapellidoEmpleado($apeEmp){
            $this->apellidoEmpleado=$apeEmp;
        }       
        public function getapellidoEmpleado(){
            return $this->apellidoEmpleado;
        }

        public function setdireccionEmpleado($dirEmp){
            $this->direccionEmpleado=$dirEmp;
        }       
        public function getdireccionEmpleado(){
            return $this->direccionEmpleado;
        }

        public function settelefonoEmpleado($telEmp){
            $this->telefonoEmpleado=$telEmp;
        }       
        public function gettelefonoEmpleado(){
            return $this->telefonoEmpleado;
        }

        public function setcorreoEmpleado($corEmp){
            $this->correoEmpleado=$corEmp;
        }       
        public function getcorreoEmpleado(){
            return $this->correoEmpleado;
        }

        public function setestadoEmpleado($estEmp){
            $this->estadoEmpleado=$estEmp;
        }       
        public function getestadoEmpleado(){
            return $this->estadoEmpleado;
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
            $consulta=$this->db->prepare("SELECT empleado.idEmpleado, empleado.numDocEmpleado, empleado.tipoDocEmpleado, empleado.nombreEmpleado, empleado.apellidoEmpleado, empleado.direccionEmpleado, empleado.telefonoEmpleado, empleado.correoEmpleado, empleado.estadoEmpleado, usuario.correoUsuario, rol.descripcionRol FROM rol INNER JOIN usuario INNER JOIN empleado on rol.idRol = usuario.idRol and usuario.idUsuario = empleado.idUsuario;");
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
            $consulta=$this->db->prepare("SELECT * FROM rol INNER JOIN usuario INNER JOIN empleado on rol.idRol = usuario.idRol and usuario.idUsuario = empleado.idUsuario where empleado.idEmpleado = :id;");
            $consulta->bindParam(':id',$this->idEmpleado);
           

            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function ingresar_empleado()
        {
            $consulta=$this->db->prepare("CALL Pr_InsertarEmpleadoUsuario(:corUsu, :conUsu, :estUsu, :desRol,:numEmp,:tdocEmp, :nomEmp, :apeEmp,:dirEmp, :telEmp, :corEmp, :estEmp)");
            $consulta->bindParam(':corUsu',$this->CorreoUsuario);
            $consulta->bindParam(':conUsu',$this->ContrasenaUsuario);
            $consulta->bindParam(':estUsu',$this->EstadoUsuario);
            $consulta->bindParam(':desRol',$this->DescripcionRol);
            $consulta->bindParam(':numEmp',$this->numeroEmpleado);
            $consulta->bindParam(':tdocEmp',$this->tipodocEmpleado);
            $consulta->bindParam(':nomEmp',$this->nombreEmpleado);
            $consulta->bindParam(':apeEmp',$this->apellidoEmpleado);
            $consulta->bindParam(':dirEmp',$this->direccionEmpleado);
            $consulta->bindParam(':telEmp',$this->telefonoEmpleado);
            $consulta->bindParam(':corEmp',$this->correoEmpleado);
            $consulta->bindParam(':estEmp',$this->estadoEmpleado);

            if($consulta->execute())
            {
                header('location: ../Vista/frm_ingresarempleado.php?mensaje=ingreso');
            }
        else
            {
                header('location: ../Vista/frm_ingresarempleado.php?mensaje=noingreso');
            }
            
        }

        public function modificar_empleado($mensaje)
        {
            $consulta=$this->db->prepare("CALL Pr_ModificarEmpleado(:idEmp, :idUsu, :corUsu, :estUsu, :desRol,:numEmp,:tdocEmp, :nomEmp, :apeEmp,:dirEmp, :telEmp, :corEmp, :estEmp)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            $consulta->bindParam(':idUsu',$this->idUsuario);
            $consulta->bindParam(':corUsu',$this->CorreoUsuario);
            $consulta->bindParam(':estUsu',$this->EstadoUsuario);
            $consulta->bindParam(':desRol',$this->DescripcionRol);
            $consulta->bindParam(':numEmp',$this->numeroEmpleado);
            $consulta->bindParam(':tdocEmp',$this->tipodocEmpleado);
            $consulta->bindParam(':nomEmp',$this->nombreEmpleado);
            $consulta->bindParam(':apeEmp',$this->apellidoEmpleado);
            $consulta->bindParam(':dirEmp',$this->direccionEmpleado);
            $consulta->bindParam(':telEmp',$this->telefonoEmpleado);
            $consulta->bindParam(':corEmp',$this->correoEmpleado);
            $consulta->bindParam(':estEmp',$this->estadoEmpleado);

            if($consulta->execute())
            {   
                if($mensaje=='miempleado')
                {
                    if($this->DescripcionRol==1)
                    {
                        $rolusuario='Empleado';
                    }
                    else
                    {
                        if($this->DescripcionRol==3)
                        {
                            $rolusuario='Empleado';       
                        }
                    }
                    header('location: ../vista/frm_miempleado.php?mensaje=actualizo&corUsu='.$this->CorreoUsuario.'&estUsu='.$this->EstadoUsuario.'&desRol='.$rolusuario.'&numEmp='.$this->numeroEmpleado.'&tdocEmp='.$this->tipodocEmpleado.'&nomEmp='.$this->nombreEmpleado.'&apeEmp='.$this->apellidoEmpleado.'&dirEmp='.urlencode($this->direccionEmpleado).'&telEmp='.$this->telefonoEmpleado.'&corEmp='.$this->correoEmpleado.'&estEmp='.$this->estadoEmpleado);
                }
                else
                {
                    header('location: ../Vista/frm_modificarempleado.php?mensaje=actualizo');
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

            if($consulta->execute())
            {
                
            }
        else
            {
                header('location: ../Vista/frm_modificarempleado.php?mensaje=noactualizo');
            }
            
        }

        public function eliminar_empleado(){
            $consulta=$this->db->prepare("call Pr_EliminarEmpleado(:idEmp)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            if ($consulta->execute()) {
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=elimino');
            }else{
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=noelimino');
            }
        }

        public function eliminar_empleadousuario(){
            $consulta=$this->db->prepare("call Pr_EliminarEmpleadoUsuario(:idEmp, :idUsu)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            $consulta->bindParam(':idUsu',$this->idUsuario);
            if ($consulta->execute()) {
                header('Location: ../Vista/frm_modificarempleado.php?mensaje=elimino');
            }else{
                header('Location: ../Vista/frm_modificarempleado.php?mensaje=noelimino');
            }
        }
    }
?>