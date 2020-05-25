<head>
<title>Creación de un portal con PHP y MySQL</title>
</head>
<body bgcolor="#303030">
<body text= "#E5E5E5">
<font face = "tahoma">
<font size = "2">
<body link = "#E5E5E5" vlink="E0E0E0">
<p align = "center">	
<STRONG>Su mensaje ha sido enviado. En breve contactaremos con usted. Gracias.</STRONG>
<?php

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$direccion=$_POST["direccion"];
$localidad=$_POST["localidad"];
$estado=$_POST["estado"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];

$fecha=date("d-m-Y");
$hora=date("H-i");
$destinatario="elo.glez90@gmail.com";
/*El correo electronico es un valor que nunca se va a modificar, es decir, los correos que nos envien siempre llegaran a la direeccion de correo electronico que aqui porgamos. Por eso hay que prestar atencion si algun dia modificamos nuestra direccion de correo electronico. De cambiarla, en este codigo tambien debe hacerse, porque, de lo contrario, cada vez que nos amnden algun correo no lo recibiremos. */
$asunto="Contacto del cliente";
echo "<br><br><br>";
echo "Compruebe si sus datos son correctos, de lo contrario pinche en <a href=http://localhost/logincbtis/FORMCONTACTO/form.html>Volver</a>";
$texto="Nombre:"."\n".$nombre."<br>"."Apellidos:"."\n".$apellidos."<br>"."Direccion:"."\n".$direccion."<br>"."Localidad:"."\n".$localidad."<br>"."Estado:"."\n".$estado."<br>"."Telefono:"."\n".$telefono."<br>"."Email:"."\n".$email."<br>"."Fecha:"."\n".$fecha."<br>"."Hora:"."\n".$hora;
/*Lo que hacemos con la variable $texto es unir dentro de ella todos los campos que recibimos del formulario para poder enviar con la funcion mail() en una sola variable todo el contenido con los datos de contacto.*/
echo "<br><br><br>";
echo $texto;
echo "<br><br>";
mail($destinatario,$asunto,$texto);
?>
