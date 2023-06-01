<!DOCTYPE html>
<html>
<head>
    <title>Formulario PHP</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practica6";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>¡Formulario enviado con éxito!</h2>";
        echo "<p>Nombre: " . $nombre . "</p>";
        echo "<p>Apellido: " . $apellido . "</p>";
        echo "<p>Email: " . $email . "</p>";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>

