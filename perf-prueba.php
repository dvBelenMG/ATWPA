ESTA PRUEBA NO FUE MALA <?php
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
<html>
<head>
    <title>Perfil del Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario['NombreUser']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($usuario['Email']); ?></p>
    <p>Tipo de Usuario: <?php echo htmlspecialchars($usuario['NombreTusuario']); ?></p>
    <!-- Aquí puedes seguir mostrando más datos -->
</body>
</html>
