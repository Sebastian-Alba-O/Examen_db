<?php
$hostDB = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

$id = $_GET['id'];

$conexDB = new mysqli($hostDB, $userDB, $pwdDB, $nameDB);
if ($conexDB->connect_error) {
    echo $conexDB->connect_error;
    die();
}
echo "Conexión exitosa <br>";
echo "<br>";

if (isset($_POST['editar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $sql = "UPDATE personas SET nombre='$nombre', email='$email', edad=$edad WHERE id=$id";
    if ($conexDB->query($sql) === TRUE) {
        echo "<p style='color: green;'>Registro actualizado exitosamente.</p>";
    } else {
        echo "<p style='color: red;'>Error al actualizar el registro: " . $conexDB->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
</head>
<body>
    <h2>Editar Persona</h2>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="" required><br>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="" required><br>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" value="" required><br>
        <br>
        <button type="submit" name="editar">Guardar Cambios</button>
        <a href="index.php">
            <button type="button">Volver</button>
        </a>
    </form>
</body>
</html>
