<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../publico/css/estilos.css">
    <title>Gestion de Taller</title>
  </head>
  <body>
        
        <!-- ENCABEZADO -->
        
        <header class="container-fuid">
            <nav class="navbar navbar-expand-lg navbar-light bg-success" id="menu">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="public/imagenes/Colegio-Piloto-Logo-Blanco.png" alt="" width="70" height="70">
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
                        <a href="app/vista/login.php" class="btn btn-success text-light">Login</a>
                    </span>
                    </div>
                </div>
            </nav>
        </header>

        <!-- CARRUSEL -->
        
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="public/imagenes/ImagenC1.jpg" class="d-block w-100" alt="..." width="50%" height="50%">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Primera Imagen</h5>
                    <p>Texto complemento 1.</p>
                </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="public/imagenes/ImagenC2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Segunda Imagen</h5>
                    <p>Texto complemento 2.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="public/imagenes/ImagenC3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tercera Imagen</h5>
                    <p>Texto complemento 3.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- PARRAFO INICIAL -->

        <section class="w-75 mx-auto text-center" id="inicio">
            <h1 class="p-3 fs-2 border-top border-3 text-success fw-bold">Gestión Eficiente de Herramientas en Nuestro Taller</h1>
            <p class="p-3 fs-4"><span class="text-success fw-bold">¡Bienvenido a nuestra página web! </span>En nuestro taller, nos esforzamos por mantener 
            un sistema eficiente de gestión de herramientas para garantizar un entorno de trabajo seguro y 
            productivo.</p>
        </section>

        <!-- SERVICIOS -->

        <section class="containner-fluid">
            <div class="row w-75 mx-auto my-5 servicio-fila">
                <div class="col-lg-4 col-md-4 col-sm-12 justify-content-center">
                    <img class="rounded mx-auto d-block" src="public/imagenes/ImagenS1.jpg" alt="Servicio 1" width="180" height="160">
                    <div>
                        <h3 class="fs-4 mt-4 pb-1 text-center text-success fw-bold">Servicio 1</h3>
                        <p class="px-4 text-center">Parrafo del servicio 1</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img class="rounded mx-auto d-block" src="public/imagenes/ImagenS2.jpg" alt="Servicio 1" width="180" height="160">
                    <div>
                        <h3 class="fs-4 mt-4 pb-1 text-center text-success fw-bold">Servicio 2</h3>
                        <p class="px-4 text-center">Parrafo del servicio 2</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img class="rounded mx-auto d-block" src="public/imagenes/ImagenS3.jpg" alt="Servicio 1" width="180" height="160">
                    <div>
                        <h3 class="fs-4 mt-4 pb-1 text-center text-success fw-bold">Servicio 3</h3>
                        <p class="px-4 text-center">Parrafo del servicio 3</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>