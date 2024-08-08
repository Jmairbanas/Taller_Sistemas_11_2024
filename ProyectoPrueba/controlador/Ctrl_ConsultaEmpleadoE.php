<?php
    require_once('../modelo/Cls_Empleado.php');

    if(isset($_POST)&&!empty($_POST)){
        
        $codigo=$_POST['txtCodigo'];
        
        $objetoempleado=new clsEmpleado();
        $objetoempleado->setidEmpleado($codigo);
        $filas=$objetoempleado->consultar_codigo();
        if($filas == null){
            header('location: ../Vista/frm_modificarempleado.php?mensaje=incorrecto');
        }
        else
        {
            foreach($filas as $fila)
            {
                session_start();
                $_SESSION['ConsIdUsu']  =   $fila['idUsuario'];
                $_SESSION['ConsIdEmp']  =   $fila['idEmpleado'];
                
                $corUsu                 =   $fila['correoUsuario'];
                $estUsu                 =   $fila['estadoUsuario'];
                $desRol                 =   $fila['descripcionRol'];
                $numEmp                 =   $fila['numDocEmpleado'];
                $tdocEmp                =   $fila['tipoDocEmpleado'];
                $nomEmp                 =   $fila['nombreEmpleado'];
                $apeEmp                 =   $fila['apellidoEmpleado'];
                $dirEmp                 =   $fila['direccionEmpleado'];
                $telEmp                 =   $fila['telefonoEmpleado'];
                $corEmp                 =   $fila['correoEmpleado'];
                $estEmp                 =   $fila['estadoEmpleado'];    

                header('location:../Vista/frm_modificarempleado.php?mensaje=correcto&corUsu='.$corUsu.'&estUsu='.$estUsu.'&desRol='.$desRol.'&numEmp='.$numEmp.'&tdocEmp='.$tdocEmp.'&nomEmp='.$nomEmp.'&apeEmp='.$apeEmp.'&dirEmp='.urlencode($dirEmp).'&telEmp='.$telEmp.'&corEmp='.$corEmp.'&estEmp='.$estEmp);
                                    
            }
        }
    }
    else
    {
        session_start();
        $codigo=$_SESSION['ConsIdEmp'];
        $objetoempleado=new clsEmpleado();    
        $objetoempleado->setidEmpleado($codigo);
        $filas=$objetoempleado->consultar_codigo();
        
        foreach($filas as $fila)
        {
            $corUsu                 =   $fila['correoUsuario'];
            $estUsu                 =   $fila['estadoUsuario'];
            $desRol                 =   $fila['descripcionRol'];
            $numEmp                 =   $fila['numDocEmpleado'];
            $tdocEmp                =   $fila['tipoDocEmpleado'];
            $nomEmp                 =   $fila['nombreEmpleado'];
            $apeEmp                 =   $fila['apellidoEmpleado'];
            $dirEmp                 =   $fila['direccionEmpleado'];
            $telEmp                 =   $fila['telefonoEmpleado'];
            $corEmp                 =   $fila['correoEmpleado'];
            $estEmp                 =   $fila['estadoEmpleado'];

            header('location:../Vista/frm_miempleado.php?mensaje=miempleado&corUsu='.$corUsu.'&estUsu='.$estUsu.'&desRol='.$desRol.'&numEmp='.$numEmp.'&tdocEmp='.$tdocEmp.'&nomEmp='.$nomEmp.'&apeEmp='.$apeEmp.'&dirEmp='.urlencode($dirEmp).'&telEmp='.$telEmp.'&corEmp='.$corEmp.'&estEmp='.$estEmp);
        }
    }
?>