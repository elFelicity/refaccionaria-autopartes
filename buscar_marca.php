<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id_marca = $_POST['id_marca'];
		$errores = '';

		if (empty($id_marca)) {
			$errores .= '<li>Por favor ingrese el ID de la Marca</li>';
		}else{
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM marcas WHERE id_marca = :id LIMIT 1');
			$statement->execute(array(':id' => $id_marca));
			$busqueda = $statement->fetch();

			if ($busqueda == false) {
				$errores .= '<li>La Marca no  está registrado</li>';
			}
		}
	}

	require 'views/buscar_marca.view.php';
}else{
	header('Location: login.php');
}

?>
