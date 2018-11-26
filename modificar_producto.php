<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['submit'] == 'Modificar Producto') {
			$descripcion = $_POST['descripcion'];
		}else{
			$descripcion = $_POST['descripcion'];
		}
		$errores = '';
		$cambio = false;

		if (empty($descripcion)) {
			$errores .= '<li>Por favor ingrese la descripción del Producto</li>';
		}else if(isset($descripcion)){
			try{
				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM productos WHERE descripcion = :descr LIMIT 1');
			$statement->execute(array(':descr' => $descripcion));
			$resultado = $statement->fetch();

			if ($resultado == false) {
				$errores .= '<li>Ese producto no existe</li>';
			}
		}


        $productos = $conexion->prepare('SELECT * FROM productos');
        $productos->execute();
        $productos = $productos->fetchAll();

        $ubicacionEdi2 = $_POST['ubicacion_edi2'];
        $ubicacionPasi2 = $_POST['ubicacion_pasi2'];

        $ubicacionPost = $ubicacionEdi2 + $ubicacionPasi2 + $_POST['ubicacion_ana2'] + $_POST['ubicacion_charo2'];

        foreach ($productos as $elemento) {
          $ubicacionElemento = $elemento['ubicacion_edificio'] + $elemento['ubicacion_pasillo'] + $elemento['ubicacion_anaquel'] + $elemento['ubicacion_charola'];
          if(($ubicacionElemento == $ubicacionPost) and ($elemento['numero_pieza'] != $_POST['num_pieza2'])){
            $errores .= '<li>En esa ubicación ya existe un artículo con un número de pieza distinto</li>';
          }
          if(($ubicacionElemento == $ubicacionPost) and ($elemento['descripcion'] != $_POST['descripcion2'])){
            $errores .= '<li>En esa ubicación ya existe un artículo con una descripcion distinta</li>';
          }
          }

if ($errores == "") {
  if (isset($_POST['num_pieza2']) && $_POST['num_pieza2'] != '') {
    $num_pieza2 = filter_var($_POST['num_pieza2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET num_pieza = :num_pieza2 WHERE descripcion = :descr;');
    $statement->execute(array(':num_pieza2' => $num_pieza2, ':descr' =>$descripcion));
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

    $statement = $conexion->prepare('UPDATE productos SET descripcion = :descr2 WHERE descripcion = :descr;');
    $statement->execute(array(':descr2' => $descripcion2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['stock2']) && $_POST['stock2'] != '') {
    $stock2 = filter_var($_POST['stock2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET stock = :stock2 WHERE descripcion = :descr;');
    $statement->execute(array(':stock2' => $stock2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['costo2']) && $_POST['costo2'] != '') {
    $costo2 = filter_var($_POST['costo2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET costo = :costo2 WHERE descripcion = :descr;');
    $statement->execute(array(':costo2' => $costo2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['ubicacion_edi2']) && $_POST['ubicacion_edi2'] != '') {
    $ubi_edi2 = filter_var($_POST['ubicacion_edi2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET ubicacion_edificio = :ubi_edi2 WHERE descripcion = :descr;');
    $statement->execute(array(':ubi_edi2' => $ubi_edi2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['ubicacion_pasi2']) && $_POST['ubicacion_pasi2'] != '') {
    $ubi_pasi2 = filter_var($_POST['ubicacion_pasi2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET ubicacion_pasillo = :ubi_pasi2 WHERE descripcion = :descr;');
    $statement->execute(array(':ubi_pasi2' => $ubi_pasi2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['ubicacion_ana2']) && $_POST['ubicacion_ana2'] != '') {
    $ubi_ana2 = filter_var($_POST['ubicacion_ana2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET ubicacion_anaquel = :ubi_ana2 WHERE descripcion = :descr;');
    $statement->execute(array(':ubi_ana2' => $ubi_ana2, ':descr' =>$descripcion));
    $cambio = true;
  }

  if (isset($_POST['ubicacion_charo2']) && $_POST['ubicacion_charo2'] != '') {
    $ubi_charo2 = filter_var($_POST['ubicacion_charo2'], FILTER_SANITIZE_STRING);;
    try{
      //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
      $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('UPDATE productos SET ubicacion_charola = :ubi_charo2 WHERE descripcion = :descr;');
    $statement->execute(array(':ubi_charo2' => $ubi_charo2, ':descr' =>$descripcion));
    $cambio = true;
  }

}





/*
    $marcas = $conexion->prepare('SELECT * FROM marcas');
    $marcas->execute();
    $marcas = $marcas->fetchAll();

$_POST['id_marca2']
    foreach ($marcas as $marca) {
      if($marca['id_marca'] != $_POST['id_marca2']){
        $errores .= '<li>El ID de esa Marca no existe</li>';
      }
    }

    if($errores == ""){
      if (isset($_POST['id_marca2']) && $_POST['id_marca2'] != '') {
  			try{
  				//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
  				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
  			}catch(PDOException $e){
  				echo "Error: " . $e->getMessage();
  			}

  			$statement = $conexion->prepare('UPDATE productos SET id_marca = :id_marca2 WHERE descripcion = :descr;');
  			$statement->execute(array(':id_marca2' => $id_marca2, ':descr' =>$descripcion));
  			$cambio = true;
  		}
    }

    $proveedores = $conexion->prepare('SELECT * FROM proveedores');
    $proveedores->execute();
    $proveedores = $proveedores->fetchAll();

    $id_proveedor2 = filter_var($_POST['id_proveedor2'], FILTER_SANITIZE_STRING);;


    foreach ($proveedores as $proveedor) {
      if($proveedores['id_proveedor'] != $id_proveedor2){
        $errores .= '<li>El ID de ese Proveedor no existe</li>';
      }
    }

    if($errores == ""){
      if (isset($_POST['id_proveedor2']) && $_POST['id_proveedor2'] != '') {
        try{
          //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
          $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
        }catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare('UPDATE productos SET id_proveedor = :id_proveedor2 WHERE descripcion = :descr;');
        $statement->execute(array(':id_proveedor2' => $id_proveedor2, ':descr' =>$descripcion));
        $cambio = true;
      }
    }
*/
if ($cambio == true) {
  try{
    //$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
    $conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
  }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }

  if(isset($_POST['descripcion']) && $_POST['descripcion'] != ''){
    $descripcion = $_POST['descripcion'];
  }
  $statement = $conexion->prepare('SELECT * FROM productos WHERE descripcion = :descr LIMIT 1');
  $statement->execute(array(':descr' => $descripcion));
  $resultado = $statement->fetch();
}

	}

	require 'views/modificar_producto.view.php';
}else{
	header('Location: login.php');
}

?>
