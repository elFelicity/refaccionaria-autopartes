<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Registro de Proveedores</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Registrar un nuevo Proveedor</h1>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac" >
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="usuario" placeholder="Nombre">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-phone"></i><input type="text" name="telefono" class="usuario" placeholder="Teléfono">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-home"></i><input type="text" name="direccion" class="usuario" placeholder="Dirección">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-envelope"></i><input type="text" name="correo" class="usuario" placeholder="Correo">
			</div>

			<input type="submit" name="submit" class="submit-pac" value="Registrar">
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif;?>
		</form>
		<p class="texto-registrate">
			<a href="menu.php">Regresar a Menu Principal</a>
		</p>
	</div>

</body>
</html>
