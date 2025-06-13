
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Actividades</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="icon nav-link active" href="dashboardUP.php" role="button">
      <img src="bootstrap-icons-1.13.1/arrow-left.svg" alt="">
    </a>
    <a class="navbar-brand mx-auto" href="#">
      <h4>Registro de actividades</h4>
    </a>
  </div>
</nav>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header bg-light text-dark text-center">
          <h4 class="mb-0">Lista de Actividades</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
              <thead>
                <tr>
                  <th>Actividad</th>
                  <th>Categoría</th>
                  <th>Progreso</th>
                </tr>
              </thead>
              <tbody>


                
                
                <tr>
  <td>el viaje de luna y estrella</td>
  <td>lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoLectura" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>

    </div>
  </td>
</tr>
<tr>
  <td>El perro que sabía volar</td>
  <td>Lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoPerro" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>

<tr>
  <td>Las aventuras de la tortuga Lulú</td>
  <td>Lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoLulu" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>

<tr>
  <td>El castillo de dulces</td>
  <td>Lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoCastillo" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>

<tr>
  <td>La rana que sabía cantar</td>
  <td>Lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoRana" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>

<tr>
  <td>La nube pintora</td>
  <td>Lectura</td>
  <td>
    <div class="progress">
      <div id="barraProgresoNube" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>

<tr>
  <td>Sopa de letras "Animales salvajes"</td>
  <td>Juegos de palabras</td>
  <td>
    <div class="progress">
      <div id="barraProgresoSopaAnimales" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
    </div>
  </td>
</tr>


                <tr>
                  <td>completa la oración</td>
                  <td>juegos de vocavulario</td>
                  <td>
                    <div class="progress">
                      <div id="barraProgresoOracion" class="progress-bar bg-success" style="width: 0%;" aria-valuenow="0">0%</div>
                    </div>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script para actualizar barra desde localStorage -->
<script>
  //actividad de completa la oracion
  const progreso = localStorage.getItem("progresoCompletaOracion");
  if (progreso !== null) {
    const barra = document.getElementById("barraProgresoOracion");
    const porcentaje = parseInt(progreso);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }

</script>

<script>
  const progresoLectura = localStorage.getItem("progresoLecturaCuento");
  if (progresoLectura !== null) {
    const barraLectura = document.getElementById("barraProgresoLectura");
    const porcentajeLectura = parseInt(progresoLectura);
    if (!isNaN(porcentajeLectura) && barraLectura) {
      barraLectura.style.width = porcentajeLectura + "%";
      barraLectura.setAttribute("aria-valuenow", porcentajeLectura);
      barraLectura.innerText = porcentajeLectura + "%";
    }
  }
</script>

<script>
  const progresoPerro = localStorage.getItem("progresoPerro");
  if (progresoPerro !== null) {
    const barra = document.getElementById("barraProgresoPerro");
    const porcentaje = parseInt(progresoPerro);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoLulu = localStorage.getItem("progresoLulu");
  if (progresoLulu !== null) {
    const barra = document.getElementById("barraProgresoLulu");
    const porcentaje = parseInt(progresoLulu);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoCastillo = localStorage.getItem("progresoCastillo");
  if (progresoCastillo !== null) {
    const barra = document.getElementById("barraProgresoCastillo");
    const porcentaje = parseInt(progresoCastillo);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoRana = localStorage.getItem("progresoRana");
  if (progresoRana !== null) {
    const barra = document.getElementById("barraProgresoRana");
    const porcentaje = parseInt(progresoRana);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoNube = localStorage.getItem("progresoNube");
  if (progresoNube !== null) {
    const barra = document.getElementById("barraProgresoNube");
    const porcentaje = parseInt(progresoNube);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoSopa = localStorage.getItem("progresoSopaAnimales");
  if (progresoSopa !== null) {
    const barra = document.getElementById("barraProgresoSopaAnimales");
    const porcentaje = parseInt(progresoSopa);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>

<script>
  const progresoSopa = localStorage.getItem("progresoSopaAnimalesDomesticos");
  if (progresoSopa !== null) {
    const barra = document.getElementById("barraProgresoSopaAnimalesDomesticos");
    const porcentaje = parseInt(progresoSopa);
    if (!isNaN(porcentaje) && barra) {
      barra.style.width = porcentaje + "%";
      barra.setAttribute("aria-valuenow", porcentaje);
      barra.innerText = porcentaje + "%";
    }
  }
</script>



</body>
</html>
