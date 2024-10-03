<?php
    if(!isset($_SESSION['usuario']))
    {
        header('Location:../../index.php');
    }
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
    <title>Gestion de Taller</title>
  </head>
  <body>
        
        <!-- ENCABEZADO -->
        <header class="container-fuid">
            <nav class="navbar navbar-expand-lg navbar-light bg-success" id="menu">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../../public/imagenes/Colegio-Piloto-Logo-Blanco.png" alt="" width="70" height="70">
                    </a>
                    <a class="navbar-brand text-light fs-2 fw-bold" href="#">GESTIÓN DE TALLER</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="../../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-light" href="#">Herramientas</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-light" href="#">Espacios</a>
                            </li>
                            <?php
                            if($login==TRUE){
                                ?>
                                <li>
                                    <a class="nav-link text-light" 
                                    href="menu.php">
                                        Sistema
                                    </a>
                                </li>
                                <?php    
                            }
                            ?>
                        </ul>
                        <?php
                            switch($login){
                                case FALSE:
                                    ?>
                                        <span class="navbar-text">
                                            <a href="login.php" class="btn btn-success text-light">Login</a>
                                        </span>
                                    <?php
                                    break;
                                case TRUE:
                                    ?>
                                        <span class="navbar-text">
                                            <h6 class="text-light"> 
                                                Usuario: <?php echo $usuario;?>
                                                Rol: <?php echo $rol;?>
                                                <a href="../controlador/Ctrl_CerrarSesion.php"
                                                class="btn btn-success text-light">
                                                    CERRAR SESIÓN
                                                </a>
                                            </h6>    
                                        </span>
                                    <?php
                                    break;
                            }
                        ?>
                    </div>
                </div>
            </nav>
        </header>

        <h1>CLIENTE</h1>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>