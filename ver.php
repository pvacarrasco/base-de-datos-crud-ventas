<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM ventas WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">agregar</a> | <a href="cerrarsesion.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>id_usuario</td>
			<td>id_producto</td>
			<td>total</td>
			<td>id_proveedor</td>
			<td>domicilio</td>
			<td>cp</td>
			<td>telefono</td>
			<td>fechaventa</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id_usuario']."</td>";
			echo "<td>".$res['id_producto']."</td>";
			echo "<td>".$res['total']."</td>";	
			echo "<td>".$res['id_proveedor']."</td>";	
			echo "<td>".$res['domicilio']."</td>";	
			echo "<td>".$res['cp']."</td>";
			echo "<td>".$res['telefono']."</td>";
			echo "<td>".$res['fechaventa']."</td>";
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"eliminar.php?id=$res[id]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
