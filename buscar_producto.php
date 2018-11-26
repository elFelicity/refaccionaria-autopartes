<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$descripcion = $_POST['descripcion'];
		$errores = '';

		if (empty($descripcion)) {
			$errores .= '<li>Por favor ingrese la descripción del Producto</li>';
		}else{
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM productos WHERE descripcion = :id LIMIT 1');
			$statement->execute(array(':id' => $descripcion));
			$busqueda = $statement->fetch();

			if ($busqueda == false) {
				$errores .= '<li>El Producto no  está registrado</li>';
			}
		}
	}

	require 'views/buscar_producto.view.php';
}else{
	header('Location: login.php');
}

?>
