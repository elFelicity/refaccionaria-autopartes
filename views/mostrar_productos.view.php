<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Productos</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Productos Registrados</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="formulario">
			<table class="center">
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
			  <?php foreach ($productos as $producto) : ?>
					<tr>
					    <td><?php echo $producto['codigo_barras']?></td>
					    <td><?php echo $producto['numero_pieza']?></td>
					    <td><?php echo $producto['descripcion']?></td>
					    <td><?php echo $producto['stock']?></td>
					    <td><?php echo $producto['id_marca']?></td>
              <td><?php echo $producto['id_proveedor']?></td>
              <td><?php echo $producto['costo']?></td>
              <td><?php echo $producto['ubicacion_edificio']?></td>
              <td><?php echo $producto['ubicacion_pasillo']?></td>
              <td><?php echo $producto['ubicacion_anaquel']?></td>
              <td><?php echo $producto['ubicacion_charola']?></td>
					 </tr>
				<?php endforeach ?>
			</table>
		</div>
			<p class="texto-registrate">
				<a href="nuevo_producto.php"> Registrar un nuevo Producto </a>
			</p>
			<p class="texto-registrate">
				<a href="menu.php"> Regresar al Menú Principal </a>
			</p>
	</div>

</body>
</html>
