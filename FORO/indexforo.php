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

<html>
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
<u>Foro de portal de coches</u>
</font></p>
<table width="100%" border='0' cellspacing="0" cellpadding="0">
<br><br>
<tr>
<td width="5%"></td>
<td width="35%">
<b>TITULO</b>
</td>
<td width="30%">
<b>FECHA</b>
</td>
<td width="30%">
<b>RESPUESTAS</b>
</td></tr></table>

<?php 
include '../conexion.php';

$enlace = mysqli_connect($host_db, $user_db, $pass_db, $db_name);

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$consulta = "SELECT * FROM foro1 WHERE identificador = 0 ORDER BY fecha DESC";

if ($resultado = mysqli_query($enlace, $consulta)) {

    /* obtener el array asociativo */
    echo "<hr size = 10 color = ffffff width = 100% aling = left>";
    while ($fila = mysqli_fetch_row($resultado)) {
    	$titulo = $fila[2];
    	$id = $fila[0];
		$fecha = $fila[4];
		$respuestas = $fila[5];
        echo ("<table width = '100%' border='0' cellspacing='0' cellpadding ='0'>\n");
        echo ('<tr>');
        echo ("<td width='5%'><a href=foroforo.php?id=$id>Ver</a></td>\n");
        echo ("<td width='30%'>$titulo</a></td>\n");
        echo ("<td width='30%'>".date("d-m-y",$fecha)."</td>\n");
        echo ("<td width='30%'>$respuestas</td>\n");
        echo ("</table>\n");
        echo "<hr size = 2 color = ffffff width = 100% aling = left>";
    }

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}

/* cerrar la conexión */
mysqli_close($enlace);


 ?>

 <br><p aling = 'center'>
 <font face = "arial" size ='1'>
 	<a href=formularioforo.php?respuestas=0>
 	Añadir mensaje</a></p>
 </font>