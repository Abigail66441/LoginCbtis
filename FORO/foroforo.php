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
<font size = "4">	
<u>Leyendo mensaje del Foro</u>
</font></p>

<?php
include '../conexion.php';

$enlace = mysqli_connect($host_db, $user_db, $pass_db, $db_name);

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
$id = $_GET['id'];
$consulta = "SELECT * FROM foro1 WHERE id = '$id' ORDER BY fecha DESC";
if ($resultado = mysqli_query($enlace, $consulta)) {

    /* obtener el array asociativo */
    echo "<hr size = 10 color = ffffff width = 100% aling = left>";
	while ($fila = mysqli_fetch_row($resultado)) {
    	$titulo = $fila[2];
    	$autor = $fila[1];
    	$mensaje = $fila[3];
    	$id = $fila[0];
		$fecha = $fila[4];
		$respuestas = $fila[5];
echo "<table><tr><td>TITULO: $titulo</td><tr>";
	echo "<td>AUTOR: $autor</td><tr>";
	echo "<tr><td>$mensaje</td><tr></table>";
	echo "<center><font face=arial size=1>";
	echo "<a href=../formularioforo.php?id=$id&respuestas=$respuestas>";
	echo "<br><br>";
	echo "<a href=formularioforo.php?respuestas=0>Añadir mensaje</a>";
	echo "<a href=indexforo.php>Volver al foro</a></font></center>";
    }
}


$consulta2 = "SELECT * FROM foro1 WHERE identificador = '$id' ORDER BY fecha DESC";
if ($resultado2 = mysqli_query($enlace, $consulta2)) {

    /* obtener el array asociativo */
    echo "RESPUESTAS:<br><br>";
	while ($reg = mysqli_fetch_row($resultado2)){
    	$titulo = $fila[2];
    	$autor = $fila[1];
    	$mensaje = $fila[3];
    	$id = $fila[0];
		$fecha = $fila[4];
		$respuestas = $fila[5];
	echo "<table><tr><td>TITULO: $titulo</td><tr>";
	echo "<td>AUTOR: $autor</td><tr>";
	echo "<tr><td>MENSAJE: $mensaje</td><tr></table>";
    }
}

?>