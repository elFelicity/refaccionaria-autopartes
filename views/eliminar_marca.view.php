<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Eliminar Marcas</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Eliminar Marca</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
			<div class="form-group">
				<i class="icono izquierda fa fa-list"></i><input type="text" name="id_marca" class="usuario" placeholder="ID de la Marca a eliminar">
			</div>
			<input type="submit" name="submit" class="submit-pac" value="Buscar Marca">
			<?php if(isset($_POST['id_marca']) && empty($errores)): ?>
			<hr class="border">
			<table class="center">
				<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
				  </tr>
						<tr>
              <td><?php echo $resultado['id_marca']?></td>
              <td><?php echo $resultado['nombre_marca']?></td>
              <td><?php echo $resultado['descripcion']?></td>
						 </tr>
				</table>
				<hr class="border">
				<div style="text-align: center;">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
						<input class="esconder" type="radio" name="id_marca" value="<?php echo $resultado['id_marca']?>" checked><br>
						<h1 class="titulo">¿Estás seguro de que quieres eliminar este registro?</h1>
						<input type="submit" name="submit" class="submit-pac-si" value="SI"> <input type="submit" name="submit" class="submit-pac-no" value="NO">
					</form>
				</div>
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
				<a href="menu.php"> Menu Principal </a>
			</p>
	</div>

</body>
</html>
