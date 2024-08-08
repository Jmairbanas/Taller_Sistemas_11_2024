<?php
    require_once('Cls_Conexion.php');
    class clsProducto extends clsConexion  
    {
        
        //Variables del Producto
        private $idProducto;
        private $nombreProducto;
        private $descripcionProducto;
        private $valorProducto;
        private $unidadProducto;
        private $stockProducto;
        private $estadoProducto;

        
        public function __construct()
        {
            $this->db=parent:: __construct();
        }

        //Encapsulamiento Datos Empleado
        
        public function setidProducto($idPro){
            $this->idProducto=$idPro;
        }
        public function getidProducto(){
            return $this->idProducto;
        }

        public function setnombreProducto($nomPro){
            $this->nombreProducto=$nomPro;
        }       
        public function getnombreProducto(){
            return $this->nombreProducto;
        }

        public function setdescripcionProducto($desPro){
            $this->descripcionProducto=$desPro;
        }       
        public function getdescripcionProducto(){
            return $this->descripcionProducto;
        }

        public function setvalorProducto($valPro){
            $this->valorProducto=$valPro;
        }       
        public function getvalorProducto(){
            return $this->valorProducto;
        }

        public function setunidadProducto($uniPro){
            $this->unidadProducto=$uniPro;
        }       
        public function getunidadProducto(){
            return $this->unidadProducto;
        }

        public function setstockProducto($stoPro){
            $this->stockProducto=$stoPro;
        }       
        public function getstockProducto(){
            return $this->stockProducto;
        }

        public function setestadoProducto($estPro){
            $this->estadoProducto=$estPro;
        }       
        public function getestadoProducto(){
            return $this->estadoProducto;
        }

        //Métodos de la clase--------------------------------
    
        public function consultar_todos()
        {
            $consulta=$this->db->prepare("SELECT * FROM producto");
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
            $consulta=$this->db->prepare("SELECT * FROM producto WHERE idProducto= :id;");
            $consulta->bindParam(':id',$this->idEmpleado);
           

            $consulta->execute();
            while($resultado=$consulta->fetch()){
                $filas[]=$resultado;
            }
            return $filas;
        }

        public function ingresar_producto()
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

        public function modificar_producto($mensaje)
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

        public function eliminar_producto(){
            /*$consulta=$this->db->prepare("call Pr_EliminarEmpleado(:idEmp)");
            $consulta->bindParam(':idEmp',$this->idEmpleado);
            if ($consulta->execute()) {
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=elimino');
            }else{
                header('Location: ../Vista/frm_eliminarempleado.php?mensaje=noelimino');
            }*/
        }
    }
?>