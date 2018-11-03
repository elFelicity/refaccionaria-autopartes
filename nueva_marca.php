<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nombre =filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$descripcion =filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
		$errores = '';

		if (empty($nombre) or empty($descripcion)) {
			$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
		}else{
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}
		if ($errores == '') {
			$statement = $conexion->prepare('INSERT INTO marcas (id_marca,nombre_marca,descripcion) VALUES (null,:nombre,:descripcion)');
			$statement->execute(array(':nombre'=>$nombre,':descripcion'=>$descripcion));
			header('Location: menu.php');
		}
	}

	require 'views/nueva_marca.view.php';
}else{
	header('Location: login.php');
}

?>
