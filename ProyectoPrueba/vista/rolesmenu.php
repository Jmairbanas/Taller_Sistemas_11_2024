<?php
if(isset($_SESSION['usuario']))
{
    $usuario    =   $_SESSION['usuario'];
    $rol        =   $_SESSION['rol'];
}
else
{
    header('Location:login.php');
}
    ?>
    <a href="menu.php">MENU PRINCIPAL</a>
    <?php
    
    if($rol == 'Administrador')
    {
        ?>
        <a href="frm_usuario.php">USUARIO</a>
        <a href="frm_empleado.php">EMPLEADO</a>
        <a href="frm_cliente.php">CLIENTE</a>
        <a href="frm_producto.php">PRODUCTO</a>
        <?php      
    }
    else
    {
        if($rol == 'Empleado')
        {
            ?>
            <a href="frm_usuario.php">USUARIO</a>
            <a href="frm_empleado.php">EMPLEADO</a>
            <a href="frm_cliente.php">CLIENTE</a>
            <a href="frm_producto.php">PRODUCTO</a>
            <?php            
        }
        else
        {
            if($rol == 'Cliente')
            {
                ?>
                <a href="frm_usuario.php">USUARIO</a>
                <a href="frm_cliente.php">CLIENTE</a>
                <a href="frm_producto.php">PRODUCTO</a>
                <?php
            }
        }
    }
?>
<a href="../controlador/Ctrl_CerrarSesion.php">CERRAR SESIÓN</a>
<center>
<span class="badge badge-dark"><b>Usuario:</b></span>
<br>
<span class="badge badge-light"><?php echo $usuario;?></span> 
<br>
<span class="badge badge-dark"><b>Rol: </b></span>
<br>
<span class="badge badge-light"><?php echo $rol;?></span>
</center>