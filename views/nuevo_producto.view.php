<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?ts=<?=time()?>"media="screen">
	<title>Registro de Productos</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Registrar un nuevo Producto</h1>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="nuevopac" >
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
        <i class="icono izquierda fa fa-envelope"></i><input type="text" name="id_proveedor" class="usuario" placeholder="Identificador del Proveedor">
      </div>
      <div class="form-group">
        <i class="icono izquierda fa fa-envelope"></i><input type="text" name="costo" class="usuario" placeholder="Costo">
      </div>
      <div class="form-group">
        <select class="usuario" name="ubicacion_edi">
        <option value="NULL" selected> Edificio en el que se Encuentra </option>
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
			<input type="submit" name="submit" class="submit-pac" value="Registrar">

		</form>

		<?php if(!empty($errores)): ?>
			<div class="error">
				<ul>
					<?php echo $errores; ?>
				</ul>
			</div>
		<?php endif;?>

		<p class="texto-registrate">
			<a href="menu.php">Regresar a Menu Principal</a>
		</p>
	</div>

</body>
</html>
