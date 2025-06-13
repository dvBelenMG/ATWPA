<?php 
include 'include/conexion.php';
include 'include/log.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <div class="container mt-5 justify-content-center align-items-center">
        <div class="cont2 col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center shadow mt-4">
            <div class="row mt-2">
                <div class="col-sm-10 col-md-5 col-lg-5 text-center">
                    <img src="imgns/logAT.png" class="img-fluid mt-5 mb-4" width="200px" alt="...">
                </div>
                <div class="col-sm-10 col-md-5 col-lg-5 text-center">
                    <h2>Inicio de sesión</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="needs-validation" novalidate>
                        <div class="col-sm-12 justify-content-center">
                            <input type="email" name="Email" placeholder="Email" class="inp form-control mt-3" id="validationEmail" required>
                            <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input type="password" name="Password" id="validationPassword" placeholder="Contraseña" class="inp form-control mt-2" required>
                            <div class="invalid-feedback">Por favor, ingresa tu contraseña.</div>
                        </div>
                        <p class=""><?php echo $mensajeLogin; ?></p>
                        <div class="col-sm-12 text-center">
                            <input type="submit" value="Iniciar sesión" name="Iniciar_Sesion" class="boton form-control mt-3 text-light">
                        </div>
                        
                        <div class="col-sm-12 text-center">
                            <nav>No tienes una cuenta? <a href="registro.php">Registrarse</a></nav>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script>
        // JavaScript para la validación de formularios
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
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
