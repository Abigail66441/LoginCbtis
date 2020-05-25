
<?php
//incluimos el archivo donde se encuentran nuestros datos de conexion
 include 'conexion.php';
 
 $form_pass = $_POST['password'];
 
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE nom_usu = '$_POST[username]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "Nombre de Usuario ya asignado, ingresa otro." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

  //insertar lo del formulario
 $query = "INSERT INTO clientes (nombre,apellidos,edad,poblacion,telefono,e_mail,nom_usu,contrasena) VALUES ('$_POST[username]', '$form_pass')";

 if ($conexion->query($query) === TRUE) {
 // header('Location: http://localhost/Login/login.html');
 echo "<br />" . "<h1>" . "Gracias por registrarse!" . "</h1>";
 echo "<h3>" . "Bienvenido: " . $_POST['username'] . "</h3>" . "\n\n";
 echo "<h3>" . "Iniciar Sesion: " . "<a href='login.html'>Login</a>" . "</h3>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
