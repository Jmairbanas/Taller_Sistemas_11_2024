<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
    <title>Inicio de Sesión</title>
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
                            <a class="nav-link active text-light" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-light" href="#">Herramientas</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-light" href="#">Espacios</a>
                            </li>
                        </ul>
                    <span class="navbar-text">
                        <a href="#" class="btn btn-success text-light">Login</a>
                    </span>
                    </div>
                </div>
            </nav>
        </header>

        <!-- FORMULARIO -->
        <?php 
            if(isset($_GET)&&!empty($_GET))
            {
                $mensaje    =   $_GET['mensaje'];
                switch ($mensaje){
                    case "consulta":
                        $idUsuario      =   $_GET['idUsuario']; 
                        $tipoDocumento  =   $_GET['tipoDocUsuario'];
                        $Documento      =   $_GET['DocumentoUsuario'];
                        ?>
                        <section id="seccion-formulario" class="border-bottom border-success border-2 mt-2 w-50 mx-auto">
                        <div class="container" id="contenedor-formulario">
                            <div id="titulo-formulario" class="text-center mb-4">
                                <img src="../../public/imagenes/ImagenI1.png" alt="LogoLogin" height="50" width="50" class="img-fluid mt-2">
                                    <h2 class="text-light fw-bold">Editar Usuario</h2>
                                    <p class="fs-5"></p>
                                        <form  method="POST" name="FormActualizarUsuario"> <!-- action="../Controlador/Ctrl_login.php"-->
                                            <div class="mb-2 w-75 mx-auto">
                                                <label for="texto-usuario" class="form-label text-light fw-bold">Id Usuario</label>
                                                <input type="number" name="idUsuario" class="form-control" id="idUsuario" aria-describedby="ingreso de usuario" 
                                                value="<?php echo $idUsuario;?>"  Required readonly>
                                            </div> 
                                            <div class="mb-3 w-75 mx-auto">
                                                <label for="texto-password" class="form-label text-light fw-bold">Tipo Documento</label>
                                                <input type="text" name="TDocUsuario" class="form-control" id="texto-password" 
                                                value="<?php echo $tipoDocumento;?>" Required>
                                            </div>
                                            <div class="mb-3 w-75 mx-auto">
                                                <label for="texto-password" class="form-label text-light fw-bold">Documento</label>
                                                <input type="number" name="DocUsuario" class="form-control" id="texto-password" 
                                                value="<?php echo $Documento;?>" Required>
                                            </div>
                                            <input type="button" value="Actualizar" id="actualizar" class="btn btn-success w-75" 
                                            onclick="document.FormActualizarUsuario.action='../Controlador/Ctrl_ActualizarUsuario.php';
                                            document.FormActualizarUsuario.submit()">                        
                                            <!--button type="submit" class="btn btn-success w-75">ACTUALIZAR</button-->
                                        </form>
                                </div>
                            </div>
                            <!--<div id="bg-formulario">             
                            </div>-->
                        </section>
                        <?php
                        break;
                    case "actualizo":
                        echo "<div class='alert alert-success'>Se actualizaron los datos del cliente correctamente</div>";
                        echo "<a href='ConsultaUsuario.php' class='btn btn-success'>volver</a>";
                        break;
                }
                
            }
        ?>

        <!-- PIE DE PÁGINA -->

        <footer class="w-100 d-flex align-items justify-content-center flex-wrap">
            <div id="iconos">
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
            </div>
            <p class="fs-5 px-3 pt-3" >Power by "Taller de Sistemas JT 2024"</p>
        </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>