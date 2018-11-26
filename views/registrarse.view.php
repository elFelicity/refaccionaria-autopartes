<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login-estilos.css">
	<title>Registrate</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login" name="login" method="post"  onsubmit="return validacion();">
				<img id="imagen" src="images/autopartes.png">
		<h1 class="login-title">Registro</h1>
		<input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" class="login-input" autofocus><br>
		<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="login-input"><br>
		<input type="password" name="contrasena2" id="contrasena2" placeholder="Escriba su contraseña de nuevo" class="login-input"><br>
        <a>Selecciona tipo de usuario: <select required  name="seleccion">
            <option value="EMPL">EMPL</option>
            <option value="ADMN">ADMN</option>
        </select></a><br><br>
        <a>Permiso necesario:</a><br><br>
        <input type="text" name="adminUser" id="adminUser" placeholder="Usuario Administrador" class="login-input"><br>
        <input type="password" name="adminPass" id="adminPass" placeholder="Contraseña" class="login-input"><br><br>
		<input type="submit" value="Registrar" class="login-button">
		<?php if(!empty($errores)): ?>
			<div class="error">
				<ul>
					<?php echo $errores; ?>
				</ul>
			</div>
		<?php endif;?>
	</form>

	<p class="texto-registrate">
		¿Ya tienes cuenta?
		<a class="url-registrate" href="login.php">Inicia Sesión</a>
	</p>

</body>

</body>
</html>
