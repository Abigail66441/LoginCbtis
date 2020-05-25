<!--2.- El siguiente paso es crear el fichero registro.php, que sera el encargado de recibir los datos del formulario e insertarlos en la base de datos, para que el usuario quede registrado.-->

<head>
<title>Creación de un portal con PHP y MySQL</title>
</head>
<body bgcolor="#303030">
<body text= "#E5E5E5">
<font face = "tahoma">
<font size = "2">
<body link = "#E5E5E5" vlink="E0E0E0">
<p align = "center">	
<STRONG>Su registro se ha completado con exito</STRONG>
<br><br>

<?php
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$cont = $_POST['cont'];
$email = $_POST['email'];

include '../conexion.php';

$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$insercion = mysqli_query($conexion, "INSERT INTO usuarios (nombre,apellidos,usuario,contrasena,email) VALUES ('$nombre','$apellidos','$usuario','$cont','$email')");

echo 'REGISTRO INSERTADO CORRECTAMENTE';
echo "<br>";

echo "<hr size = 10 color = ffffff width = 100% align = left>";
echo "<strong>Bienvenido a nuestra web $nombre </strong>";

?>