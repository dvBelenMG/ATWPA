<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveles</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/niveles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<?php include 'process\ventanaNivel.php'?>

    <nav class="navbar navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="icon nav-link active" href="dashboardUP.php" role="button">
            <i class="bi bi-arrow-left text-dark" style="font-size: 25px;"></i>
        </a>
        <a class="navbar-brand mx-auto" href="#">
            <h4>Camino del habla</h4>
        </a>
    </div>
</nav>

    <div class="container align-items-center justify-content-center text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center">
            <div class="row mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button class="bg-blueaqua text-light rounded-7 hwbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">NIVEL 1</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button class="bg-blueaqua text-light rounded-7 hwbtn" >NIVEL 2</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button class=" bg-blueaqua text-light rounded-7 hwbtn hover-1">NIVEL 3</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <img src="imgns/personas.svg" alt="" srcset="" class="img-fluid" height= "400px" width="400px">
                </div>
            </div>
        </div>
    </div>
    
    <script src="js\bootstrap.bundle.min.js"></script>

</body>
</html>