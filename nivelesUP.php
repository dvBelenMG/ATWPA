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

<style>
    .locked {
  pointer-events: none;
  opacity: 0.5;
  filter: grayscale(100%);
}

.unlocked {
  animation: desbloqueoAnimacion 1s ease-out;
}

@keyframes desbloqueoAnimacion {
  0% { transform: scale(1); box-shadow: 0 0 0 rgba(0,255,0,0.7); }
  50% { transform: scale(1.1); box-shadow: 0 0 20px rgba(0,255,0,0.7); }
  100% { transform: scale(1); box-shadow: 0 0 0 rgba(0,255,0,0.7); }
}

</style>

<script>
   document.addEventListener('DOMContentLoaded', () => {
  const nivel2Img = document.querySelector('#nivel2 img');
  const nivel3Img = document.querySelector('#nivel3 img'); // si quieres bloquear niveles superiores también

  // Función para desbloquear nivel 2 si el video fue visitado
  function desbloquearNiveles() {
    if (localStorage.getItem('videoVisited') === 'true') {
      if (nivel2Img) {
        nivel2Img.classList.remove('locked');
        nivel2Img.classList.add('unlocked');
        setTimeout(() => {
          nivel2Img.classList.remove('unlocked');
        }, 1000);
      }
    } else {
      if (nivel2Img) nivel2Img.classList.add('locked');
    }
  }

  desbloquearNiveles();

  // Prevenir click si está bloqueado
  const nivel2Link = document.getElementById('nivel2');
  if (nivel2Link) {
    nivel2Link.addEventListener('click', e => {
      if (nivel2Img.classList.contains('locked')) {
        e.preventDefault();
        alert('Debes abrir primero el video para desbloquear este nivel.');
      }
    });
  }
});


//segundo nivel

document.addEventListener('DOMContentLoaded', () => {
  const nivel3Img = document.querySelector('#nivel3 img');

  // Letras necesarias para desbloquear el siguiente nivel
  const letras = ['A', 'B', 'C', 'D', 'E'];

  // Verificar si todas las letras han sido visitadas
  const todasVisitadas = letras.every(letra => localStorage.getItem('letraVisitada_' + letra) === 'true');

  if (todasVisitadas && nivel3Img) {
    nivel3Img.classList.remove('locked');
    nivel3Img.classList.add('unlocked');
    setTimeout(() => {
      nivel3Img.classList.remove('unlocked');
    }, 1000);
  }

  // Evitar acceso si no está desbloqueado
  const nivel3Link = document.getElementById('nivel3');
  if (nivel3Link) {
    nivel3Link.addEventListener('click', (e) => {
      if (nivel3Img.classList.contains('locked')) {
        e.preventDefault();
        alert('Debes completar todas las letras del abecedario 1 antes de continuar.');
      }
    });
  }
});



</script>


<?php include 'process\ventanaNivel.php'?>

    <nav class="navbar navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="icon nav-link active" href="dashboardUP.php" role="button">
            <img src="bootstrap-icons-1.13.1/arrow-left.svg" alt="" srcset="">
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