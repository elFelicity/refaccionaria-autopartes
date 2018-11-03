<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario =filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['contrasena'];
	$password = hash('sha512', $password);

	try{
		//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
		$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
	}catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}

	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();

	if ($resultado != false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: menu.php');
	}else{
		$errores .= '<li>Datos Incorrectos</li>';
	}
}

require 'views/login.view.php';

?>
