<!--4.-Este fichero sera el encargado de darnos respuesta cuando un usuario intente identificarse -->
<head>
<title>Creación de un portal con PHP y MySQL</title>
</head>
<body bgcolor="#303030">
<body text= "#E5E5E5">
<font face = "tahoma">
<font size = "2">
<body link = "#E5E5E5" vlink="E0E0E0">
<p align = "center">	
<STRONG>RESPUESTA A SU IDENTIFICACION</STRONG>
<br><br>

<?php
$usuario = $_POST['usuario'];
$cont = $_POST['cont'];

include '../conexion.php';
$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$consulta = mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE usuario LIKE '$usuario' and contrasena LIKE '$cont'");

$dato = mysqli_fetch_array($consulta);
$cambia = $dato["nombre"];
echo "<hr size = 10 color = ffffff width = 100% align = left>";

if ($dato == ""){
	echo "Los datos no son correctos, <a href=formregistrados.php>Volver";
}
else{
echo "<strong>Bienvenidos a nuestra web $cambia</strong>";
}
?>