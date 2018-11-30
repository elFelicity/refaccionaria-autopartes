<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $descripcion =filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
		$errores = '';

		if ($_POST['submit'] == 'SI') {
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				//$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			$statement = $conexion->prepare('DELETE FROM productos WHERE descripcion = :descr');
			$statement->execute(array(':descr' => $descripcion));
			$resultado = $statement->fetch();
			echo "<script>alert('Se ha eliminado el Producto de la Base de Datos'); location.href='eliminar_producto.php';</script>";

		}else if($_POST['submit'] == 'NO'){
			header('Location: eliminar_producto.php');
		}else{
			if (empty($descripcion)) {
			$errores .= '<li>Por favor ingresa lal descripción del Producto que desea eliminar</li>';
			}else{
				try{
					$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
					//$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
				}catch(PDOException $e){
					echo "Error: " . $e->getMessage();
				}

				$statement = $conexion->prepare('SELECT * FROM productos WHERE descripcion = :descr LIMIT 1');
				$statement->execute(array(':descr' => $descripcion));
				$resultado = $statement->fetch();

				if ($resultado == false) {
					$errores .= '<li>Ese Producto no se encuentra registrado</li>';
				}
			}
		}
	}

	require 'views/eliminar_producto.view.php';
}else{
	header('Location: login.php');
}

?>
