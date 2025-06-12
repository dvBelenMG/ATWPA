<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ajust.css">
    <title>Document</title>
</head>
<body>
<?php 
      include 'process/cerrar_sesion.php';
      
?>
    <nav class="navbar navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="icon nav-link active" href="dashboardUP.php" role="button">
                 <img src="bootstrap-icons-1.13.1/arrow-left.svg" alt="" srcset="">
            </a>
            <a class="navbar-brand mx-auto" href="#">
                <h4>ABILITYTALK</h4>
            </a>
        </div>
    </nav>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
        <div class="menu col-sm-3 col-md-3 col-lg-3 border-end shadow">
           
            <p><img src="imgns/config.svg" class="p-2 m-2" srcset="">configuración</p>
           
            
            
            <p><img src="imgns/acces.svg" class="p-2 m-2" srcset="">accesibilidad</p>
            
           
            
            <p><img src="imgns/accounts.svg" class="p-2 m-2" srcset="">cuentas</p>
            <a href="" class="text-decoration-none text-dark">
            <p><img src="imgns/perms.svg" class="p-2 m-2" srcset="">permisos</p>
            </a>

            <p class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="imgns/Logout.svg" class="p-2 m-2" >cerrar sesión</p>
            
        </div>
        
        <div class="col-sm-9 col-md-9 col-lg-9 justify-content-center">
            <h5>configuracion</h5>
            <div class="col-md-12 col-lg-12 col-sm-12 border border-2 shadow">

            <div class="form-check form-switch mt-3 m-3 mb-4">
            <label class="form-check-label" for="flexSwitchCheckDefault">silenciar notificaciones</label> 
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">   

            <p class="text-secondary mt-1">Ajusta el volumen de las notificaciones según te sea necesario</p>
            </div>

            </div>

            <div class="col-md-12 col-lg-12 col-sm-12 border border-2 shadow mt-3">

            <div class="volumen m-3">
            <label for="customRange2" class="form-label">ajustar el volumen del sistema</label>
            <input type="range" class="form-range" min="0" max="4" id="customRange2">
            </div>
            
            </div>

        </div>

        </div>
    </div>


    <script src="js\bootstrap.bundle.min.js"></script>
</body>
</html>