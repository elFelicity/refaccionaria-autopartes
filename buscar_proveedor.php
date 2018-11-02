<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id_proveedor = $_POST['id_proveedor'];
		$errores = '';

		if (empty($id_proveedor)) {
			$errores .= '<li>Por favor ingrese el ID de un Proveedor</li>';
		}else{
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM proveedores WHERE id_proveedor = :id LIMIT 1');
			$statement->execute(array(':id' => $id_proveedor));
			$busqueda = $statement->fetch();

			if ($busqueda == false) {
				$errores .= '<li>El Proveedor no  está registrado</li>';
			}
		}
	}

	require 'views/buscar_proveedor.view.php';
}else{
	header('Location: login.php');
}

?>
