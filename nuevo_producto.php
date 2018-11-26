<?php session_start();

if (isset($_SESSION['usuario'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$barcode =filter_var($_POST['barcode'], FILTER_SANITIZE_STRING);
		$num_pieza =filter_var($_POST['num_pieza'], FILTER_SANITIZE_STRING);
		$descripcion =filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
		$stock =filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
    $id_marca =filter_var($_POST['id_marca'], FILTER_SANITIZE_STRING);
    $id_proveedor =filter_var($_POST['id_proveedor'], FILTER_SANITIZE_STRING);
    $costo = $_POST['costo'];
    $ubicacion_edi = $_POST['ubicacion_edi'];
    $ubicacion_pasi = $_POST['ubicacion_pasi'];
    $ubicacion_ana = $_POST['ubicacion_ana'];
    $ubicacion_charo = $_POST['ubicacion_charo'];
		$errores = '';

		if (empty($barcode) or empty($num_pieza) or empty($descripcion) or empty($stock) or empty($id_marca) or empty($id_proveedor) or empty($costo) or empty($ubicacion_edi) or empty($ubicacion_pasi) or empty($ubicacion_ana) or empty($ubicacion_charo)) {
			$errores .= '<li>Por favor rellena todos los campos</li>';
		}else{
      //$link=mysqli_connect("localhost","root","");
      //mysqli_select_db($link,"refaccionaria") or die ("Error al conectarse con la BD");

  //    $consulta ="SELECT id_marca FROM marcas ORDER BY id_marca ASC";
  //    $resulProd = mysql_query($consulta);
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
        ///$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','');
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
      }

      /*echo '<select>';
      foreach($resul->query('SELECT id_marca FROM marcas') as $row){
        echo '<option value="'.$row['id_marca'].'">'.$row['id_marca'].'<option/>';
      }
      echo '</select>';
*/
      /*
      $marcas = $conexion->prepare("SELECT * FROM marcas");
    	$marcas->execute();
    	$marcas = $marcas->fetchAll();

      $numMarca = $conexion->prepare("SELECT COUNT(*) FROM marcas");
      $numMarca->execute();
      $numMarca = $numMarca->fetchAll();*/

			//$statement = $conexion->prepare('SELECT * FROM libros WHERE isbn = :isbn LIMIT 1');
			//$statement->execute(array(':isbn' => $isbn));
			//$resultado = $statement->fetch();

			//if ($resultado != false) {
			//	$errores .= '<li>El numero de isbn ya existe</li>';
			//} /*

      $productos = $conexion->prepare('SELECT * FROM productos');
      $productos->execute();
    	$productos = $productos->fetchAll();

      foreach ($productos as $elemento) {
        if(($elemento['ubicacion_edificio'] == $ubicacion_edi)  and ($elemento['ubicacion_pasillo'] == $ubicacion_pasi) and ($elemento['ubicacion_anaquel'] == $ubicacion_ana) and ($elemento['ubicacion_charola'] == $ubicacion_charo) and ($elemento['codigo_barras'] != $barcode)){
          $errores .= '<li>En esa ubicación ya existe un artículo con un código de barras distinto</li>';
        }
        if(($elemento['ubicacion_edificio'] == $ubicacion_edi)  and ($elemento['ubicacion_pasillo'] == $ubicacion_pasi) and ($elemento['ubicacion_anaquel'] == $ubicacion_ana) and ($elemento['ubicacion_charola'] == $ubicacion_charo) and ($elemento['numero_pieza'] != $num_pieza)){
          $errores .= '<li>En esa ubicación ya existe un artículo con un número de pieza distinto</li>';
        }
        if(($elemento['ubicacion_edificio'] == $ubicacion_edi)  and ($elemento['ubicacion_pasillo'] == $ubicacion_pasi) and ($elemento['ubicacion_anaquel'] == $ubicacion_ana) and ($elemento['ubicacion_charola'] == $ubicacion_charo) and ($elemento['descripcion'] != $descripcion)){
          $errores .= '<li>En esa ubicación ya existe un artículo con una descripción distinta</li>';
        }
		    }

        $marcas = $conexion->prepare('SELECT * FROM marcas');
        $marcas->execute();
      	$marcas = $marcas->fetchAll();

        foreach ($marcas as $marca) {
          if($marca['id_marca'] != $id_marca){
            $errores .= '<li>El ID de esa Marca no existe</li>';
          }
        }

        $proveedores = $conexion->prepare('SELECT * FROM proveedores');
        $proveedores->execute();
        $proveedores = $proveedores->fetchAll();

        foreach ($proveedores as $proveedor) {
          if($proveedor['id_proveedor'] != $id_proveedor){
            $errores .= '<li>El ID de ese Proveedor no existe</li>';
          }
        }

  }
		if ($errores == '') {
		  $statement = $conexion->prepare('INSERT INTO productos (codigo_barras,numero_pieza,descripcion,stock,id_marca,id_proveedor,costo,ubicacion_edificio,ubicacion_pasillo,ubicacion_anaquel,ubicacion_charola) VALUES (:codigo_barras,:numero_pieza,:descripcion,:stock,:id_marca,:id_proveedor,:costo,:ubicacion_edificio,:ubicacion_pasillo,:ubicacion_anaquel,:ubicacion_charola)');
			$statement->execute(array(':codigo_barras'=>$barcode,':numero_pieza'=>$num_pieza,':descripcion'=>$descripcion,':stock'=>$stock,':id_marca'=>$id_marca,':id_proveedor'=>$id_proveedor,':costo'=>$costo,':ubicacion_edificio'=>$ubicacion_edi,':ubicacion_pasillo'=>$ubicacion_pasi,':ubicacion_anaquel'=>$ubicacion_ana,':ubicacion_charola'=>$ubicacion_ana));
			header('Location: menu.php');
		}
	}

	require 'views/nuevo_producto.view.php';
}else{
	header('Location: login.php');
}
?>
