<?php
    require_once('../modelo/Cls_Usuario.php');

    if(isset($_POST)&&!empty($_POST)){
        
        $codigo=$_POST['txtCodigo'];
        $objetousuario=new clsUsuario();    
        $objetousuario->setidUsuario($codigo);
        $filas=$objetousuario->consultar_codigo();
        if($filas == null){
            header('location: ../Vista/frm_modificarusuario.php?mensaje=incorrecto');
        }
        else
        {
            foreach($filas as $fila)
            {
                session_start();
                $_SESSION['ConsIdUsu']  =   $fila['idUsuario'];
                $corUsu                 =   $fila['correoUsuario'];
                $estUsu                 =   $fila['estadoUsuario'];

                header('location:../Vista/frm_modificarusuario.php?mensaje=correcto&corUsu='.$corUsu.'&estUsu='.$estUsu);
            }
        }
    }
    else
    {
        session_start();
        $codigo=$_SESSION['ConsIdUsu'];
        $objetousuario=new clsUsuario();    
        $objetousuario->setidUsuario($codigo);
        $filas=$objetousuario->consultar_codigo();
        
        foreach($filas as $fila)
        {
            $corUsu     =   $fila['correoUsuario'];
            $estUsu     =   $fila['estadoUsuario'];

            header('location:../Vista/frm_miusuario.php?mensaje=miusuario&corUsu='.$corUsu.'&estUsu='.$estUsu);
        }
    }
?>