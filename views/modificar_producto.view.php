<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Modificar Producto</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Modificar Producto</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
			<div class="form-group">
				<i class="icono izquierda fa fa-list"></i><input type="text" name="descripcion" class="usuario" placeholder="ID del Proveedor que desea Buscar">
			</div>
			<input type="submit" name="submit" class="submit-pac" value="Buscar Proveedor">
			<?php if(isset($_POST['descripcion']) && empty($errores)): ?>
			<hr class="border">
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
						<tr>
							<td><?php echo $resultado['codigo_barras']?></td>
							<td><?php echo $resultado['numero_pieza']?></td>
							<td><?php echo $resultado['descripcion']?></td>
							<td><?php echo $resultado['stock']?></td>
							<td><?php echo $resultado['id_marca']?></td>
							<td><?php echo $resultado['id_proveedor']?></td>
							<td><?php echo $resultado['costo']?></td>
							<td><?php echo $resultado['ubicacion_edificio']?></td>
							<td><?php echo $resultado['ubicacion_pasillo']?></td>
							<td><?php echo $resultado['ubicacion_anaquel']?></td>
							<td><?php echo $resultado['ubicacion_charola']?></td>
						 </tr>
				</table>
				<hr class="border">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
								<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="barcode" class="usuario" placeholder="Código de Barras">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-phone"></i><input type="text" name="num_pieza" class="usuario" placeholder="Número de Pieza">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-home"></i><input type="text" name="descripcion" class="usuario" placeholder="Descripción">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-envelope"></i><input type="text" name="stock" class="usuario" placeholder="Número de Productos a Registrar">
			</div>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-envelope"></i><input type="text" name="id_marca" class="usuario" placeholder="Identificador de la Marca">
                    </div>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-envelope"></i><input type="text" name="id_proveedor" class="usuario" placeholder="Identificador del     Proveedor">
                    </div>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-envelope"></i><input type="text" name="costo" class="usuario" placeholder="Costo">
                    </div>
                    <div class="form-group">
                        <select class="usuario" name="ubicacion_edi">
                            <option selected> Edificio en el que se Encuentra </option>
                            <option value="MOSTRADOR"> Mostrador </option>
                            <option value="BODEGA"> Bodega </option>
                            </div>
                        </select>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_pasi" min="0" max="100"><label>     Pasillo</label>
                    </div>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_ana" min="0" max="100"><label>     Anaquel</label>
                    </div>
                    <div class="form-group">
                        <i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_charo" min="0" max="100"><label>     Charola</label>
                    </div>
                    <input class="esconder" type="radio" name="descripcion" value="<?php echo $resultado['descripcion']?>" checked><br>

					<input type="submit" name="submit" class="submit-pac" value="Modificar Producto">
				</form>
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
