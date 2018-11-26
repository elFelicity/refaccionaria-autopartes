<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Búsqueda de Productos</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Buscar Producto</h1>
		<a class="cerrar "href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
			<div class="form-group">
				<i class="icono izquierda fa fa-list"></i><input type="text" name="descripcion" class="usuario" placeholder="Descripción del Producto que desea Buscar">
			</div>
			<input type="submit" name="submit" class="submit-pac" value="Buscar Producto">
			<table class="center">
			<?php if(isset($_POST['descripcion']) && empty($errores)): ?>
				<tr>
          <th>Código de barras</th>
			    <th>Número de Pieza</th>
			    <th>Descripción</th>
			    <th>Stock</th>
			    <th>ID Marca</th>
          <th>ID Proveedor</th>
          <th>ID Costo</th>
          <th>Edificio</th>
          <th>Pasillo</th>
          <th>Anaquel</th>
          <th>Charola</th>
        </tr>
						<tr>
              <td><?php echo $busqueda['codigo_barras']?></td>
					    <td><?php echo $busqueda['numero_pieza']?></td>
					    <td><?php echo $busqueda['descripcion']?></td>
					    <td><?php echo $busqueda['stock']?></td>
					    <td><?php echo $busqueda['id_marca']?></td>
              <td><?php echo $busqueda['id_proveedor']?></td>
              <td><?php echo $busqueda['costo']?></td>
              <td><?php echo $busqueda['ubicacion_edificio']?></td>
              <td><?php echo $busqueda['ubicacion_pasillo']?></td>
              <td><?php echo $busqueda['ubicacion_anaquel']?></td>
              <td><?php echo $busqueda['ubicacion_charola']?></td>
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
