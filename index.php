<?php
$hostDB = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";
//$portDB = "4203";
$conexDB = new mysqli($hostDB, $userDB, $pwdDB, $nameDB);
if ($conexDB->connect_error) {
    echo $conexDB->connect_error;
    die();
}
echo "Conexión exitosa<br>";

echo "<table border='2'>";
echo "<tr>
        <th>Nombre </th>
        <th>Email</th>
        <th>Edad</th>
        </tr>";

$sql = "select * from personas";
$resultadosSQL = $conexDB->query($sql);
if ($resultadosSQL->num_rows > 0) {
    while ($row = $resultadosSQL->fetch_assoc()) {
        $id = $row['id'];
        $nombre = $row['nombre'];
        $email = $row['email'];
        $edad = $row['edad'];

        echo "<tr>
        <td>$nombre</td>
        <td>$email</td>
        <td>$edad</td>
        </tr>";
    }
} else {
    echo "<br>No hay registros<br>";

}

echo "</table>";
//Modificar


//Eliminar


//Crear


//Mayor de edad
$esMayorEdad = $edad >= 18 && $edad <= 150 ? 'si' : 'no';


$resultadoSQL = $conexDB->query($sql);
if($resultadoSQL){
    echo "<br>Datos guardados<br>";
}else{
    echo "<br>No fue posible guardar la información<br>";
}

$conexDB->close();