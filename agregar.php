<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<html>
<head>
	<title>Agregar</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$id_usuario = $_POST['id_usuario'];
	$id_producto = $_POST['id_producto'];
	$total = $_POST['total'];
	$id_proveedor = $_POST['id_proveedor'];
	$domicilio = $_POST['domicilio'];
	$cp = $_POST['cp'];
	$telefono = $_POST['telefono'];
	$fechaventa = $_POST['fechaventa'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($id_usuario) || empty($id_producto) || empty($total) || empty($id_proveedor || empty($domicilio) || empty($cp) || empty($telefono) || empty($fechaventa))) {
				
		if(empty($id_usuario)) {
			echo "<font color='red'>El campo id_usuario está vacío.</font><br/>";
		}
		
		if(empty($id_producto)) {
			echo "<font color='red'>El campo id_producto está vacío.</font><br/>";
		}
		
		if(empty($total)) {
			echo "<font color='red'>El campo total está vacío.</font><br/>";
		}
		
		if(empty($id_proveedor)) {
			echo "<font color='red'>El campo id_proveedor está vacío.</font><br/>";
		}

		if(empty($domicilio)) {
			echo "<font color='red'>El campo domicilio está vacío.</font><br/>";
		}

		if(empty($cp)) {
			echo "<font color='red'>El campo cp está vacío.</font><br/>";
		}

		if(empty($telefono)) {
			echo "<font color='red'>El campo telefono está vacío.</font><br/>";
		}

		if(empty($fechaventa)) {
			echo "<font color='red'>El campo fechaventa está vacío.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>volver</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO ventas(id_usuario, id_producto, total, id_proveedor, domicilio, cp, telefono, fechaventa, login_id) VALUES('$id_usuario','$id_producto','$total','$id_proveedor', '$domicilio', '$cp', '$telefono', '$fechaventa', '$loginId')");
		
		//display success message
		echo "<font color='green'>
		Datos agregados exitosamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
