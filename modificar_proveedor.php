<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['submit'] == 'Modificar Proveedor') {
			$id_proveedor = $_POST['id_proveedor'];
		}else{
			$id_proveedor = $_POST['id_proveedor'];
		}
		$errores = '';
		$cambio = false;

		if (empty($id_proveedor)) {
			$errores .= '<li>Por favor ingresa el ID de un Proveedor</li>';
		}else if(isset($id_proveedor)){
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM proveedores WHERE id_proveedor = :id LIMIT 1');
			$statement->execute(array(':id' => $id_proveedor));
			$resultado = $statement->fetch();

			if ($resultado == false) {
				$errores .= '<li>Ese proveedor no existe</li>';
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

			$statement = $conexion->prepare('UPDATE proveedores SET nombre = :nombre2 WHERE id_proveedor = :id;');
			$statement->execute(array(':nombre2' => $nombre2, ':id' =>$id_proveedor));
			$cambio = true;

		}

		if (isset($_POST['telefono2']) && $_POST['telefono2'] != '') {
			$telefono2 = filter_var($_POST['telefono2'], FILTER_SANITIZE_STRING);;
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('UPDATE proveedores SET telefono = :tel2 WHERE id_proveedor = :id;');
			$statement->execute(array(':tel2' => $telefono2, ':id' =>$id_proveedor));
			$cambio = true;
		}

		if (isset($_POST['direccion2']) && $_POST['direccion2'] != '') {
			$direccion2 = filter_var($_POST['direccion2'], FILTER_SANITIZE_STRING);;
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('UPDATE proveedores SET direccion = :dir2 WHERE id_proveedor = :id;');
			$statement->execute(array(':dir2' => $direccion2, ':id' =>$id_proveedor));
			$cambio = true;
		}

		if (isset($_POST['correo2']) && $_POST['correo2'] != '') {
			$correo2 = filter_var($_POST['correo2'], FILTER_SANITIZE_STRING);;
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('UPDATE proveedores SET correo = :correo2 WHERE id_proveedor = :id;');
			$statement->execute(array(':correo2' => $correo2, ':id' =>$id_proveedor));
			$cambio = true;
		}

		if ($cambio == true) {
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			if(isset($_POST['id_proveedor']) && $_POST['id_proveedor'] != ''){
				$id_proveedor = $_POST['id_proveedor'];
			}
			$statement = $conexion2->prepare('SELECT * FROM proveedores WHERE id_proveedor = :id LIMIT 1');
			$statement->execute(array(':id' => $id_proveedor));
			$resultado = $statement->fetch();
		}

	}

	require 'views/modificar_proveedor.view.php';
}else{
	header('Location: login.php');
}

?>
