<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<?php include 'process\menuUP.php'; ?>


    <nav class="navbar navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="icon nav-link active" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button">
                <i class="bi bi-list text-dark" style="font-size: 25px;"></i>
            </a>
            <a class="navbar-brand mx-auto" href="#">
                <h4>ABILITYTALK</h4>
            </a>
        </div>
    </nav>


    <div class="container">
        
            <!--aqui va un carrusel de imágenes-->
            <div class="row mt-3">
                  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="imgns/banner1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="imgns/banner1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="imgns/banner1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>

              </div>
            </div>
            <!--fin del carrusel-->
            <!--Aqui van los demas apartados del dashboard-->
            <div class="row mt-3 justify-content-center align-items-center text-center">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    
                    <nav>
                        <a href="actividadesUP.php">
                            <img src="imgns/icons/Group 40.png" alt="" srcset="">
                        </a>
                    </nav>
                    <p>Actividades</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <nav>
                        <a href="">
                            <img src="imgns/icons/Group 39.png" alt="" srcset="">
                        </a>
                    </nav>
                    <p>registro de actividades</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <nav>
                        <a href="nivelesUP.php">
                            <img src="imgns/icons/Group 38.png" alt="" srcset="">
                        </a>
                        <p>lenguaje de señas</p>
                    </nav>
                </div>
            </div>
       
    </div>


    <script src="js\bootstrap.bundle.min.js"></script>
</body>
</html>