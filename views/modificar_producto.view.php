<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Modificar Productos</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Modificar Producto</h1>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac">
			<div class="form-group">
				<i class="icono izquierda fa fa-list"></i><input type="text" name="descripcion" class="usuario" placeholder="Descripción del Producto que desea Buscar">
			</div>
			<input type="submit" name="submit" class="submit-pac" value="Buscar Producto">
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
    				<i class="icono izquierda fa fa-phone"></i><input type="text" name="num_pieza2" class="usuario" placeholder="Nuevo Número de Pieza">
    			</div>
    			<div class="form-group">
    				<i class="icono izquierda fa fa-home"></i><input type="text" name="descripcion2" class="usuario" placeholder="Nueva Descripción">
    			</div>
    			<div class="form-group">
    				<i class="icono izquierda fa fa-envelope"></i><input type="text" name="stock2" class="usuario" placeholder="Nuevo Número de Productos en Existencia">
    			</div>
          <!--<div class="form-group">
            <i class="icono izquierda fa fa-envelope"></i><input type="text" name="id_marca2" class="usuario" placeholder="Nuevo Identificador de la Marca">
          </div>
          <div class="form-group">
            <i class="icono izquierda fa fa-envelope"></i><input type="text" name="id_proveedor2" class="usuario" placeholder="Nuevo Identificador del Proveedor">
          </div>-->
          <div class="form-group">
            <i class="icono izquierda fa fa-envelope"></i><input type="text" name="costo2" class="usuario" placeholder="Nuevo Costo">
          </div>
          <div class="form-group">
            <select class="usuario" name="ubicacion_edi2">
            <option value="NULL" selected> Nuevo Edificio en el que se Encuentra </option>
            <option value="MOSTRADOR"> Mostrador </option>
            <option value="BODEGA"> Bodega </option>
          </div>
          </select>
          <div class="form-group">
    				<i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_pasi2" min="0" max="100"><label>     Nuevo Pasillo</label>
    			</div><div class="form-group">
    				<i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_ana2" min="0" max="100"><label>     Nuevo Anaquel</label>
    			</div><div class="form-group">
    				<i class="icono izquierda fa fa-list-ol"></i><input type="number" name="ubicacion_charo2" min="0" max="100"><label>     Nueva Charola</label>
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
