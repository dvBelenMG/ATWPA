<?php 
include 'include/conexion.php';
include 'include/log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 justify-content-center align-items-center">
        <div class=" cont2 col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center shadow mt-4">
        <div class="row mt-2">
        <div class="col-sm-10 col-md-5 col-lg-5 text-center">
        <div class="text-center">
             <img src="imgns/logAT.png" class="img-fluid mt-5 mb-4" width = "200px" alt="...">
            </div>
        </div>

        <div class="col-sm-10 col-md-5 col-lg-5 text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center text-center mb-2 mt-5">
            
        <h2>Inicio de sesión</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="needs-validation" novalidate>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center">
            
            <input type="Email" name="Email"  placeholder ="Email" class=" inp form-control mt-3 form-control" id="validationServer04" aria-describedby="validationServer04Feedback" required>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            
            <input type="Password" name="Password" id="validationServer02" placeholder ="contraseña" class=" inp form-control mt-2"  aria-describedby="validationServer03Feedback" required>
            

        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            
        <input onclick="function()"type="submit" value="iniciar sesion" name="Iniciar Sesion" class="boton form-control  mt-3 text-light">

        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            
        <nav>no tienes una cuenta? <a href="registro.php">Registrarse</a></nav>

        </div>
            
            

        </div>
        

        </div>
        </div>
    </div>


    <script src="js/bootstrap.min.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
</body>
</html>