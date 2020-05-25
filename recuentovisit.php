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

<?php
// FECHA Y HORA DE NUESTRO PORTAL
echo "Hoy es día" . " ",date ("d/m/Y")," y la hora actual es "."",date ("h:i:s"),".<br><br> Queremos dar la bienvenida a nuestro portal.";
echo "<br>";
echo "<br>";
echo "<br>";
echo date ("d/m/Y"), " ---- ".Date("h:i");
echo "<br>";
echo "<br>";

?>



<h3>
<!-- Recuento de visitas en el portal -->
<p align="center"> RESUMEN DE VISITAS DEL PORTAL</p>
</h3>
<hr size="8" color="ffffff">
<?php
print ("Las visitas de la pagina A son: ");
include ("ctlvisitas/visitas.txt");
echo "<hr size = 2 color= ffffff width=30% align = left>";
echo "<br>";
print ("Las visitas de la pagina B son: ");
include ("ctlvisitas/visitas2.txt");
echo "<hr size = 2 color= ffffff width=30% align = left>";
echo "<br>";
print ("Las visitas de la pagina C son: ");
include ("ctlvisitas/visitas3.txt");
echo "<hr size = 2 color= ffffff width=30% align = left>";
echo "<br>";
print ("Las visitas de la pagina D son: ");
include ("ctlvisitas/visitas4.txt");
echo "<hr size = 2 color= ffffff width=30% align = left>";
echo "<br>";

/*A partir de aqui se crean los graficos que mostraran el porcentaje de visitas de cada una de las paginas */
echo "<hr size=8 color=ffffff>";
$archivo1 = "ctlvisitas/visitas.txt";
$archivo2 = "ctlvisitas/visitas2.txt";
$archivo3 = "ctlvisitas/visitas3.txt";
$archivo4 = "ctlvisitas/visitas4.txt";
$abre1 = fopen($archivo1, "r");
$abre2 = fopen($archivo2, "r");
$abre3 = fopen($archivo3, "r");
$abre4 = fopen($archivo4, "r");
$total1 = fread($abre1, filesize($archivo1));
$total2 = fread($abre2, filesize($archivo2));
$total3 = fread($abre3, filesize($archivo3));
$total4 = fread($abre4, filesize($archivo4));
$visitas=$total1+$total2+$total3+$total4;
$por1=$total1*100/$visitas;
$por1=intval ( $por1, 10);
$por2=$total2*100/$visitas;
$por2=intval ( $por2, 10);
$por3=$total3*100/$visitas;
$por3=intval ( $por3, 10);
$por4=$total4*100/$visitas;
$por4=intval ( $por4, 10);
echo "Página A: <b>$total1 </b>visitas - <b>$por1 % </b>".""; echo "<img height=15 width=$por1 src=img/figuraporc.jpg>";
echo "<br><br>";
echo "Página B: <b>$total2 </b>visitas - <b>$por2 % </b>".""; echo "<img height=15 width=$por2 src=img/figuraporc.jpg>";
echo "<br><br>";
echo "Página C: <b>$total3 </b>visitas - <b>$por3 % </b>".""; echo "<img height=15 width=$por3 src=img/figuraporc.jpg>";
echo "<br><br>";
echo "Página D: <b>$total4 </b>visitas - <b>$por4 % </b>".""; echo "<img height=15 width=$por4 src=img/figuraporc.jpg>";
echo "<br><br><br>";
$todo = $por1+$por2+$por3+$por4;
echo "<hr size = 2 color= ffffff width=30% align = left>";
echo "Total visitas: <b>$visitas</b> de un <b> $todo % </b>";
echo "<img height=15 width=$todo src=img/figuraporc.jpg>";

?>
