<?php
    require_once('Cls_Conexion.php');
    class clsCliente extends clsConexion  
    {
        //Variables de llaves primarias
        private $idCliente;
        private $idUsuario;
        private $idRol;

        //Variables de información inicio de sesión
        private $DescripcionRol;
        private $CorreoUsuario;
        private $ContrasenaUsuario;
        private $EstadoUsuario;
        
        //Variables del Empleado
        private $numeroCliente;
        private $tipodoCliente;
        private $nombreCliente;
        private $apellidoCliente;
        private $direccionCliente;
        private $telefonoCliente;
        private $correoCliente;
        private $estadoCliente;

        
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
        public function setidCliente($idCli){
            $this->idCliente=$idCli;
        }
        public function getidCliente(){
            return $this->idCliente;
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
        public function setnumeroCliente($nomCli){
            $this->numeroCliente=$nomCli;
        }       
        public function getnumeroCliente(){
            return $this->numeroCliente;
        }

        public function settipodocCliente($tdocCli){
            $this->tipodocCliente=$tdocCli;
        }       
        public function gettipodocCliente(){
            return $this->tipodocCliente;
        }

        public function setnombreCliente($nomCli){
            $this->nombreCliente=$nomCli;
        }       
        public function getnombreCliente(){
            return $this->nombreCliente;
        }

        public function setapellidoCliente($apeCli){
            $this->apellidoCliente=$apeCli;
        }       
        public function getapellidoCliente(){
            return $this->apellidoCliente;
        }

        public function setdireccionCliente($dirCli){
            $this->direccionCliente=$dirCli;
        }       
        public function getdireccionCliente(){
            return $this->direccionCliente;
        }

        public function settelefonoCliente($telCli){
            $this->telefonoCliente=$telCli;
        }       
        public function gettelefonoCliente(){
            return $this->telefonoCliente;
        }

        public function setcorreoCliente($corCli){
            $this->correoCliente=$corCli;
        }       
        public function getcorreoCliente(){
            return $this->correoCliente;
        }

        public function setestadoCliente($estCli){
            $this->estadoCliente=$estCli;
        }       
        public function getestadoCliente(){
            return $this->estadoCliente;
        }

        //Métodos de la clase--------------------------------
    
        public function consultar_todos()
        {
            $consulta=$this->db->prepare("SELECT cliente.idCliente, cliente.numDocCliente, cliente.tipoDocCliente, cliente.nombreCliente, cliente.apellidoCliente, cliente.direccionCliente, cliente.telefonoCliente, cliente.correoCliente, cliente.estadoCliente, cliente.correoCliente, rol.descripcionRol FROM rol INNER JOIN usuario INNER JOIN cliente on rol.idRol = usuario.idRol and usuario.idUsuario = cliente.idUsuario;");
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
            $consulta=$this->db->prepare("SELECT * FROM rol INNER JOIN usuario INNER JOIN cliente on rol.idRol = cliente.idRol and usuario.idUsuario = cliente.idUsuario where cliente.idCliente = :id;");
            $consulta->bindParam(':id',$this->idEmpleado);
           

            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function ingresar_cliente()
        {
            /*$consulta=$this->db->prepare("CALL Pr_InsertarEmpleadoUsuario(:corUsu, :conUsu, :estUsu, :desRol,:numEmp,:tdocEmp, :nomEmp, :apeEmp,:dirEmp, :telEmp, :corEmp, :estEmp)");
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
            }*/
            
        }

        public function modificar_cliente($mensaje)
        {
            /*$consulta=$this->db->prepare("CALL Pr_ModificarEmpleado(:idEmp, :idUsu, :corUsu, :estUsu, :desRol,:numEmp,:tdocEmp, :nomEmp, :apeEmp,:dirEmp, :telEmp, :corEmp, :estEmp)");
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
            }*/
            
        }

        public function eliminar_cliente(){
            /*$consulta=$this->db->prepare("call Pr_EliminarEmpleado(:idEmp)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            if ($consulta->execute()) {
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=elimino');
            }else{
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=noelimino');
            }*/
        }

        public function eliminar_clienteusuario(){
            /*$consulta=$this->db->prepare("call Pr_EliminarEmpleadoUsuario(:idEmp, :idUsu)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            $consulta->bindParam(':idUsu',$this->idUsuario);
            if ($consulta->execute()) {
                header('Location: ../Vista/frm_modificarempleado.php?mensaje=elimino');
            }else{
                header('Location: ../Vista/frm_modificarempleado.php?mensaje=noelimino');
            }*/
        }
    }
?>