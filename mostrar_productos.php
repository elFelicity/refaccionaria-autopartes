<?php session_start();

if (isset($_SESSION['usuario'])) {
	try{
		//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
		$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
	}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
	die();
	}

	$productos = $conexion->prepare("SELECT * FROM productos");
	$productos->execute();
	$productos = $productos->fetchAll();

	require 'views/mostrar_productos.view.php';
}else{
	header('Location: login.php');
}
?>
