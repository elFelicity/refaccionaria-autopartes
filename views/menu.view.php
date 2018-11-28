<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Menu</title>
</head>
<body>

	<?php if($_SESSION['tipo'] == 'ADMN') : ?>
	<a class="cerrar" href="exportar.php">Exportar Base de Datos</a>
	<br><br>
	<a class="cerrar" href="importar.php">Importar Base de Datos</a>
	<br><br><hr><br>
	<?php endif; ?>



	<div class="contenedor">
		<h1 class="titulo">Autopartes Americanas Eloy</h1>
		<h1 class="titulo"><img src="images/autopartes.png" alt="logo"> </h1>
		<a class="cerrar"href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">

		<h1 class="titulo">Productos</h1>
			<p class="texto-registrate">
				<a href="nuevo_producto.php"> Registrar Nuevo Producto </a>
			</p>
			<p class="texto-registrate">
				<a href="mostrar_productos.php"> Mostrar Productos </a>
			</p>
			<p class="texto-registrate">
				<a href="buscar_producto.php"> Buscar Productos </a>
			</p>
			<p class="texto-registrate">
				<a href="modificar_producto.php"> Modificar Producto </a>
			</p>
			<p class="texto-registrate">
				<a href="eliminar_producto.php"> Eliminar Producto </a>
			</p>

		<h1 class="titulo">Proveedores</h1>
			<p class="texto-registrate">
				<a href="nuevo_proveedor.php"> Registrar Nuevo Proveedor</a>
			</p>
			<p class="texto-registrate">
				<a href="mostrar_proveedores.php"> Mostrar Proveedores </a>
			</p>
			<p class="texto-registrate">
				<a href="buscar_proveedor.php"> Buscar Proveedor </a>
			</p>
			<p class="texto-registrate">
				<a href="modificar_proveedor.php"> Modificar Proveedor </a>
			</p>
			<p class="texto-registrate">
				<a href="eliminar_proveedor.php"> Eliminar Proveedor </a>
			</p>

			<h1 class="titulo">Marcas</h1>
				<p class="texto-registrate">
					<a href="nueva_marca.php"> Registrar Nueva Nueva </a>
				</p>
				<p class="texto-registrate">
					<a href="mostrar_marcas.php"> Mostrar Marcas </a>
				</p>
				<p class="texto-registrate">
					<a href="buscar_marca.php"> Buscar Marca </a>
				</p>
				<p class="texto-registrate">
					<a href="modificar_marca.php"> Modificar Marca </a>
				</p>
				<p class="texto-registrate">
					<a href="eliminar_marca.php"> Eliminar Marca </a>
				</p>

	</div>
</body>
</html>
