<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Búsqueda de Marcas</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Buscar Marca</h1>
		<a class="cerrar "href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
			<div class="form-group">
				<i class="icono izquierda fa fa-list"></i><input type="text" name="id_marca" class="usuario" placeholder="ID de la Marca que desea Buscar">
			</div>
			<input type="submit" name="submit" class="submit-pac" value="Buscar Marca">
			<table class="center">
			<?php if(isset($_POST['id_marca']) && empty($errores)): ?>
				<tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
        </tr>
						<tr>
              <td><?php echo $busqueda['id_marca']?></td>
              <td><?php echo $busqueda['nombre_marca']?></td>
              <td><?php echo $busqueda['descripcion']?></td>
						 </tr>
				</table>
			<?php endif;?>
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif;?>
		</form>
			<p class="texto-registrate">
				<a href="menu.php"> Menú Principal </a>
			</p>
	</div>

</body>
</html>
