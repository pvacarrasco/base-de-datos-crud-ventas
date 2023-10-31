<?php session_start(); ?>
<html>
<head>
	<title>Inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenida <?php echo $_SESSION['nombre'] ?> ! <a href='cerrarsesion.php'>cerrar sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver y añadir</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='iniciarsesion.php'>iniciar sesion</a> | <a href='registrarse.php'>registrarse</a>";
	}
	?>
	<div id="footer">
		<a href="https://pvacarrasco.github.io/opticaa/index.html" title="Master">Creado por Paola Armenta</a>
		
	
	</div>
</body>
</html>
