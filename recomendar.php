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

$nombreamigo = $_POST['nombreamigo'];
$tunombre = $_POST['tunombre'];
$emailamigo = $_POST['emailamigo'];
$tuemail = $_POST['tuemail'];


    $asunto = "Te recomiendo visitar este portal.";
    $mensaje = "Hola ". $nombreamigo.", soy".$tunombre."Te recomiedo visitar www.mipaginacbtis.com, un portal en el que podras encontrar informacion muy interesante, un foro muy sensillo y con muchisima informacion. Espero que lo visites pronto, ya que estoy convencido de que te va a gustar. Por cierto, su es de tu agrado, no dejes de firmar el libro de visitas";
    mail($emailamigo,$asunto,$mensaje, "From: ".$tuemail);



    echo "Mensaje enviado";
?>