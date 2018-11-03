<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Marcas</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Marcas Registradas</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="formulario">
			<table class="center">
			  <tr>
			    <th>ID</th>
			    <th>Nombre</th>
			    <th>Descripción</th>
			  </tr>
			  <?php foreach ($marcas as $marca) : ?>
					<tr>
					    <td><?php echo $marca['id_marca']?></td>
					    <td><?php echo $marca['nombre_marca']?></td>
					    <td><?php echo $marca['descripcion']?></td>
					 </tr>
				<?php endforeach ?>
			</table>
		</div>
			<p class="texto-registrate">
				<a href="nueva_marca.php"> Registrar un nueva Marca </a>
			</p>
			<p class="texto-registrate">
				<a href="menu.php"> Regresar al Menú Principal </a>
			</p>
	</div>

</body>
</html>
