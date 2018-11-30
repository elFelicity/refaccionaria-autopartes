<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id_marca = $_POST['id_marca'];
		$errores = '';

		if ($_POST['submit'] == 'SI') {
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				//$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			$statement = $conexion->prepare('DELETE FROM marcas WHERE id_marca = :id');
			$statement->execute(array(':id' => $id_marca));
			$resultado = $statement->fetch();
			echo "<script> alert('Se ha eliminado la marca de la Base de Datos'); location.href='eliminar_marca.php'; </script>";

		}else if($_POST['submit'] == 'NO'){
			header('Location: eliminar_marca.php');
		}else{
			if (empty($id_marca)) {
			$errores .= '<li>Por favor ingresa el ID de la marca que desea eliminar</li>';
			}else{
				try{
					$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
					//$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
				}catch(PDOException $e){
					echo "Error: " . $e->getMessage();
				}

				$statement = $conexion->prepare('SELECT * FROM marcas WHERE id_marca = :id LIMIT 1');
				$statement->execute(array(':id' => $id_marca));
				$resultado = $statement->fetch();

				if ($resultado == false) {
					$errores .= '<li>Esa marca no se encuentra registrada</li>';
				}
			}
		}
	}

	require 'views/eliminar_marca.view.php';
}else{
	header('Location: login.php');
}

?>
