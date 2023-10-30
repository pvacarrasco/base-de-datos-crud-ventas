<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$id_usuario = $_POST['id_usuario'];
	$id_producto = $_POST['id_producto'];
	$total = $_POST['total'];	
	$id_proveedor = $_POST['id_proveedor'];	
	$domicilio = $_POST['domicilio'];	
	$cp = $_POST['cp'];	
	$telefono = $_POST['telefono'];	
	$fechaventa = $_POST['fechaventa'];	
	
	// checking empty fields
	if(empty($id_usuario) || empty($id_producto) || empty($total) || empty($id_proveedor) || empty($domicilio) || empty($cp) || empty($telefono) || empty($fechaventa)) {
				
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
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE ventas SET id_usuario='$id_usuario', id_producto='$id_producto', total='$total', id_proveedor='$id_proveedor', domicilio='$domicilio', cp='$cp', telefono='$telefono', fechaventa='$fechaventa'   WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$id_usuario = $res['id_usuario'];
	$id_producto = $res['id_producto'];
	$total = $res['total'];
	$id_proveedor = $res['id_proveedor'];
	$domicilio = $res['domicilio'];
	$cp = $res['cp'];
	$telefono = $res['telefono'];
	$fechaventa = $res['fechaventa'];
}
?>
<html>
<head>	
	<title>editar</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver</a> | <a href="cerrarsesion.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>id_usuario</td>
				<td><input type="text" name="id_usuario" value="<?php echo $id_usuario;?>"></td>
			</tr>
			<tr> 
				<td>id cliente</td>
				<td><input type="text" name="id_producto" value="<?php echo $id_producto;?>"></td>
			</tr>
			<tr> 
				<td>total</td>
				<td><input type="text" name="total" value="<?php echo $total;?>"></td>
			</tr>
			<tr> 
				<td>id proveedor</td>
				<td><input type="text" name="id_proveedor" value="<?php echo $id_proveedor;?>"></td>
			</tr>
			<tr> 
				<td>domicilio</td>
				<td><input type="text" name="domicilio" value="<?php echo $domicilio;?>"></td>
			</tr>
			<tr> 
				<td>codigo postal</td>
				<td><input type="text" name="cp" value="<?php echo $cp;?>"></td>
			</tr>
			<tr> 
				<td>telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $telefono;?>"></td>
			</tr>
			<tr> 
				<td>fechaventa</td>
				<td><input type="text" name="fechaventa" value="<?php echo $fechaventa;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
