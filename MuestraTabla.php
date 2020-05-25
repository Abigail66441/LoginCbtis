<head>
<title>Creación de un portal con PHP y MySQL</title>
</head>
<body bgcolor="#303030">
<body text= "#E5E5E5">
<body leftmargin="50">
<font face = "tahoma">
<font size = "2">


<?php
echo "<p align = center>";
echo "A continuacioón se muestra el resultado de seleccionar";
echo " todos los resgistros de las tabla clientes.";

include 'conexion.php';
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
   }

$consulta = "SELECT Nombre, Apellidos FROM $tbl_name";
$result = $conexion->query($consulta);

echo "<table align = center border = 1 bgcolor = #6B6BFF cellspacing = 5>";
while ($reg = mysqli_fetch_row($result)){
    echo"<tr>";
    echo"<br>";
    foreach($reg as $cambia){
        echo"<td>", $cambia, "</td>";
    }
}
echo "</table>";
?>