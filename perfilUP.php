<?php
include 'include/conexion.php';
include 'include/log.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si hay una sesión iniciada
if (!isset($_SESSION['login']) || $_SESSION['login'] !== TRUE) {
    header("Location: login.php");
    exit();
}

$emailUsuario = $_SESSION['usuario']; // Obtenemos el email guardado en sesión

// Consulta para obtener los datos del usuario
$consulta = "SELECT u.ID_Usuario, u.NombreUser, u.ApellidoP, u.ApellidoM, u.Telefono, u.Email, u.ID_Tusuario, u.ID_Genero,
tu.ID_Tusuario, tu.NombreTusuario, g.ID_Genero, g.NombreG FROM usuarios u INNER JOIN
tipousuario tu ON u.ID_Tusuario = tu.ID_Tusuario INNER JOIN
genero g ON u.ID_Genero = g.ID_Genero WHERE Email = '$emailUsuario'";
$resultado = $conecta->query($consulta);

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc(); // Aquí tienes todos los datos del usuario
} else {
    echo "Error: usuario no encontrado.";
    exit();
}

// Cierre de conexión
$conecta->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php include 'process\menuUP.php'; ?>


    <nav class="navbar navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="icon nav-link active" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button">
                <i class="bi bi-card-list text-dark" style="font-size: 25px;"></i>
            </a>
            <a class="navbar-brand mx-auto" href="#">
                <h4>ABILITYTALK</h4>
            </a>
        </div>
    </nav>

<!--inicio del contenido-->
<div class="col-md-12 col-lg-12 col-sm-12 justify-content-center">

<div class="row mt-4 justify-content-center align-items-center text-center">
    <div class="col-sm12 col-lg-12 col-md-12">
        <img src="imgns/especialist.jpg" width="150px" alt="" srcset="" class="rounded-circle">
    </div>
</div>

<!--caja contenedora de datos-->
    <div class="container mt-4">
    <div class="row justify-content-center">
            <div class=" dts col-sm-10 col-md-10 col-lg-10 bg-cont text-center tUser ">
                <?php echo htmlspecialchars($usuario['NombreTusuario']); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" dts col-sm-5 col-md-5 col-lg-5 bg-cont ">
              Nombre: <?php echo htmlspecialchars($usuario['NombreUser'] . ' ' . $usuario['ApellidoP'] . ' ' . $usuario['ApellidoM']); ?>
            </div>
            <div class=" dts col-sm-5 col-md-5 col-lg-5 bg-cont ">
                Email:  <?php echo htmlspecialchars($usuario['Email']); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" dts col-sm-5 col-md-5 col-lg-5 bg-cont ">
                Genero: <?php echo htmlspecialchars($usuario['NombreG']); ?>
            </div>
            <div class=" dts col-sm-5 col-md-5 col-lg-5 bg-cont ">
                teléfono de contacto: <?php echo htmlspecialchars($usuario['Telefono']); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" dts col-sm-10 col-md-10 col-lg-10 align-items-center justify-content-center text-center bg-cont contEnd">
                <button class="btn btn-info mb-2 mt-2 text-light"><img src="imgns/pencil.svg" alt="">editar perfil</button>
               <button class="btn btn-info mb-2 mt-2 text-light"><img src="imgns/share.svg" class="p-1">compartir perfil</button>
            </div>
        </div>
    </div>
    </div>
    <!--fin de la caja contenedora-->

    <!--caja contenedora 2-->
    <div class="container2">
        
        <div class="row mt-2 justify-content-center">
            <!--caja de servicios ofrecidos-->
            <div class="col-sm-5 col-md-5 col-lg-5 border border-2 m-1 dts2">
                <p class="text-poppins font-bold text-center">Metas u objetivos</p>
                <p  class="text-poppins font-1">integrarme en las actividades de la escuela</p>
                <button class="btnE btn-info mb-2 mt-2 text-light p-2"><img src="imgns/pencil.svg" alt="">agregar o eliminar metas u objetivos</button>
            </div>
            <!--caja de experiencia profesional-->
            <div class="col-sm-5 col-md-5 col-lg-5 border border-2  m-1 dts3">
               <p class="text-poppins font-bold title text-center">Motivaciones</p>
               <p  class="text-poppins font-1">Quiero tener seguridad conmigo mismo<br>Quiero poder hablar con mis amigos </p>
                <button class="btnE btn-info mb-2 mt-2 text-light p-2"><img src="imgns/pencil.svg" alt="">editar Motivaciones</button>
            </div>
        </div>

        <!--caja de documentacion-->
        <div class="row mt-2 justify-content-center mb-5">
            <div class="col-md 10 col-lg-10 col-sm-10 border-round border border-2">
            <p class="text-poppins font-bold title">Dificultades principales</p>
            <p  class="text-poppins font-1">Dificultades para comunicarme<br>Dificultad para pedir ayuda<br>expresion expresion de emociones</p>
                <button class="btnE btn-info mb-2 mt-2 text-light p-2">visualizar</button><button class="btnE btn-info mb-2 mt-2 text-light p-2">Actualizar dificultades</button>
            </div>
        </div>
    </div>

    
    <div class="container">
        <p class="text-poppins font-bold title">comentarios <img src="img/chat-dots.svg" alt="" srcset=""></p>
    </div>
    <hr>
    <!--caja contenedora 3-->
    <div class="container">
        <p>Aún no hay comentarios en este perfil</p>
    </div>
    
</div>
<script src="js\bootstrap.bundle.min.js"></script>

</body>
</html>