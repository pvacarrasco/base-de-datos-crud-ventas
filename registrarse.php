<html>
<head>
	<title>registrarse</title>
</head>

<body>
<a href="index.php">inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$gmail = $_POST['gmail'];
	$usuario = $_POST['usuario'];
	$pass = $_POST['password'];

	if($usuario == "" || $pass == "" || $nombre == "" || $gmail == "") {
		echo "Todos los campos deben estar llenos. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='registrarse.php'>volver</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, gmail, usuario, password) VALUES('$nombre', '$gmail', '$usuario', md5('$pass'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>iniciar sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>gmail</td>
				<td><input type="text" name="gmail"></td>
			</tr>			
			<tr> 
				<td>usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>contraseña</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
