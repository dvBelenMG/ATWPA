<?php
include 'include/conexion.php';
include 'include/Reg.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atalk | Registro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reg.css">
</head>
<body>

<div class="container mt-4">
  <!-- Logo -->
  <div class="text-center">
    <img src="imgns/logAT.png" class="img-fluid mt-2" alt="Logo Atalk" width="200">
  </div>

  <!-- Formulario -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation mt-4" novalidate>
    <h2 class="text-center mb-4">Registro de Usuario</h2>

    
    <div class="mb-3">
      <label for="FechaNac" class="form-label">Fecha de nacimiento</label>
      <input type="date" name="fechaNac" id="FechaNac" class="form-control" required>
      <div class="invalid-feedback">Por favor, ingresa tu fecha de nacimiento.</div>
    </div>

    
    <div class="mb-3">
      <input type="text" name="nombre" placeholder="Ingresa tu nombre(s)" class="form-control" required>
      <div class="invalid-feedback">Este campo es obligatorio.</div>
    </div>

    
    <div class="row g-2 mb-3">
      <div class="col-md-6">
        <input type="text" name="ap" placeholder="Apellido paterno" class="form-control" required>
        <div class="invalid-feedback">Este campo es obligatorio.</div>
      </div>
      <div class="col-md-6">
        <input type="text" name="am" placeholder="Apellido materno" class="form-control" required>
        <div class="invalid-feedback">Este campo es obligatorio.</div>
      </div>
    </div>

    
    <div class="mb-3">
      <input type="tel" name="tel" placeholder="Número de teléfono (10 dígitos)" class="form-control" pattern="\d{10}" required>
      <div class="invalid-feedback">Ingresa un número válido de 10 dígitos.</div>
    </div>

    
    <div class="row g-2 mb-3">
      <div class="col-md-6">
        <input type="email" name="email" placeholder="Email" class="form-control" required>
        <div class="invalid-feedback">Ingresa un correo válido.</div>
      </div>
      <div class="col-md-6">
        <input type="password" name="pass" placeholder="Contraseña" class="form-control" required>
        <div class="invalid-feedback">Ingresa una contraseña.</div>
      </div>
    </div>

    
    <div class="mb-3">
      <select name="Genero" class="form-select" required>
        <option value="" disabled selected>Selecciona tu género</option>
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>
        <option value="3">Indefinido</option>
      </select>
      <div class="invalid-feedback">Selecciona una opción.</div>
    </div>

    
    <div class="mb-3">
      <select name="TUsuario" class="form-select" required>
        <option value="" disabled selected>Selecciona tu tipo de usuario</option>
        <option value="2">Tutor</option>
        <option value="3">Paciente</option>
        <option value="4">Especialista</option>
      </select>
      <div class="invalid-feedback">Selecciona una opción.</div>
    </div>

    
    <input type="hidden" name="EstadoUsuario" value="1">

    
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Acepto los términos y condiciones
      </label>
      <div class="invalid-feedback">Debes aceptar los términos para continuar.</div>
    </div>

   
    <div class="d-grid">
      <input type="submit" value="Registrar" name="registrar" class="boton form-control  mb-5 text-light">
    </div>
  </form>
</div>


<script src="js/bootstrap.bundle.min.js"></script>


<script>
(function () {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(function (form) {
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
