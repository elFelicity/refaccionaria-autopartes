<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Proveedores</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Proveedores Registrados</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="formulario">
			<table class="center">
			  <tr>
			    <th>ID</th>
			    <th>Nombre</th>
			    <th>Teléfono</th>
			    <th>Dirección</th>
			    <th>Correo</th>
			  </tr>
			  <?php foreach ($proveedores as $proveedor) : ?>
					<tr>
					    <td><?php echo $proveedor['id_proveedor']?></td>
					    <td><?php echo $proveedor['nombre']?></td>
					    <td><?php echo $proveedor['telefono']?></td>
					    <td><?php echo $proveedor['direccion']?></td>
					    <td><?php echo $proveedor['correo']?></td>
					 </tr>
				<?php endforeach ?>
			</table>
		</div>
			<p class="texto-registrate">
				<a href="nuevo_proveedor.php"> Registrar un nuevo Proveedor </a>
			</p>
			<p class="texto-registrate">
				<a href="menu.php"> Regresar al Menú Principal </a>
			</p>
	</div>

</body>
</html>
