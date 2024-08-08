<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		header('location:menu.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MENU PRINCIPAL</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
        <meta charset="UTF-8" />
    </head>
    <body>
        <div class="content">
       		<div class="container">
  				<h2 class="login-header">INICIO DE SESIÓN</h2>
				<form action="../Controlador/Ctrl_Login.php" method="POST">
    				<div class="form-group">
    					<input type="email" name="Usuario" class="form-control" placeholder="Correo Electrónico">
    				</div>
    				<div class="form-group">	
    					<input type="password" name="Contrasena" class="form-control" placeholder="Contraseña">
    				</div>
    				<button class="btn btn-dark" type="submit">INGRESAR</button>
  					<?php
						if($_GET){
							$fallo=$_GET['fallo'];
							if($fallo=='error'){
								echo "<div  class='alert alert-danger' >Error, verifique datos y reintente </div>";
							}
						}
					?>
  				</form>
			</div>     
        </div>
    </body>
</html>