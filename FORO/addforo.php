<!-- SEGURIDAD EN LA SESION DE LA PAGINA -->
<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
   header('Location: http://localhost/logincbtis/login.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/logincbtis/login.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion a expirado,
<a href='login.html'>Inicia Sesion</a>";
exit;
}
?>

<head>
<title>Creación de un portal con PHP y MySQL</title>
</head>
<body bgcolor="#303030">
<body text= "#E5E5E5">
<font face = "tahoma">
<font size = "2">
<body link = "#E5E5E5" vlink="E0E0E0">
<p aling = "center">
<font size = "2">	

<?php 
$mensaje = $_POST['mensaje'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$id = $_POST['id'];
$respuestas = $_POST['respuestas'];

include '../conexion.php';
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
   }

$fecha = time();
if (empty($identificador))
{$identificador = 0;}
$respuestas = $respuestas+1;

$consulta = "INSERT INTO foro1 (autor,titulo,mensaje,fecha,identificador) VALUES ('$autor','$titulo','$mensaje','$fecha','$identificador')";
$result1 = $conexion->query($consulta);

$consulta2 = "UPDATE foro1 SET respuestas = '$respuestas' where id='$identificador'";
$result2 = $conexion->query($consulta2);


$consulta3 = "SELECT '$mensaje' FROM foro1 WHERE mensaje='$mensaje'";
$result3 = $conexion->query($consulta3);

while ($reg = mysqli_fetch_row($result3))
{
	echo '<tr>';
	foreach ($reg as $clave) 
	{
		echo '<td>',$clave,'</td>';
	}
}

echo '<br><br>';
echo '<a href=indexforo.php>Volver al foro</a></font></center>';

?>