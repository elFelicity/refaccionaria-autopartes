<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nombre =filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$telefono =filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
		$direccion =filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
		$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
		$errores = '';



		if (empty($nombre) or empty($telefono) or empty($direccion) or empty($correo)) {
			$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
		}else{
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				//$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}
		if ($errores == '') {
			$statement = $conexion->prepare('INSERT INTO proveedores (id_proveedor,nombre,telefono,direccion,correo) VALUES (null,:nombre,:telefono,:direccion,:correo)');
			$statement->execute(array(':nombre'=>$nombre,':telefono'=>$telefono,':direccion'=>$direccion,':correo'=>$correo));
			header('Location: menu.php');
		}
	}

	require 'views/nuevo_proveedor.view.php';
}else{
	header('Location: login.php');
}

?>
