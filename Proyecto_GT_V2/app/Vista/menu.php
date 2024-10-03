<?php
    session_start();
    if(isset($_SESSION['usuario']))
    {
        $login      =   TRUE;
        $usuario    =   $_SESSION['usuario'];
        $rol        =   $_SESSION['rol'];
    }
    else
    {
        $login      = FALSE;
        header('Location:../../index.php');
    }

    switch($rol)
        {
            case "Administrador":
                include('menu_Administrador.php');            
                break;
            case "Cliente":
                include('menu_Cliente.php');
                break;
            case "Domiciliario":
                include('menu_Domiciliario.php');
                break;
        }
?>
