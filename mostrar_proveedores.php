<?php session_start();

if (isset($_SESSION['usuario'])) {
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
	}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
	die();
	}

	$proveedores = $conexion->prepare("SELECT * FROM proveedores");
	$proveedores->execute();
	$proveedores = $proveedores->fetchAll();

	require 'views/mostrar_proveedores.view.php';
}else{
	header('Location: login.php');
}
?>
