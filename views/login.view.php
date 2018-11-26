<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width = device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimun-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login-estilos.css" media="screen">
	<title>Inicio de Sesión</title>
</head>

<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login" name="login" method="post">
        <img id="imagen" src="images/autopartes.png">
		<h1 class="login-title">Inicio de Sesión</h1>
		<input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" class="login-input" autofocus><br>
		<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="login-input"><br>
		<input type="submit" value="Acceder" class="login-button">

		<?php if(!empty($errores)): ?>
			<div class="error">
				<ul>
					<?php echo $errores; ?>
				</ul>
			</div>
		<?php endif;?>

	</form>

	<p class="texto-registrate">
		¿Aún no tienes cuenta?
		<a class="url-registrate" href="registrarse.php">Haz una cuenta ahora</a>
	</p>

</body>

</html>
