<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['submit'] == 'Modificar Marca') {
			$id_marca = $_POST['id_marca'];
		}else{
			$id_marca = $_POST['id_marca'];
		}
		$errores = '';
		$cambio = false;

		if (empty($id_marca)) {
			$errores .= '<li>Por favor ingresa el ID de la Marca</li>';
		}else if(isset($id_marca)){
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM marcas WHERE id_marca = :id LIMIT 1');
			$statement->execute(array(':id' => $id_marca));
			$resultado = $statement->fetch();

			if ($resultado == false) {
				$errores .= '<li>La Marca no existe</li>';
			}
		}

		if (isset($_POST['nombre2']) && $_POST['nombre2'] != '') {
			$nombre2 = filter_var($_POST['nombre2'], FILTER_SANITIZE_STRING);;
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('UPDATE marcas SET nombre = :nombre2 WHERE id_marca = :id;');
			$statement->execute(array(':nombre2' => $nombre2, ':id' =>$id_marca));
			$cambio = true;

		}

		if (isset($_POST['descripcion2']) && $_POST['descripcion2'] != '') {
			$descripcion2 = filter_var($_POST['descripcion2'], FILTER_SANITIZE_STRING);;
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('UPDATE marcas SET descripcion = ::desc2 WHERE id_marca = :id;');
			$statement->execute(array(':desc2' => $descripcion2, ':id' =>$id_marca));
			$cambio = true;
		}

		if ($cambio == true) {
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			if(isset($_POST['id_marca']) && $_POST['id_marca'] != ''){
				$id_marca = $_POST['id_marca'];
			}
			$statement = $conexion2->prepare('SELECT * FROM marcas WHERE id_marca = :id LIMIT 1');
			$statement->execute(array(':id' => $id_marca));
			$resultado = $statement->fetch();
		}

	}

	require 'views/modificar_marca.view.php';
}else{
	header('Location: login.php');
}

?>
