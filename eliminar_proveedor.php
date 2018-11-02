<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id_proveedor = $_POST['id_proveedor'];
		$errores = '';

		if ($_POST['submit'] == 'SI') {
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			$statement = $conexion->prepare('DELETE FROM proveedores WHERE id_proveedor = :id');
			$statement->execute(array(':id' => $id_proveedor));
			$resultado = $statement->fetch();
			echo "<script>alert('Se ha eliminado el Proveedor de la Base de Datos'); location.href='eliminar_proveedor.php';</script>";

		}else if($_POST['submit'] == 'NO'){
			header('Location: eliminar_proveedor.php');
		}else{
			if (empty($id_proveedor)) {
			$errores .= '<li>Por favor ingresa el ID del Proveedor que desea eliminar</li>';
			}else{
				try{
					$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				}catch(PDOException $e){
					echo "Error: " . $e->getMessage();
				}

				$statement = $conexion->prepare('SELECT * FROM proveedores WHERE id_proveedor = :id LIMIT 1');
				$statement->execute(array(':id' => $id_proveedor));
				$resultado = $statement->fetch();

				if ($resultado == false) {
					$errores .= '<li>Ese Proveedor no se encuentra registrado</li>';
				}
			}
		}
	}

	require 'views/eliminar_proveedor.view.php';
}else{
	header('Location: login.php');
}

?>
